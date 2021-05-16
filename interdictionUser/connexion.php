<?php
session_start();
// test si "valid" est envoyé
//on récupère les valeurs mis dans le formulaire pour les affecter dans les variables
if (isset($_POST['valid'])){
$mail=$_POST['mail'];
$mdp=$_POST['pwd'];
$test= false;

   /* on test si les champ sont bien remplis */
    if(!empty($mail) and !empty($mdp))
    {
        try {//connexion à la BDD achatenligne
            $pdo=new PDO("mysql:host=127.0.0.1;dbname=achatenligne","root",""); 
            //echo "<br>Connexion BDD OK";
            }   
        catch(PDOException $e) 
        { 
            //envoie un message d'erreur si il y a une erreur de connexion BDD
            echo $e->getMessage();
        }
        /*requete pour rechercher les correspondances entre les champs de la BDD et entrer dans le formulaire "connexion" */
            $req=$pdo->prepare("SELECT *  FROM connexion");
            $req->execute();// execute la requete
            
            $res = $req->fetchAll();

            //zak methode 
            foreach($res as $con ) : 
                if($mail==$con['Email'] && $mdp==$con['password']){

                    
                    $_SESSION['user'] = $mail;

                    if($_SESSION['user'] == 'johnLemechant'){

                        $test = false;

                        echo"<center>Désolée vous n'avez plus accés à ce site ! </center>";
                        header("Refresh: 3; URL=index.html");

                        
                    }else{
                        $test = True;
                    }
                    
                }
            endforeach;


            /*if( $res ==  $mail['johnLemechant'] and $mdp['mechant'])
            {

                echo"<center>Désolée vous n'avez plus accés à ce site ! </center>";
                header("Refresh: 3; URL=index.html");

            }
                */
            
            if($test){
                if($req->rowCount()==0)
            { 
                //si le mail ou le mdp n'existent pas, la page est  raffraichi apres
                // x sec et ensuite la personne est envoyé sur *connexion.html*
                echo"<center>login ou mdp incorrect </center>";
                header("Refresh: 3; URL=index.html");
                
            }
                

            else
            {   //si la personne entre le bon mail et mdp alors il est envoyé sur la vitrine
                 header("location:vitrine.php"); 
            }
        
     
        //la personne n'a pas rempli tout les champs
         } else {
            echo"<center> <h1>Site Vitrine</h1> </center>";
            echo"<center>Désolée vous n'avez plus accés à ce site ! </center>";
            header("Refresh: 3; URL=index.html");
    
            }   
    

    }

            }

            // Si la requete a un nombre de tour égal à 0 alors la personne n'existe pas et est ensuite envoyé vers la page *enregistrer.html*
            


        
        else{
    // sinon la personne essaye d'entrer sans se connecter en passant directement par l'url connexion.php

        header("location:index.html"); 
    } 



?>