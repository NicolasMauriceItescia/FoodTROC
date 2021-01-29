<?php
session_start();
require_once("../connexionBDD/connexion.php");

$db_handle = new DBController()
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajouter un ptoduit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>
<body >

<?php require_once '../mutualisation/header2.php'?>

<div class="container mt-5"  id="afficheDesProduits">

        <?php
        $product_array = $db_handle->runQuery("SELECT id, nomProduit, image, description, categorie FROM users ");

        if (!empty($product_array)) {
            foreach($product_array as $produit){

                ?>
                <div id="grid-item" @click="afficherUnProduit" >

                    <a href="afficherLeProduit.php?id=<?=$produit['id']?>">

                        <div class="product-image"><img src="../images/<?php echo $produit["image"]; ?>"/></div>
                        <div class="product-tile-footer">
                            <div class="product-title"><?php echo $produit["nomProduit"]; ?></div>
                            <!--    <div class="product-title"><?php// echo $product_array[$key]["descProduit"]; ?></div>
                            <div class="product-price"><?php// echo $product_array[$key]["categorie"]; ?></div> -->
                        </div>
                    </a>
                </div>
                <?php
            }
        }
        ?>


</div>

</body>


</html>