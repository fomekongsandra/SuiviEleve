<?php
    $user=shell_exec("echo %username%")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="liste.css">
    <title>liste suivis</title>
</head>
<body>
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
        <div class="button">
                <input type="submit"  name="save" value="ajouter suivi">
        </div>
<center><h1>liste de suivi</h1></center><br>
    <?php
     $file='Storage/'.$_GET['id'].".json";
       $old_records = json_decode(file_get_contents($file));
       $tab_suivis=$old_records[0]->suivi;
     foreach($tab_suivis as $elt)
     {
    ?>
    <div class="container">
  
        <div class="user">
            <div class="inputname">
                <span class="details"><h2><?=$elt->titre_suivi?></h2></span>
            </div><br>
            <div class="inputname">
                <span class="details"><small><?=$elt->auteur?> <?=$elt->DateAndTime?></small></span>
            </div><br>
            <!-- <div class="inputname">
                <span class="details"><small><?=$elt->DateAndTime?></small></span>
            </div><br> -->
            <div class="inputname">
                <span class="details"><h3><?=$elt->suivi?></h3></span>
            </div><br>
        </div>
        <div class="btn">
            <div class="button">
             <a href="?id=<?=$_GET['id']?>&id_suivi=<?=$elt->id?>"><input type=""  name="save" value="supprimer"></a>
                
            </div>
            <div class="button">
            <a href="ajoutersuivi.php?id=<?=$_GET['id']?>">
                <input  name="save" value="ajouter suivi">
           </a>
            </div>
        </div>
  
    </div><br>
</body>
    <?php
     }
     if(isset($_GET['id_suivi'])){
        $file='Storage/'.$_GET['id'].".json";
        
        // $suivi = array(
        //     "id"=>time(),
        //     "titre_suivi"=>$_POST['Titre_suivi'],
        //     "DateAndTime" => date('m-d-Y h:i:s', time()),
        //     "auteur"=>shell_exec("echo %username%"),
        //     "suivi"=>$_POST['message']);
        
        $old_records = json_decode(file_get_contents($file));
     
        $new_suivis=[];
      
        foreach($old_records[0]->suivi as $suiv)
        {
            if($suiv->id!=$_GET['id_suivi'])
            {
                array_push($new_suivis, $suiv); 
            }
        }
        // var_dump($old_records[0]);
    
        // var_dump($old_records[0]->suivi);
        $old_records[0]->suivi=[];
        $old_records[0]->suivi= $new_suivis; 
        // var_dump($old_records[0]);
        if(!file_put_contents($file, json_encode($old_records,JSON_PRETTY_PRINT), LOCK_EX)){
            echo "error creating";
        }else{
            echo "success";
        }
    }
    

     ?>
</html>