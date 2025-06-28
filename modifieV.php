<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modefie donnes</title>
    <link rel="stylesheet" href="ajouv.css"> <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="nav_bar">
        <div class="logo">
            <img src="imageprofil/SafariWorld-logo-01.png" alt="">
        </div>
        <div class="list">
            <ul>
                <li><a class="text" href="Admin.php">Admin</a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="bodyform">
        <div class="form-container">
            <h2>Modefication voyage </h2>
            <?php 
                require_once "database.php" ; 
                $id_voyege = $_GET['id']; 
                
                

                //==> modefication des donnes : 
                if(isset($_POST['modefie'])){
                    $Nom = $_POST['nom'] ; 
                    $description = $_POST['description']; 
                    $prix = $_POST['prix']; 
                    $date = $_POST['date']; 

                    $date_voyage_objet = new DateTime($date); 
                    if(!empty($Nom) && !empty($description) && !empty($prix) && !empty($date)){

                        $dateactuelle = new DateTime(); 
                        if($date_voyage_objet > $dateactuelle){
                            // on fait la modefication des donnes 
                            $sql = "UPDATE voyag SET Nom_voyage = ? , description = ? , prix_voyage=? , date_voyage= ?"; 
                            $stmt = $pdo->prepare($sql); 
                            $stmt->execute([$Nom , $description , $prix , $date]); 
                            if($stmt){
                                header("Location: Admin.php"); 
                            }
                        }

                    }
                }


                // afichage des donnes : 
                $sql_requet = "SELECT * FROM voyag WHERE id_voyage = ? "; 
                $variable_stmt = $pdo->prepare($sql_requet); 
                $variable_stmt->execute([$id_voyege]); 
                $datavoyage = $variable_stmt->fetch(PDO::FETCH_ASSOC); 
                


            ?>
            <form  method="POST" >
                <!-- Champ Nom -->
                <div class="input-group">
                    <label for="nom">Nom de voyage :</label>
                    <input type="text" id="nom" name="nom" value="<?php  echo $datavoyage['Nom_voyage'] ?>" required>
                </div>
                

            <!-- Champ Description -->
                <div class="input-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description"  value="<?php echo $datavoyage['description'] ?>" required></textarea>
                </div>

            <!-- Champ Prix -->
                <div class="input-group">
                    <label for="prix">Prix :</label>
                    <input type="number" id="prix" name="prix" value="<?php  echo $datavoyage['prix_voyage'] ?>" required >
                </div>


                <div class="input-group">
                    <label for="prix">Date voyage :</label>
                    <input type="text" id="prix" name="date"   value="<?php echo $datavoyage['date_voyage'] ?>"  required  >
                </div>


                

                

            <!-- Bouton de soumission -->
                <div class="form-actions">
                    <input type="submit" value="Ajouter le Produit" name="modefie"  >
                </div>
            </form>
        </div>
    </div>
</body>
</html>
