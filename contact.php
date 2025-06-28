<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageProfil.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>contact</title>
</head>
<body>
    
    <div class="hero">
    <?php 
        session_start(); 
        $infoclient =  $_SESSION['user'] ; 


    ?>
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
                        <h2><?php echo $infoclient['Nom'] ?></h2>
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

    <!-- creation du contact -->
    <section id="contact">
        <div class="contact-container">
            <div class="contact-form">
                <?php 
                    // traitement de contact des clients 
                    require_once "database.php" ; 
                    //receperation des donnes 
                    $idcompt = $infoclient['idcompt']; 
                    if(isset($_POST['envoyer'])){
                        $email = $_POST['email'] ; 
                        $message = $_POST['message'] ; 
                        $nomclient = $_POST['nom'] ; 
                        if(!empty($email) && !empty($nomclient) && !empty($message) ){
                            // inseret les donnes dans base de donnes 
                            $sql = "INSERT INTO contact(id_compt , email , massage ) VALUES (? ,? ,?)"; 
                            $stm = $pdo->prepare($sql) ; 
                            $stm->execute([$idcompt , $email , $message]); 
                            if($stm){
                                // afichage message que le message est envoyer 
                                ?>
                                <h4 style ="color:green;">Message est bien envoyer </h4>
                                <?php
                            }
                            else{
                                ?>
                                <h4 style ="color :red; ">problemme dans systeme </h4>
                                <?php 
                            }
                        }
                        else{
                            ?>
                            <h4 style = "color:red;">Remplie tout les champs </h4>
                            <?php 
                        }

                    }




                ?>
                <h2>Contactez-nous</h2>
                <form action="#" method="POST">
                    <input type="text" id="nom" name="nom" placeholder="Nom" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <textarea id="message" name="message" placeholder="Message" required></textarea>
                    <button type="submit" name ="envoyer">Envoyer</button>
                </form>
            </div>
    
            <div class="map">
                <h2>Où nous trouver</h2>
                <!-- Intégration d'une carte Google Maps -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11130.950818617774!2d-6.880481653357573!3d33.96037526974552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7132b7118bfbd%3A0x2f9cad14202306ec!2sHay%20Riad%2C%20Rabat!5e0!3m2!1sfr!2sma!4v1736600438332!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    






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