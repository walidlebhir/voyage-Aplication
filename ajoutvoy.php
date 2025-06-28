<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
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
            <h2>Ajouter une voyage </h2>
            <?php 
                // ==> ajouter une voyage 
                
                require_once "database.php" ; 
                if(isset($_POST['ajouter'])){
                    //==> recuperation des donnes 
                    $Nom = $_POST['nom'] ; 
                    $date_voyage =$_POST['date'] ; 
                    $description = $_POST['description']; 
                    $prix_voyage = $_POST['prix']; 

                    // => recuperation des donnes d'image : 
                    $nom_image = $_FILES['image']['name']; 
                    $type_image = $_FILES['image']['type']; 
                    $tail_image = $_FILES['image']['size']; 
                    $contenue_image =file_get_contents($_FILES['image']['tmp_name'] ); 

                    $date_actuelle = new DateTime(); 

                    $date_voyage_obje = new DateTime($date_voyage) ; 

                    if(!empty($Nom) && !empty($description) && !empty($prix_voyage) && !empty($date_voyage)){
                        if($date_voyage_obje > $date_actuelle){
                            // ==> requete d'insertion des donnes ==> voyage 
                            $sql_requete = "INSERT INTO voyag(Nom_voyage , description , prix_voyage ,date_voyage,Nom_img,type_img,tail,binimg) VALUES (?,?,?,?,?,?,?,?)" ; 
                            $stmt = $pdo->prepare($sql_requete); 
                            $stmt->execute([$Nom , $description , $prix_voyage , $date_voyage , $nom_image , $type_image , $tail_image , $contenue_image]); 
                            if($stmt){
                                // rederection ver dashbord : 
                                header("Location:Admin.php"); 
                            }
                            else{
                                ?>
                                    <h3 style="color:red;">Problemme dans ajout de voyage </h3>
                                <?php
                            }
        

                        }
                        else{
                            ?>
                                <h3 style ="color:red;"> imposible de passer cette date  </h3>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <h3 style ="color:red;"> Remplie tout les champs </h3>
                        <?php
                    }
                    
                }
                    
                



            ?>
            <form  method="POST" enctype="multipart/form-data">
                <!-- Champ Nom -->
                <div class="input-group">
                    <label for="nom">Nom de voyage :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                

            <!-- Champ Description -->
                <div class="input-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" required></textarea>
                </div>

            <!-- Champ Prix -->
                <div class="input-group">
                    <label for="prix">Prix :</label>
                    <input type="number" id="prix" name="prix" required step="0.01">
                </div>


                <!--ajouter une date -->
                <div class="input-group">
                    <label for="nom">Date voyage :</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="upload-container">
                    <label for="image-upload">Choisir une image :</label>
                    <input type="file"  name="image" />
                </div>

            <!-- Bouton de soumission -->
                <div style="margin:15px;" class="form-actions">
                    <input type="submit" value="Ajouter le Produit" name="ajouter"  >
                </div>
            </form>
        </div>
    </div>
</body>
</html>
