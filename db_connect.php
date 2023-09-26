<?php
    
    $database = new PDO('mysql:host=localhost;dbname=reevive','root','');

    try{
        $database = new PDO('mysql:host=localhost;dbname=reevive','root','');
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Successfully connected to database";

        $results = $database->query('SELECT DISTINCT first_name FROM customers');

        while($row = $results->fetch()){

            echo $row['first_name'].'<br>';
        }
    }catch(PDOException $e){

            die('ERROR:'. $e->getMessage());
    }

?>