<?php

$serveur="localhost";
$login="root";
$pass="";

try{
    $connexion= new PDO ("mysql:host=$serveur;dbname=webdevelopment",$login,$pass);//j'utilise les bloc try and catch pour la gestion des erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //exercice 1
    /*$insertion="INSERT INTO languages( language,version )
             Values ('Javascript','7'),
                    ('Javascript','8')";
     $connexion->exec($insertion);*/

     //exercice 2
     echo "<h3 style='color:red;'>exercice 2</h3><br>";
     $requette1=$connexion->prepare("SELECT version FROM languages WHERE language = 'PHP' OR language = 'Javascript'");
     $requette1->execute();
     $resultat1=$requette1->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat1);
     echo "</pre>";

      //exercice 3
      echo "<h3 style='color:red;'>exercice 3</h3><br>";
      $requette2=$connexion->prepare("SELECT * FROM languages WHERE language != 'PHP'");
      $requette2->execute();
     $resultat2=$requette2->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat2);
     echo "</pre>";

     //exercice 4
     echo "<h3 style='color:red;'>exercice 4</h3><br>";
     $requette3=$connexion->prepare("SELECT * FROM languages ORDER BY language");
     $requette3->execute();
     $resultat3=$requette3->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat3);
     echo "</pre>";

    //exercice 5
   echo "<h3 style='color:red;'>exercice 5</h3><br>";
   $sup="DROP TABLE `ide`";
   $requette=$connexion->prepare($sup);
   $requette->execute();
   //chargement du fichier ajout.sql est reussi via phpMyAdmin

   //exercice 6
   echo "<h3 style='color:red;'>exercice 6</h3><br>";

  /* $requette5=$connexion->prepare("SELECT * FROM ide");
     $requette5->execute();
     $resultat5=$requette5->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat5);
     echo "</pre>";*///table ide not found car supprimer dans l'exo 5



    echo "connexion à la base de données webdevelopment est reussi<br>";
    echo "insertion de données à la table languages est reussi<br>";
    echo "l'affichage des version PHP et Javascript de la table languages est reussi<br>";
    echo "l'affichage de toutes les lignes de la table languages sauf les lignes PHP est reussi<br>";
    echo "l'affichage de la table languages par ordre Alphabétique est reussi<br>";
    echo "la suppression de la table ide est reussi <br>";
    
}catch(PDOException $e){
        echo'echec : ' . $e->getMessage();
    
    }
    
    
    
    
    
    ?>