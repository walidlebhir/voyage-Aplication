
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
                    <button href><a href="login.html">Login</a></button>
                </ul>
            </div>
        </nav>
        
    <!-- fome login -->
    <div class="continair">
        <div class="form">
           <div class="form login">
                <span class="titre"><i class="fa-solid fa-user"></i>   Login</span>
                
                <form  method="POST">
                    <div class="inputfild">
                        <input name = "email" type="email" placeholder="entrer your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="inputfild">
                        <input name ="password"  type="password" placeholder="entrer your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showh"></i>
                    </div>

                    <div class="chekbox">
                        <div class="content_chek">
                            <input type="checkbox"  id="logchek">
                            <label for="logchek" class="text"></label>
                        </div>

                        <a href="#" class="text"> forgot password</a>

                    </div>
                    <!-- botoon de login-->
                    <div class="inputfild button">
                        <button type="submit" name="login">Login</button>
                        
                    </div>
                </form>
                
                <!-- ajouter des autre service -->
                <div class="login_signup">
                    <p>new member</p>
                    <a href="Compt.php">sing up</a>
                </div>

                <?php 
                    session_start() ; 
                    // conaxion de base de donnes : 
                    require_once "database.php" ; 

                    if(isset($_POST['login'])){
                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            // recuperation des donnes 
                            $email = $_POST['email'] ; 
                            $password = $_POST['password'] ; 
                            
                            if(!empty($email) && !empty($password)){
                                // insertion des donnes par table des empliant : 
                                $sql_requet = "SELECT * FROM admintable WHERE email = ?"; 
                                $var_stm = $pdo->prepare($sql_requet); 
                                $var_stm->execute([$email]); 
                                $dataempl = $var_stm->fetch(PDO::FETCH_ASSOC); 
                                // requet sql pour recuperer des donnes :
                                $sql = "SELECT * FROM compt WHERE email = ?" ; 
                                $stmt = $pdo->prepare($sql); 
                                $stmt->execute([$email]) ; 
                                $dataClient = $stmt->fetch(PDO::FETCH_ASSOC) ; 
                                if($dataClient){
                                    if($password == $dataClient['password']){
                                        // stockage des element dans une session : 
                                        $_SESSION['user'] = $dataClient ; 
                                        
                                        header("Location: pageprofil.php");
                                    }
                                    else{
                                        ?>
                                        <h4 style ="color :red;"> password incorect</h4>
                                        <?php
                                    }
                                }
                                elseif($dataempl){
                                    if($password = $dataempl['passwordemp']){
                                        $_SESSION['empl'] = $dataempl ; 
                                        header("Location: dashAdmin.php");

                                    }
                                }
                                else{
                                    ?>
                                    
                                    <h4 style ="color :red;"> Nom d'utilisateur incorect</h4>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <h4 style ="color :red;">remplie tout les champs</h4>
                                <?php
                            }
                        }
                    }



                ?>


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
                      
                    <li><a href="#" "><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                    <li><a href="#" "><i class="fa-brands fa-instagram"></i> Instagram</a></li><!-- Twitter -->
                    <li><a href="#" "><i class="fa-brands fa-twitter"></i> Twitter</a></li> <!-- Instagram -->
                    <li><a href="#" "><i class="fa-brands fa-youtube"></i> YouTube</a></li><!-- YouTube -->
                 
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