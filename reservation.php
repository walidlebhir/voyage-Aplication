<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation.css">
    <link rel="stylesheet" href="pageProfil.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Reservation</title>
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
                        <h2><?php echo $infoclient['Nom']  ?></h2>
                    </div>
                    <hr>

                    <!-- creation d'autre compenent -->
                    <a href="infocompt.php" class="sub-menu-link">
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


    <!-- formulaire de reservation -->
    <section>
        <?php
            // traitemet de formulaire de reservation : 
            require_once "database.php" ; 

            $id_voyage = $_GET['id']; 
            $idcompt =  $_SESSION['user']['idcompt'] ; 
            if(isset($_POST['reserver'])){
                //==> Recuperation des donnes : 
                $Nom_clinet = $_POST['name']; 
                $adres_email = $_POST['email']; 
                $numero_cart = $_POST['card-number']; 
                $date_experence = $_POST['expiry-date']; 
                $code_securite = $_POST['cvv']; 

                $date_actuelle = new DateTime(); 
                $date_exeprence_onjet = new DateTime($date_experence) ; 

                if(!empty($Nom_clinet) && !empty($adres_email) && !empty($numero_cart) && !empty($date_experence) && !empty($code_securite)){
                    if(filter_var($adres_email , FILTER_VALIDATE_EMAIL)){
                        if(strlen($numero_cart) == 6){
                            if(strlen($code_securite)== 4 ){
                                if($date_exeprence_onjet > $date_actuelle){
                                    // inserction des donnes : 
                                    $SQL_Requete = "INSERT INTO reservation(id_compt,idvoyage,Nom,Email,date_experation,code_securite,numero_cart) VALUE (?,?,?,?,?,?,?)" ; 
                                    $stm = $pdo->prepare($SQL_Requete); 
                                    $stm->execute([$idcompt , $id_voyage , $Nom_clinet , $adres_email , $date_experence , $code_securite , $numero_cart]); 
                                    if($stm){
                                        ?>
                                            <h3 style="color:green;">Reservation efectue </h3>
                                        <?php
                                        header("Location:pageprofil.php"); 

                
                                    }
                                }

                            }
                                
                        }
                    }



                }

                
            }
                

            


            

        ?>
        <h2>Formulaire de Réservation</h2>
        
        <form  method="POST">
            <!-- Informations personnelles -->
            <label for="name">Nom complet :</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" required>

            <!-- Informations de paiement -->
            <label for="card-number">Numéro de carte :</label>
            <input type="text" id="card-number" name="card-number" required>

            

            <label for="cvv">Code de sécurité (CVV) :</label>
            <input type="text" id="cvv" name="cvv" required>

            <label for="expiry-date">Date d'expiration (MM/AA) :</label>
            <input type="date" id="expiry-date" name="expiry-date" required>

            <button type="submit" style="margin:10px 0;" name ="reserver">Soumettre la réservation</button>
        </form>
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