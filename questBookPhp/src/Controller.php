<?php
declare(strict_types = 1); 
namespace App; 

include_once ("src/database.php");

const DEFAULT_ACTION = "/"; 

class Controller
{
    private static array $configuration = []; 

    private array $params; 
    private Database $database; 

    public static function initConfiguration(array $configuration)
    {
        self::$configuration = $configuration; 
    }

    public function __construct($params)
    {
        $this -> params = $params;
        $this -> database = new Database(self::$configuration); 
    }

    public function run():void
    {
        switch($this -> action())
        {
            case 'add':
                $data = $this ->getRequestPost(); 
                $this -> database -> createNote($data); 
                break;
        }

        $notes = $this -> database -> getNotes(); 
        
        (new View) -> render($this -> params, $notes); 
    }

    private function action():string 
    {
        $data = $this -> getRequestGet(); 
        return $data['action'] ?? DEFAULT_ACTION;
    }

    private function getRequestPost():array 
    {
        return $this -> params['POST'] ?? []; 
    }

    private function getRequestGet(): array
    {
        return $this -> params['GET'] ?? []; 
    }
}