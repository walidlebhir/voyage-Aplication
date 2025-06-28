<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard avec Sidebar</title>
    <link rel="stylesheet" href="adimin.css">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="imageprofil/SafariWorld-logo-01.png" alt="">
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="#">Tableau de Menu</a></li>
                <li><a href="Admin.php"><i class="fa-solid fa-plane-departure"></i> voyages</a></li>
                <li><a href="rasAdmin.php"><i class="fa-solid fa-calendar-days"></i> Reservation</a></li>
                <li><a href="utilisateur.php"><i class="fa-solid fa-users"></i>   Utilisateurs</a></li>
                <li><a href="#"><i class="fa-solid fa-star"></i> Parametre</a></li>
                <li class="deco"><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        
        <!-- Navbar -->
        <nav class="navbar">
           <h2>Admin</h2>
            <div class="recherche">
                <input name ="data_recherche" type="text" placeholder="Rechercher ..." >
                <button class="btn" name="recherche"><i class="fa-solid fa-magnifying-glass"></i></button>

            </div>
            <div class="menu">
                <ul class="menu_links">
                    
                    <li><a href=""><i class="fa-solid fa-bell"></i></a></li>
                    <li><a href=""><i class="fa-solid fa-envelope"></i></a></li>
                    <li><a href="dashAdmin.php"><i class="fa-solid fa-user"></i></a></li>
                </ul>
            </div>
        </nav>

        <div class="titile">
            Bienvenue sur la plateforme d'adminestration 
        </div>

        <section class="secp">
            <div class="pageadmin">
                <div class="componentP">
                    <p class="p0">Raport</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-file"></i>
                </div>
            </div>
            <div class="pageadmin">
                <div class="componentP">
                    <p class="p1">statistique</p>
                </div>
                <div class="icon">
                <i class="fa-solid fa-chart-simple"></i>
                </div>
            </div>
            <div class="pageadmin">
                <div class="componentP">
                    <p  class="p2">description</p>
                </div>
                <div class="icon">
                <i class="fa-solid fa-chart-pie"></i>
                </div>
            </div>
            <div class="pageadmin">
                <div class="componentP">
                    <p class="p3">securité</p>
                </div>
                <div class="icon">
                <i class="fa-solid fa-shield-halved"></i>
                </div>
            </div>

        </section>

        <section class="adminfo">
            
            
            
            <div class="form-container">
            <?php
                session_start();
                require_once "database.php" ; 
                $id_emploiye = $_SESSION['empl']['idempl'] ;  
        
                // code php pour la modefication : 
                if(isset($_POST['modefie'])){
                    // recuperation des donnes 
                    $Nom = $_POST['nom'] ; 
                    $email = $_POST['email']; 
                    $password_empl = $_POST['password']; 
                    if(!empty($Nom) && !empty($email) && !empty($password_empl)){
                        if(filter_var($email , FILTER_VALIDATE_EMAIL)){
                            if(strlen($password_empl)<= 10){
                                // requete de modefication des donnes d'emploiant 
                                $sql_requete = "UPDATE admintable SET nom = ? , email =? , passwordemp=? WHERE idempl=?"; 
                                $stmt_var = $pdo->prepare($sql_requete); 
                                $stmt_var->execute([$Nom , $email , $password_empl , $id_emploiye]); 
                            }
                            else{
                                ?>
                                    <h3 style="color:red;">la longeur de password inferieur a 10 caractaire</h3>
                                <?php
                            }
                        }
                        else{
                            ?>
                                <h3 style ="color:red;">Respecter format d'emeil</h3>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <h3 style ="color:red;">Remplie tout les champs</h3>
                        <?php
                    }

                }







                // afichage des inormation d'emploiye :
                
                
                $sql_requete = "SELECT * FROM admintable WHERE idempl = ? "; 
                $stmt = $pdo->prepare($sql_requete); 
                $stmt->execute([$id_emploiye]); 
                $data_emploiyant = $stmt->fetch(PDO::FETCH_ASSOC); 



            ?>
                <h2> Emploiyé </h2>
                <hr>
                <br>
                <form  method="POST">
                    
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="<?php echo $data_emploiyant['nom'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" value="<?php echo $data_emploiyant['email']  ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" value="<?php echo $data_emploiyant['passwordemp']?>" required>
                    </div>

                    <button type="submit" class="submit-btn" name ="modefie">Modefie</button>
                </form>
            </div>

            <div class="publication">
                <h2>Relation exterieur </h2>
                <hr>
                <div class="comp">
                    <i class="fa-solid fa-share-from-square"></i>
                    <h3>transaction banquaire</h3>
                    
                </div>
                <div class="comp">
                    <i class="fa-solid fa-print"></i>
                    <h3>Les reves banquaire </h3>
                    
                </div>
                <div class="comp">
                    <i class="fa-brands fa-paypal"></i>
                    <h3>informations sur   type <br> de paiement </h3>
                    
                </div>
            </div>  
        </section>

            <!--creation d'une graphe a une id (chart) ->fichies javascript  -->
        <div class="shert">
            <div id="chart"></div>
        </div>



                
                
            
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script src="dash.js"></script>
            

            
      
        
        
</body>
</html>
