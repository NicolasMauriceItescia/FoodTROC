<?php 
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'base4reco');
define('DB_PASSWORD', 'base4reco');
define('DB_NAME', 'TrocDeTrucs');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');


$connexion = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




/* Requête pour envoyer un message au propriétaire de l'article */
echo "id";
echo $_SESSION['idProduit'];
echo "client:" .$_SESSION['idClient'];
echo "toCli:" .$_SESSION['toIdClient'];
echo "obj:" .$_POST['name'];
echo "content:" .$_POST['message'] .'<br>';

    $requete = $connexion->prepare("INSERT INTO Messages(idProduit, fromClient, toClient, content, objet) VALUES (:idProduit, :fromClient, :toClient, :content, :objet )");
 
      
  var_dump($requete);
        $requete->bindParam(':idProduit', $_SESSION['idProduit']);
        $requete->bindParam(':fromClient', $_SESSION['idClient']);
        $requete->bindParam(':toClient', $_SESSION['toIdClient']);
        $requete->bindParam(':content', $_POST['message']);
        $requete->bindParam(':objet', $_POST['objet']);
echo "avant execute".'<br>';
echo "id";
echo $_SESSION['idProduit'];
echo "client:" .$_SESSION['idClient'];
echo "toCli:" .$_SESSION['toIdClient'];
echo "content:" .$_POST['message'];

        $requete->execute();


header('location: ../produit/afficherListDesProduits.php');
?>