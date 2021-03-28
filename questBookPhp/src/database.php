<?php
declare(strict_types = 1); 
namespace App; 
use PDO;
class Database
{
    private PDO $conn; 

    public function __construct(array $config)
    {
        try
        {
            try
            {
              $this -> validateConfig($config); 
              $this -> createConnection($config);  
            }catch(PDOException $e)
            {
              throw new StorageException("Connection error"); 
            }
              
        }catch(PDOException $e)
        {
            throw new PDOException("connection eror"); 
        }
    }

    private function createConnection(array $config) : void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this -> conn = new PDO(
          $dsn,
          $config['user'],
          $config['password'],
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]
        );
    }

    private function validateConfig(array $config):void 
    {
      if(
        empty($config['database'])
        || empty($config['user'])
        || empty($config['host'])
        || empty($config['password'])
      )
      {
        throw new PDOException("Storage configuration exception"); 
      }
    }

    public function createNote($data):void
    {
        try 
      {
        $author = $this->conn->quote($data['author']); 
        $description = $this->conn->quote($data['description']); 
        $created = $this->conn->quote(date('Y-m-d H:i:s')); 

        $query = "
          INSERT INTO quest(title, description, created) 
          VALUES($author, $description, $created)
        ";
        
        $this->conn->exec($query);
      }catch(Throwable $e)
      {
        throw new PDOException("Problem in add notes", 400); 
      }
    }


    public function getNotes():array 
    {
        try
        {
            $query = "
            SELECT * FROM quest"; 
            $result = $this -> conn -> query($query); 
            $notes = $result -> fetchAll(PDO::FETCH_ASSOC);
            return $notes; 
        }catch(Throwable $e)
        {
            throw new PDOException("Problem "); 
        }
    }
}