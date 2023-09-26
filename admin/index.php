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
    <div class="container" style="background:#fff;padding:50px;border-radius:10px;">
        <div class="row">
            <h1><strong>Liste des Items</strong><a href="insert.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'database.php';

                        $db = Database::connect();
                        $statement = $db->query('SELECT items.id,items.name,items.description,items.price,categories.name AS category 
                                                 FROM items LEFT JOIN categories ON items.category = categories.id
                                                ORDER BY items.id DESC');
                        While($item = $statement->fetch()){
                           echo '<tr>';
                           echo '<td>'.  $item['name'] . '</td>';
                           echo '<td>' . $item['description'] .'</td>';
                           echo '<td>' . $item['price'] .'</td>';
                           echo '<td>' . $item['category'] . '</td>';
                           echo '<td width=300>';
                                  echo '<a href="view.php?id=' . $item['id'] .'" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
                                  echo ' ';
                                  echo '<a href="update.php?id=' . $item['id'] .'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>';
                                  echo ' ';
                                  echo '<a href="delete.php?id=' . $item['id'] .'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Suppimer</a>';
                                echo'</td>';
                            echo'</tr>';
                        }
                        Database::disconnect();

                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>