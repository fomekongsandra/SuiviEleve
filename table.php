<?php
    $user=shell_exec("echo %username%");
    $nom_dossier = 'Storage';
    $listEtudiants=ListEtudiants( $nom_dossier );
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
    <title>creation d'un nouvel etudiant</title>

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
            <h1 class="title1">Enregistre un etudiant</h1>
        </center>
       <form method="POST">
            <!-- <div>
                <br>
            </div> -->
            <div class="user">
                <div class="inputname">
                <span class="details">Nom</span>
                <input type="text"  name="nom" placeholder="entrer votre nom" required>
            </div>
            <div class="inputname">
                <span class="details">prenom</span>
                <input type="text"name="prenom" placeholder="entrer votre prenom" required>
            </div>
            <div class="inputname">
                <span class="details">Telephone</span>
                <input type="tel"name="telephone" placeholder="entrer numero de telephone" required>
            </div>
            <div class="button">
                <input type="submit"  name="submit" value="enregistrer">
            </div>
            <br>
        </div>
        <p class="error"><?php echo @$error ?></p>
        <p class="success"><?php echo @$uccess ?></p>
        </form>
    
    </div>

    <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Liste <b>Des Etudians</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                   foreach($listEtudiants as $elt)
                   {

                        
                        ?>
                        <tr>
                        <th scope="row"><?=$elt->nom?></th>
                        <td><?=$elt->prenom?></td>
                        <td><?=$elt->telephone?></td>
                        <td>
                            <a class="view" title="View" data-toggle="tooltip"  href="listesuivi.php?id=<?=$elt->identifiant?>"><i class="material-icons">&#xE417;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip" href="suivi.php?id=<?=$elt->identifiant?>"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip" href="?id_delete=<?=$elt->identifiant?>"><i class="material-icons">&#xE872;</i></a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
<?php
 
if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $new_suivi = array(
        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "telephone"=>$_POST['telephone'],
        "identifiant"=> $id,
        "suivi" =>[], 
    );
    $file_name = 'Storage/'.$new_suivi['identifiant'] . '.json';
    if(filesize($file_name) == 0){
        $first_record=array($new_suivi);
        $save_data = $first_record;
    }else{
        $old_records = json_decode(file_get_contents($file_name));

        array_push($old_records, $new_suivi);
        $save_data = $old_records;
    }

    if(!file_put_contents($file_name, json_encode($save_data,JSON_PRETTY_PRINT), LOCK_EX)){
        echo "error creating";
    }else{
        echo "success";
    }
}


function ListEtudiants( $nom_dossier)
{
    
    // $sous_dossier = opendir($nom_dossier); 
    $etudiants=[];

    $scandir = scandir($nom_dossier);
    foreach($scandir as $fichier){
        $fich=substr(strtolower($fichier),-5,5);
        if($fich==".json"){
           
    
       $filename=$nom_dossier.'/'.$fichier;
       $etudiant = json_decode(file_get_contents($filename));
   
       array_push($etudiants, $etudiant[0]); 
      }
    }      

return $etudiants;

}

?>