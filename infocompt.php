<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageProfil.css">
    <link rel="stylesheet" href="infoCompt.css">
    <title>Compt</title>
</head>
<body>

    <?php 
        session_start(); 
        $infoclient =  $_SESSION['user'] ; 
        $id_client = $infoclient['idcompt'] ; 
        require_once "database.php" ; 
        $sql_requet = "SELECT * FROM compt WHERE idcompt = ? " ; 
        $stmt = $pdo->prepare($sql_requet) ;
        $stmt->execute([$id_client]) ; 
        // recuprere resultat : 
        $datacompt  = $stmt->fetch(PDO::FETCH_ASSOC) ; // recuperation des donnes sosu forme du tableaux assosiative 


        // recuperation des donnes : 
        if(isset($_POST['modefie'])){
            $name = $_POST['name'] ; 
            $email_modefie = $_POST['email'] ; 
            $password = $_POST['password'] ;
            if(!empty($name) && !empty($email_modefie) && !empty($password)){
                // modefication des donnes au niveaux de basede donnes 
                $sql="UPDATE compt SET Nom = ? , email = ? , password = ? WHERE idcompt = ?"; 
                $resultat = $pdo->prepare($sql) ; 
                $resultat->execute([$name , $email_modefie , $password , $id_client]); 
                header("Location: infocompt.php");

            }
            
        }



    ?>


    <div class="hero">
        <nav>
            <img src="imageprofil/SafariWorld-logo-01.png" class="logo">
            
            
            <ul>
                <li><a href="pageprofil.php">Profil</a></li>
                <li><a href="reservation.php">Reservation</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="#">Publication</a></li>
            </ul>
            <img src="imageprofil/profilimg.jpg" class="user-pic" onclick="toggleMenu()">

            <div class="sub_menuwrap" id="subMenu">
                <div class="sub_menu">
                    <div class="user_info">
                        <img src="imageprofil/profilimg.jpg" >
                        <h2><?php echo $datacompt['Nom'] ?> </h2>
                    </div>
                    <hr>

                    <!-- creation d'autre compenent -->
                    <a href="#" class="sub-menu-link">
                        <img src="imageprofil/profile.png">
                        <p>Compt</p>
                        <span> > </span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <img src="imageprofil/setting.png">
                        <p>parametre </p>
                        <span> > </span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <img src="imageprofil/help.png">
                        <p>idée</p>
                        <span> > </span>
                    </a>


                    <a href="login.php" class="sub-menu-link">
                        <img src="imageprofil/logout.png">
                        <p>déconexion</p>
                        <span> > </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>



    <!--profil page -->
    <div class="contact-container">
        <div class="contact-form">
            <h2>Modifier les informations du profil</h2>


            <form  method= "POST" >
                <div class="form-row">
                    <label for="name">Nom :</label>
                    <input type="text"  name="name" value="<?php echo $datacompt['Nom'] ?>">
                    
                </div>

                <div class="form-row">
                    <label for="email">Email :</label>
                    <input type="email"  name="email" value="<?php echo $datacompt['email'] ?>" >
                    
                </div>

                <div class="form-row">
                    <label for="password">Mot de passe :</label>
                    <input type="text"  name="password" value="<?php echo $datacompt['password'] ?>" >
                    
                </div>

                

                <div class="form-submit">
                    <button type="submit" name="modefie">Enregistrer</button>
                </div>
            </form>
        </div>

        <div class="contact-info">
            <div class="profile-picture">
                <img src="imageprofil/profilimg.jpg" alt="Photo de profil">
            </div>
            <div class="profile-details">
                <h3><?php echo $datacompt['Nom'] ?></h3>
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








    <script src="profil.js"></script>
    <!-- code javascript pour fait gestion dynamique de clique -->
    <script>    
    let subMenu = document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open_menu") ; 
    }

    </script>



    

        
</body>
</html>