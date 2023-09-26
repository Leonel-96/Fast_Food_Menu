<?php

    require 'database.php';

    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }


    $db = Database::connect();
    $statement = $db->prepare('SELECT items.id,items.name,items.description,items.price,items.image,categories.name AS category, 
                                FROM items LEFT JOIN categories ON items.category = categories.id
                                WHERE items.id = ?');

    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();


    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.cdnfonts.com/css/holtwood-one-sc" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Burger code</title>
</head>
<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code<span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1><strong>Voir un item</strong></h1>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
</body>
</html>