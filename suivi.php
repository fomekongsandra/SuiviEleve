<?php 
    $file='Storage/'.$_GET['id'].".json";
    // $id=$_GET('identifiant');
    if(!file_exists($file))
    {
        require_once('index.php');
    }
    else
    {
        require_once('ajoutersuivi.php');
    }
?>

