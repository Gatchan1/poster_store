<?php

$myPDO = new PDO('sqlite:postersdb.sq3');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formId'] == "1") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $dir_subida = './imagenes/';
    $picture = basename($_FILES['fichero_usuario']['name']);
    $fichero_subido = $dir_subida . $picture;
    move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido);
    
    $sql = "INSERT INTO posters (name, description, picture) ".
            "VALUES (?,?,?)";

    // echo $query;
    $query = $myPDO->prepare($sql);
    $query->execute([$name, $description, $picture]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formId'] == "2") {
    $id = $_POST['id'];
    
    $sql1 = "DELETE FROM posters WHERE id=?;";
    $query = $myPDO->prepare($sql1);
    $query->execute([$id]);

    $sql2 = "DELETE FROM sizes WHERE id_poster=?;";
    $query = $myPDO->prepare($sql2);
    $query->execute([$id]);
}

$posters = $myPDO->query("SELECT name, description, sizes.size AS size, sizes.price AS price, posters.id AS id, picture FROM posters LEFT JOIN sizes ON posters.id=sizes.id_poster");

?>