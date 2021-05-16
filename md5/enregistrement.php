<?php
session_start();

$mdp= $_POST['password'];

     // si le bouton "valid" est envoyé
if (isset($_POST['valid']))
{
   /* on test si les champ sont bien remplis */
    if(!empty($_POST['Nom']) and !empty($_POST['Prenom']) and !empty($_POST['Email']) and !empty($mdp) and !empty($_POST['repeatpassword']))
    {
        /* on test si le mdp contient bien au moins 6 caractère */
        if ((strlen($_POST['password'])>=6)  && ($mdp==$_POST['repeatpassword']))
        {      
            /* on test si les deux mdp sont bien identique et que la case crypter est coché*/
                if(isset($_POST['caseCrypt']))
                {
                // On crypte le mot de passe
                $hmdp = password_hash($mdp, PASSWORD_DEFAULT);

                // on se connecte à MySQL et on sélectionne la base de données
                    try {
                        $pdo=new PDO("mysql:host=127.0.0.1;dbname=achatenligne","root",""); 
                        //echo "<br>Connexion BDD OK";
                  
                        //prepare la requete INSERT INTO et on la met dans la variable $req
                        $req = $pdo->prepare("INSERT INTO connexion (Nom,Prenom,Email,password) VALUES (?,?,?,?)");
                        /*on prend les champs rempli du formulaire et
                        on execute la requete qui est stocké dans la variable $req */
                        $req->execute(array($_POST["Nom"],$_POST["Prenom"],$_POST["Email"],$hmdp));
                        echo"<center> <h1>Site Vitrine</h1> </center>";
                        echo "<h1><br><center>Vous êtes maintenant inscrit ! </center></h2>";
                        echo"<h2><br> <a href='index.html'> Se connecter </a></h2>";
                    }   
                        //on attrape l'erreur qu'on stock dans la variable $e
                    catch(PDOException $e){ 
                        //la variable $e utilise la methode "getMessage"
                        echo $e->getMessage();

                    }                                                   
                }
                else{
                        
                    try {
                        $pdo=new PDO("mysql:host=127.0.0.1;dbname=achatenligne","root",""); 
                        //echo "<br>Connexion BDD OK";
                  
                        //prepare la requete INSERT INTO et on la met dans la variable $req
                        $req = $pdo->prepare("INSERT INTO connexion (Nom,Prenom,Email,password) VALUES (?,?,?,?)");
                        /*on prend les champs rempli du formulaire et
                        on execute la requete qui est stocké dans la variable $req */
                        $req->execute(array($_POST["Nom"],$_POST["Prenom"],$_POST["Email"],$mdp));
                        echo"<center> <h1>Site Vitrine</h1> </center>";
                        echo "<h1><br><center>Vous êtes maintenant inscrit ! </center></h2>";
                        echo"<h2><br> <a href='index.html'> Se connecter </a></h2>";
                    }   
                        //on attrape l'erreur qu'on stock dans la variable $e
                    catch(PDOException $e){ 
                        //la variable $e utilise la methode "getMessage"
                        echo $e->getMessage();




                    } 
                    
                
                }  
                
        }
        
        else{ 
            echo"<center> <h1>Site Vitrine</h1> </center>";
            echo " <center>Le mot de passe est trop court !</center>";
            header("Refresh: 3; URL=enregistrement.html");
        }

    } 
    else {
        echo"<center> <h1>Site Vitrine</h1> </center>";
        echo "<center>Veuillez saisir tous les champs !</center>";
        header("Refresh: 3; URL=enregistrement.html");
    }
} 
?>