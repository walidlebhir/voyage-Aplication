<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard avec Sidebar</title>
    <link rel="stylesheet" href="adimin.css">
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
                <li><a href="#"><i class="fa-solid fa-plane-departure"></i> voyages</a></li>
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
       
            


        <!-- Table Section -->
        <main class="table-section">
            <div class="content">
                <h2>Liste des Produits</h2>
                <button class="ajouter"><a href="ajoutvoy.php"  style="text-decoration:none; color:#fff;"><i class="fa-solid fa-plus"></i>  ajouter</a></button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>date_voyage</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--afichage des donnes de voyage -->
                    <?php

                        // afichage des donnes de voyage 
                        require_once "database.php" ; 
                        $sql = "SELECT * FROM voyag " ; 
                        $stmt = $pdo->prepare($sql); 
                        $stmt->execute(); 
                        $data_voyage = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // afichage des donnes 
                        foreach($data_voyage as $voyagedonnes ){
                            ?>

                                <tr>
                                    <td><?php  echo $voyagedonnes['id_voyage']  ?></td>
                                    <td><?php  echo $voyagedonnes['Nom_voyage']       ?></td>
                                    <td><?php  echo $voyagedonnes['description']       ?></td>
                                    <td><?php  echo $voyagedonnes['prix_voyage']       ?></td>
                                    <td><?php  echo $voyagedonnes['date_voyage']       ?></td>
                                    <td class="action">
                                        <button name ="modefie" class="edit-btn"> <a href="modifieV.php?id=<?php echo $voyagedonnes['id_voyage'] ?>" style="color:#000;"><i class="fa-solid fa-pen"></i></a>
                                        </button>
                                        <button name="suprimer"    class="delete-btn"> <a href="supresion.php?id=<?php echo $voyagedonnes['id_voyage'] ?> " style="color:#000;"><i class="fa-solid fa-trash"> </i></a></button>
                                    </td>
                                </tr>





                            <?php
                        }





                    ?>
                </tbody>
            </table>
        </main>
    </div>

    <!-- JavaScript -->
    <script>
        
    </script>

</body>
</html>
