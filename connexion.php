<?php

    //   Tentative de connexion a la base de donnees
    function connexion() {
        try{
            $connect= new PDO('mysql:host=localhost;dbname=budget','root','');
        }catch(Exception $e){
        die('Am na fou dokhoul d'.$e->getMessage());
        }
        // echo 'Mach\'Allah connexion bi diar na yone!!!';
        return $connect;
    }
    
    //calcule du budget
    // ***********************************************************************
   function calculBudget(){
        $connectMe=connexion();
        $req=$connectMe->query('SELECT SUM(montant) as budget FROM revenu');
        return $req->fetch();
    }
    // $resultat=calculBudget();
    // echo "Budget total : " . $resultat['budget'];
    // ***********************************************************************


    //calcule de la depense
    // ***********************************************************************
   function calculDepense(){
    $connectMe=connexion();
    $req=$connectMe->query('SELECT SUM(montant) as depense FROM depense');
    return $req->fetch();
}
// $resultat=calculDepense();
// echo "Budget total : " . $resultat['depense'];
// ***********************************************************************


 
    //calcule du solde
    // ***********************************************************************
 
    function calculSolde(){
        $budget=calculBudget()['budget'];
        $depense=calculDepense()['depense'];
        $solde= ($budget - $depense);
        return $solde;
    }
    $resultat=calculSolde();
echo "Solde : " . $resultat;
// ***********************************************************************
?>
