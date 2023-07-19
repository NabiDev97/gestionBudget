<?php

// Connexion à la base de données (une seule connexion réutilisée)
$connectMe = null;

function connexion() {
    global $connectMe;
    if ($connectMe === null) {
        try {
            $connectMe = new PDO('mysql:host=localhost;dbname=budget','root','');
        } catch (Exception $e) {
            die('Am na fou dokhoul d'.$e->getMessage());
        }
    }
    return $connectMe;
}

// Calcul du budget
function calculBudget() {
    global $connectMe;
    $connectMe = connexion();
    $req = $connectMe->query('SELECT SUM(montant) as budget FROM revenu');
    $resultat = $req->fetch();
    return $resultat['budget'];
}

// echo "Budget total : " . calculBudget();

// Calcul de la dépense
function calculDepense() {
    global $connectMe;
    $connectMe = connexion();
    $req = $connectMe->query('SELECT SUM(montant) as depense FROM depense');
    $donnees = $req->fetch();
    $resultat = $donnees['depense'];
    return $resultat;
}

// echo "Dépense totale : " . calculDepense();

// Calcul du solde
function calculSolde() {
    global $connectMe;
    $budget = calculBudget();
    $depense = calculDepense();
    $solde = $budget - $depense;
    return $solde;
}

// echo "Solde : " . calculSolde();


//Ajout de depenses
$detecteur=null;
function ajoutDepense($titreDepense,$montantDepense){
    $solde=calculSolde();
    if($solde>=$montantDepense){
        global $connectMe;
        $connectMe = connexion();
        $req=$connectMe->prepare('INSERT INTO depense (titre,montant) VALUES (?,?)');
        if(isset($titreDepense) && isset($montantDepense) && $montantDepense>0)
            {
                // $req->execute([$req($titreDepense,$montantDepense)]);
             $detecteur = $req->execute([$titreDepense, $montantDepense]);
            //    var_dump($detecteur);
            echo 'Depence ajouter avec succes';
            } else
            echo'Echec de l\'enregistrement de la depense';
    }else echo 'Dosole mbok mi, l\'etat de votre solde ne vous permet pas ce type de depense ';
   
}
// ajoutDepense('finacement',500000);  

//Ajout de Revenus
$detecteur=null;
function ajoutRevenu($titreRevenu,$montantRevenu){
    global $connectMe;
    global $detecteur;
    $connectMe = connexion();
    $req=$connectMe->prepare('INSERT INTO revenu (titre,montant) VALUES (?,?)');
    if(isset($titreRevenu) && isset($montantRevenu) && $montantRevenu)
        {
            // $req->execute([$req($titreDepense,$montantDepense)]);
         $detecteur = $req->execute([$titreRevenu, $montantRevenu]);
        //    var_dump($detecteur);
        echo 'Revenu ajouter avec succes!';
        }
}
// ajoutDepense('finacement',500000);  


//Recuperations des donnees depuis la base de donnees
function recupDepenseData(){
    //****fonction bi moy recuperer donnees you si table depense****
    global $connectMe;
    
            $connectMe= connexion();
            $req= $connectMe->query('SELECT * FROM depense WHERE id!=1;');
            // var_dump($req);
            $donnees=$req->fetchAll();
            //  print_r($donnees);
            //  foreach ($donnees as $row) {
            //     echo "Montant : " . $row['montant'] . "<br>";
            return $donnees;
            // }
            }
// recupDepenseData();

function recupRevenuData(){
    //****fonction bi moy recuperer donnees you si table revenu****
    global $connectMe;
    
            $connectMe= connexion();
            $req= $connectMe->query('SELECT * FROM revenu WHERE id!=1;');
            // var_dump($req);
            $donnees=$req->fetchAll();
            //  print_r($donnees);
            //  foreach ($donnees as $row) {
            //     echo "Montant : " . $row['montant'] . "<br>";
            return $donnees;
            // }
            }
// recupDepenseData();
?>
