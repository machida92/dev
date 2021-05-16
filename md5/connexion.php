<?php
session_start();
// test si "valid" est envoyé
//on récupère les valeurs mis dans le formulaire pour les affecter dans les variables
if (isset($_POST['valid'])){
$mail=$_POST['mail'];
$mdp= $_POST['pwd'];
$test = false;

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
            $req=$pdo->prepare("SELECT * FROM connexion");
            $req->execute();// execute la requete

            $data = $req->fetchAll();
            if((isset($mail)) && (isset($mdp))) {

                $option = ['cost' =>12,];               
                $hmdp = password_hash($mdp, PASSWORD_BCRYPT,$option);
                
                foreach($data as $cnx) :

                    if($mail == $cnx['Email'] && password_verify($mdp,$cnx["password"])){

                        $test=TRUE;

                    }
                endforeach;
            }
                if($test){

                        
                        header("location:vitrine.php"); 


                }
            else{
                echo"<center>login ou mdp incorrect </center>";
                header("Refresh: 2; URL=index.html");

            }
           // echo $req->rowCount();
            
            // Si la requete a un nombre de tour superieur à 0 
            /*if($data->rowCount() >0)
            {   

                echo $data[0]["password"];

                if(password_verify($mdp,$data[0]["password"]))
                    {
                        echo"test";

                        //si la personne entre le bon mail et mdp alors il est envoyé sur la vitrine
                        header("location:vitrine.php"); 

                    }

                
            }
            else
            {   
                

                  //si le mail ou le mdp n'existent pas, la page est  raffraichi apres
                // x sec et ensuite la personne est envoyé sur *connexion.html*
                echo"<center>login ou mdp incorrect </center>";
                header("Refresh: 3; URL=index.html");


              }
        
     }
     */
        //la personne n'a pas rempli tout les champs
    }
    else {
            echo"<center> <h1>Site Vitrine</h1> </center>";
            echo"<center>Veuillez saisir tout les champs !</center>"; 
            header("Refresh: 3; URL=index.html");
 
 
        }   

    }


else{
    // sinon la personne essaye d'entrer sans se connecter en passant directement par l'url connexion.php
    echo"<center>login ou mdp incorrect </center>";
    header("Refresh: 1; location:index.html"); 
 
} 
?>