<?php
namespace App; 

class View
{
    public function render(array $params, array $notes):void
    {
        include_once("templates/layout.php"); 
    }
}