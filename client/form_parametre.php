<?php
//session_start();
include 'header.php';
if (empty($dbh) == TRUE){
    include '../inc/accessBDD.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/homepage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

    <title>Troc de Trucs</title>

</head> 

<body>

	<div class=" col-2 offset-md-4 mt-4 p-4" style="margin: auto;">
		<form action="parametre.php" method="POST">

			<div id="modifMDP" style='display: none'>
				<label>Ancien mot de passe : </label>
				<input type="password" name="ancienMotDePasse" class="form-control"/>
				<br>
				<label>Nouveau mot de passe : </label>
				<input type="password" name="gestionMDP1" class="form-control"/>
				<br>
				<label>Confimer le nouveau mot de passe : </label>
				<input type="password" name="gestionMDP2" class="form-control"/>
				<br>
				<input type="submit" name="" value="Valider" class="btn btn-secondary"/>
				<input type="button" value="Annuler" onclick="btnCancel()" class="btn btn-outline-secondary btn-sm"/>
			</div>
			<div id ="modifBouton" style='display:block' >
				<input type="button" value="Modifier le mot de passe" class="btn btn-secondary mt-4 " onclick="btnModifClientMdp()" />
			</div>


		</form>
	</div>
    <div id="division"></div>

    <script type="text/javascript">
        function btnModifClientMdp() {

            var text = document.getElementById("modifMDP");
            if (text.style.display === "none") {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            var text2 = document.getElementById("modifBouton");
            text2.style.display = "none";

        }

        function btnCancel(){
            var text = document.getElementById("modifMDP");
            if (text.style.display === "block") {
                text.style.display = "none";
            } else {
                text.style.display = "block";
            }
            var text2 = document.getElementById("modifBouton");
            text2.style.display = "block";
        }

        function btnSubmitModifMdpt() {
            var a = document.createElement("p");
            a.innerHTML = "<?php

                            echo "modif faite";
                            ?>";
            let division = document.querySelector("#division");
            division.append(a);

            

        }
    </script>

</body>

</html>