<!DOCTYPE html>
<html>
    <head>
    <title>Application de Gestion de Budgets</title>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width' initial-scale1.0">
         <link rel="stylesheet" href="PageAjout.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div id="main-container">

             <!-- Premiere bloc -->
             <div id="entete">
                <h1><span id="B-style-color">B</span>UDGET</h1>
                <h4>Gestion du budet</h4>
             </div>

              <div id='pageAjoutTitle'>
                <h4 class='pageAjout'>AJOUTER REVENU</h4>
              </diV>

              <div class='formulaire'>
                    <form method="post" >
                        <h3>Titre</h3>
                        <input type="text" name='titre' placeholder='Salaire'>
                        <h3>Montant</h3>
                        <input type="number" id='montant'  name="montant" placeholder='500 000'>
                        <br>
                        <input type="submit" name="valider" id="submit" value="VALIDER">
                    </form>
                    <?php
        include_once('fonction.php');
        extract($_POST);
        if(isset($valider)&& ($montant>0)){
            ajoutRevenu($titre,$montant);
            header("location:index.php");
        }
        else echo 'Echec de l\'enregistrement du revenu ';

        ?>         
              </div>
        </div> 
    </body>
</html>