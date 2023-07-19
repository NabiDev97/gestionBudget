<?php
include_once('fonction.php');
extract($_GET); 

    $sql= "DELETE FROM depense where id=".$id;
    $connectMe=connexion();
    $connectMe->query($sql);
    echo 'suppression reussi!';
    header("location:index.php");
?>