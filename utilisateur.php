<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation Admin </title>
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
                <li><a href="Admin.php"><i class="fa-solid fa-plane-departure"></i> voyages</a></li>
                <li><a href="rasAdmin.php"><i class="fa-solid fa-calendar-days"></i> Reservation</a></li>
                <li><a href="#"><i class="fa-solid fa-users"></i>   Utilisateurs</a></li>
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
                <h2>Liste des reservations</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>id compt</th>
                        <th>Nom client</th>
                        <th>Email client</th>
                        <th>password client </th>
                        
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        require_once "database.php" ; 
                        
                        // afiche des compt de client : 
                        $SQL = "SELECT * FROM compt "; 
                        $stmtnt = $pdo->prepare($SQL); 
                        $stmtnt->execute(); 
                        $donnes_compt = $stmtnt->fetchAll(PDO::FETCH_ASSOC); 

                        
                        
                        foreach($donnes_compt as $compt ){
                            ?>

                                <tr>
                                    <td><?php  echo $compt['idcompt'] ?></td>
                                    <td><?php  echo    $compt['Nom']  ?></td>
                                    <td><?php  echo     $compt['email']   ?></td>
                                    <td><?php  echo    $compt['password'] ?></td>
                                    
                                    <td class="action">
                                        <button name ="modefie" class="edit-btn"><i class="fa-solid fa-pen"></i></button>
                                        <button name="suprimer"    class="delete-btn"> <a href="#" style="color:#000;"><i class="fa-solid fa-trash"> </i></a></button>
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
