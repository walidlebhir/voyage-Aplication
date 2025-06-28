<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- lien de rederction du page de style css  -->
    <link rel="stylesheet" href="login.css">

    <!-- lien de css pour les icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>login page </title>
</head>
<body>

    <!-- creation d'une nouveaux nav bar-->
    <nav>
        <div class="menu">
        <div class="logo">
            <img src="imageprofil/SafariWorld-logo-01.png">
        </div>
            <ul>
                <li><a href="hom1.php">hom</a></li>
                <li><a href="#">A propose </a></li>
                <li><a href="#">contact</a></li>
                <button href><a href="login.php">Login</a></button>
            </ul>
        </div>
    </nav>
    

    <div class="continair">
        <div class="form">
        <?php 
                session_start() ; 
                // code php pour ceation du compt 
                require_once "database.php" ; // conaxion de base de donnes

                if(isset($_POST['cree'])){

                    // recuperation des donnes 
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $Nom = $_POST['name'] ; 
                        $email = $_POST['email'] ; 
                        $password = $_POST['password'] ; 
                        $confermer_password = $_POST['conferme'] ; 
                        if(!empty($Nom) && !empty($email) && !empty($password) && !empty($confermer_password)){
                            // test sur les champs 
                            if(!filter_var($email ,  FILTER_VALIDATE_EMAIL)){
                                ?> 
                                <h3 style="color:red;"> la format d'email incorect</h3>
                                <?php
                            }
                            if($password != $confermer_password){
                                ?>
                                <h3 style = "color:red;"> confirmer votre password </h3>
                                <?php
                            }
                            
                            $date_actuel = date("d-m-Y") ; 
                            // requet sql --> creation du compt 
                            $sql = "INSERT INTO compt(Nom, email, password, date_creation) VALUES (?, ?, ?, ?)" ;
                            $stm = $pdo->prepare($sql) ; 
                            $stm->execute([$Nom , $email , $password , $date_actuel]) ; 
                            // creation des session qui stocke des informations sur client :
                            $_SESSION['email'] = $email ; 

                            if($stm){
                                header("Location: pageprofil.php");
                            }
                            else{
                                ?>
                                <h3 style ="color:red;"> problemme systeme </h3>
                                <?php
                            }
 
                            
                        }
                        else{
                            ?> 
                            <h3 style="color :red;"> remplie tout les champs </h3>

                            <?php
                        }
                    }

                }



            ?> 
           <div class="form login">
                <span class="titre"> Sign up</span>
                <form   method="POST">
                    <div class="inputfild">
                        <input name ="name" type="name" placeholder="name" required>
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="inputfild">
                        <input name ="email" type="email" placeholder="email" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="inputfild">
                        <input name ="password" type="password" placeholder="password" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="inputfild">
                        <input  name="conferme"  type="password" placeholder="conférmer password" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="chekbox">
                        <div class="content_chek">
                            <input type="checkbox"  id="logchek">
                            <label for="logchek" class="text"></label>
                        </div>


                    </div>
                    <!-- botoon de login-->
                    <div class="inputfild button">
                        <button type="submit" name ="cree">sing up</button>
                    </div>
                </form>
                
            </div>
            
        </div>

    </div>

    <!-- foter -->
    <div class="footer">
        <div class="footer-content">
            <!-- Section 1: Liens utiles -->
            <div class="footer-section">
                <h3>Liens Utiles</h3>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Produits</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Section 2: Information de contact -->
            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li>Adresse : 123 Rue Exemple, Paris, France</li>
                    <li>Téléphone : +33 1 23 45 67 89</li>
                    <li>Email : contact@example.com</li>
                </ul>
            </div>

            <!-- Section 3: Réseaux sociaux -->
            <div class="footer-section">
                <h3>Suivez-nous</h3>
                <div class="social-media">
                      
                    <li><a href="#" "><i class="fa-brands fa-facebook"></i>Facebook</a></li>
                    <li><a href="#" "><i class="fa-brands fa-instagram"></i>Instagram</a></li><!-- Twitter -->
                    <li><a href="#" "><i class="fa-brands fa-twitter"></i>Twitter</a></li> <!-- Instagram -->
                    <li><a href="#" "><i class="fa-brands fa-youtube"></i>YouTube</a></li><!-- YouTube -->
                 
                </div>
            </div>

            <!-- Section 4: Newsletter -->
            <div class="footer-section newsletter">
                <h3>Abonnez-vous à notre newsletter</h3>
                <p>Recevez les dernières nouvelles et offres exclusives.</p>
                <input type="email" placeholder="Votre email" required>
                <button type="submit">S'abonner</button>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <p>© 2025 Exemple Entreprise. Tous droits réservés.</p>
        </div>
    </div>




</body>
</html>