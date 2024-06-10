<?php 
    $servername = 'localhost';
    $username = 'mglsi_user';
    $password = 'passer';
    //On essaie de se connecter
    try {
            $conn = new PDO("mysql:host=$servername; dbname=mglsi_news", $username, $password);
            //On définit le mode d'erreur de PDO sur exception 
            $conn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connexion réussie";
        }
    /*On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci */
    catch (PDOException $e) {
                                echo "Erreur : ". $e->getMessage();
                            }
?>

<html>

    <head>
        <meta charset="utf-8"/>
        <title>Site web d'actualités</title>
        <link href="./css/fichier1.css" rel="stylesheet"/>
    </head>

    <body>

        <nav>
                <a href="#"><img src="./Images/logo1.png" alt="logo" width="30%"/></a>
                <ul>
                    <?php 
                            //Nous préparons notre requête afin d'obtenir un objet PDOStatement qui contient la requête SQL que nous devons exécuter
                            $objetStatement = $conn -> prepare ("select * from Categorie");
                            $el = $objetStatement -> execute();
                            //Nous allons par la suite stocker le résultat dans un tableau
                            $Liste1 = $objetStatement -> fetchAll();
                            foreach ($Liste1 as $tab) {
                    ?>
                    <li> <?php echo $tab['libelle'] ?> </li>
                    <?php } ?>
                </ul>
        </nav>

        <div class="boxes">

            <?php 
                //Nous préparons notre requête afin d'obtenir un objet PDOStatement qui contient la requête SQL que nous devons exécuter
                $objetStatement = $conn -> prepare ("select * from Article");
                $el = $objetStatement -> execute();
                //Nous allons par la suite stocker le résultat dans un tableau
                $Liste2= $objetStatement -> fetchAll();
                                    
                foreach ($Liste2 as $list2) { ?>
            <div class="box1">
            <h3> <?php echo $list2['titre'] ?> </h3> 
            <p> <?php echo $list2['contenu'] ?> </p>  </div> <?php } ?>
        </div>

        <footer>Copyright © The Team </footer>
    </body>
</html>

