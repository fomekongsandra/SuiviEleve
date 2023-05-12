<?php
    $user=shell_exec("echo %username%")
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="ajout.css">
    <title>Ajouter un suivi</title>
</head>
<body>
    <div class="container">
        <div class="head contaner">
            <div class="logo">
                <img src="Image\3il.jpg" alt="logo" width="100" />
            </div>
            <div class="users">
                <div class="user__info">
                    <div class="name"><?php echo("$user");?></div>
                </div>
            </div>		
        </div>
        <center>
            <h1 class="title1">Ajouter un suivi</h1>
        </center>
       <form method="POST">
            <div class="inputname">
                <span class="details">Titre_suivi:</span>
                <input type="text"name="Titre_suivi" placeholder="entrer Titre suivi" required>
            </div> 
            <div class="inputname">
                <span class="details">suivi:</span>
                <textarea name="message" id="" cols="76" rows="10"></textarea>
            </div>
            <br>
            <div class="button">
                <input type="submit"  name="submit" value="enregistrer">
            </div>
            <br>
        </div>
        <p class="error"><?php echo @$error ?></p>
        <p class="success"><?php echo @$uccess ?></p>
        </form>
    
    </div>
</body>

</html>
<?php
 
if(isset($_POST['submit'])){
    $file='Storage/'.$_GET['id'].".json";
    
    $suivi = array(
        "id"=>time(),
        "titre_suivi"=>$_POST['Titre_suivi'],
        "DateAndTime" => date('m-d-Y h:i:s', time()),
        "auteur"=>shell_exec("echo %username%"),
        "suivi"=>$_POST['message']);
    
    $old_records = json_decode(file_get_contents($file));
 
    

    var_dump($old_records[0]);

    var_dump($old_records[0]->suivi);

    array_push($old_records[0]->suivi, $suivi); 

    if(!file_put_contents($file, json_encode($old_records,JSON_PRETTY_PRINT), LOCK_EX)){
        echo "error creating";
    }else{
        echo "success";
    }
}


?>