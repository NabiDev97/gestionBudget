<?php
    include_once('fonction.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Application de Gestion de Budgets</title>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width' initial-scale1.0">
         <link rel="stylesheet" href="budget.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-VoQR+5iVlnCC/Yt4Mn2/DzBpC/h7Lq4S0UCPPe5eBrMgAyQW50R7GUVdZCYsxYPc" crossorigin="anonymous">

    </head>
    <body>
        <div id="main-container">

             <!-- Premiere bloc -->
             <div id="entete">
                <h1><span id="B-style-color">B</span>UDGET</h1>
                <h4>Gestion du budet</h4>
             </div>

             <!-- Deuxieme bloc -->
             <div  class="liste-table-container">
                <div class="table-contain">
                    <h3 class="table-title">Budget</h3>
                    <span class="valeur-cfa"><?php echo calculbudget(); ?> CFA</span>
                </div>
                <div class="table-contain">
                    <h3 class="table-title">Depenses</h3>
                    <span class="valeur-cfa"><?php echo calculDepense(); ?> CFA</span>
                </div>
                <div class="table-contain">
                    <h3 class="table-title">Solde</h3>
                    <span class="valeur-cfa"><?php echo calculSolde(); ?> CFA</span>
                </div>
             </div>

                <!-- Troisieme bloc -->
                <h2>Liste des depenses</h2>
                <div class="liste-table-container">
                    <?php
                    $donnees=recupDepenseData();
                    echo "<table>";
                    echo "<tr classe= \"table-titre\"><th>Titre</th><th>montant</th><th>Action</th>";
                    
                    foreach($donnees as $row) {
                        $id=$row['id'];
                        echo "<tr>";
                        echo "<td>" . $row["titre"] . "</td>";
                        echo "<td>" . $row["montant"] . " CFA</td>";
                        echo " <td><button name='sup'onClick=\" confirm('Voulez vous vraiment supprimer cette depense?')\";><a href=\"delDepense.php?id=$id\">supprimer</a></button></td>";
                    }
                        echo"<tr class=\"add-depense\">";
                        echo "<td><a href=\" AjoutDepense.php\" class=\"noire\">AjouterDepense <i class=\"fas fa-plus\"></i></a></td>";
                        echo "<td></td>";
                        echo "</tr>";
                        echo "</table>";
                     
                    ?>
                    
                </div>

                <h2>Liste des revevus</h2>
                <div class="liste-table-container">
                    <?php
                    $donnees=recupRevenuData();
                    echo "<table>";
                    echo "<tr classe= \"table-titre\"><th>Titre</th><th>montant</th><th>Action</th>";
                    
                    foreach($donnees as $row) {
                        $id= $row["id"];
                        echo "<tr>";
                        echo "<td>" . $row["titre"] . "</td>";
                        echo "<td>" . $row["montant"] . " CFA</td>";
                        echo " <td><button name='sup'onClick=\" confirm('Voulez vous vraiment supprimer ce revenu?')\";><a href=\"delRevenu.php?id=$id\">supprimer</a></button></td>";
                        echo "</tr>";
                    }
                    echo"<tr class=\"add-depense\">";
                    echo "<td><a href=\"ajoutRevenu.php\" class=\"noire\">Ajouter Revenu <i class=\"fas fa-plus\"></i></a></td>";
                    echo "<td></td>";
                    echo "</tr>";
                    echo "</table>";
                 
                    echo "</table>";
                    ?>
                   
                    
                </div>

        </div>          
    </body>
</html>