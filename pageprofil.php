<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageProfil.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>ptofilpage</title>
</head>
<body>
    
    <div class="hero">
        <nav>
            <img src="imageprofil/SafariWorld-logo-01.png" class="logo">
            
            
            <ul>
                <li><a href="#">Profil</a></li>
                <li><a href="reservation.php">Reservation</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="#">Publication</a></li>
            </ul>
            <img src="imageprofil/profilimg.jpg" class="user-pic" onclick="toggleMenu()">

            <?php 
                session_start() ; 
                // conexion de base de donnes 
                require_once "database.php" ; 
                // recuperation des donnes de session 
                $dataClientlogin = $_SESSION['user'] ; 
                
                
                


            ?> 
            <div class="sub_menuwrap" id="subMenu">
                <div class="sub_menu">
                    <div class="user_info">
                        <img src="imageprofil/profilimg.jpg" >
                        <h2> <?php echo $dataClientlogin['Nom'] ?></h2>
                    </div>
                    <hr>

                    <!-- creation d'autre compenent -->
                    <a href="infocompt.php" class="sub-menu-link">
                        <img src="imageprofil/profile.png">
                        <p>Compt</p>
                        <span> <i class="fa-solid fa-right-to-bracket"></i> </span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <img src="imageprofil/setting.png">
                        <p>parametre </p>
                        <span> <i class="fa-solid fa-right-to-bracket"></i> </span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <img src="imageprofil/help.png">
                        <p>idée</p>
                        <span> <i class="fa-solid fa-right-to-bracket"></i> </span>
                    </a>


                    <a href="login.php" class="sub-menu-link">
                        <img src="imageprofil/logout.png">
                        <p>déconexion</p>
                        <span> <i class="fa-solid fa-right-to-bracket"></i> </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- creation d'autre nav bar -->
    
    
    <!-- autre composnat -->
    <div class="messageclient">
        
        <div class="content" >
            <h3><i class="fa-solid fa-triangle-exclamation"></i>  Problème avec le Service ?</h3>
            <p> En cas de problème avec notre service, n'hésitez pas à contacter notre agencebr  pour une assistance rapide et efficace.</p>
            <button >contacter > </button>
        </div>

    </div>

    <!--image et text  -->
    <section class="oner">
        <div class="imgoner">
            <img src="imageprofil/image3.jpg" alt="image">
            <p>interieur desin produit  </p>
        </div>
        <div class="contentbox">
            <h2 class="smailtitle">Service de Réservation</h2>
            <h3 class="bigtitle">Expérience Clé en Main </h3>
            <p>Un service de réservation de voyage organisé propose des forfaits tout-en-un incluant transport, hébergement et activités, facilitant la planification pour les voyageurs</p>
            <p>Il offre une expérience clé en main, souvent accompagnée d'un guide, pour garantir confort et sérénité</p>
            <p>Ce service permet également de bénéficier d'un itinéraire personnalisé et de l'expertise d'agences spécialisées, assurant une organisation sans stress.</p>
            <p>Les voyageurs peuvent ainsi profiter pleinement de leur séjour en toute tranquillité, sans se soucier des détails logistiques.</p>
            <button  class="white-btn dark-btn">know more<i class="fa-solid fa-angle-right"></i> </button>
        </div>
    </section>

    
    <!-- creation des dive pour les voyage -->
    <div class="voyages-container">
        
        <?php   
            // afchage des voyage : 
            require_once "database.php" ; 
            $sqlrequete = "SELECT * FROM voyag "; 
            $variavlestm = $pdo->prepare($sqlrequete); 
            $variavlestm->execute(); 
            $voyages = $variavlestm->fetchAll(PDO::FETCH_ASSOC); 
            
            foreach($voyages as $voyage){
               
                 $imageData = $voyage['binimg'];
                $imageType = 'image/jpeg'; 

                // Générer un code pour afficher l'image en base64
                $imageSrc = 'data:' . $imageType . ';base64,' . base64_encode($imageData);
                ?>
                    <div class="voyage-card">
                        <img src="<?php  echo $imageSrc ?>" alt="Voyage Japon">
                        <h3><?php  echo $voyage['Nom_voyage'] ?></h3>
                        <span class="date"><?php  echo $voyage['date_voyage'] ?></span>
                        <p><?php  echo $voyage['description'] ?></p>
                        <div class="price">€<?php  echo $voyage['prix_voyage'] ?></div>
                        <a href="reservation.php?id=<?php echo $voyage['id_voyage'] ?>" class="button">Réserver</a>
                    </div>



                <?php
                
            }



        ?>
        
        
        
        
        

    </div>
    
   





    <!-- ajouter une foter -->

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
        // classlist.toggle est une methode pour acses au element dans css
        subMenu.classList.toggle("open_menu") ; 
    }

    
    
    
    </script>




</body>
</html>