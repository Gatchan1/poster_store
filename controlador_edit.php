<?php

$myPDO = new PDO('sqlite:postersdb.sq3');

$params_str = parse_url($_SERVER['REQUEST_URI']);
parse_str($params_str['query'], $params);

$success_add_size ="";
$success_edit="";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formId'] == "1") {
    $id = $params['id'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO sizes (id_poster, size, price) ".
            "VALUES (?,?,?)";

    // echo $query;
    $query = $myPDO->prepare($sql);
    $query->execute([$id, $size, $price]);
    $success_add_size = "<p>Tamaño satisfactoriamente añadido.</p>";
    $success_edit = "";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formId'] == "2") {
    $id = $params['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $sql = "UPDATE posters SET name=?, description=? WHERE id=?";

    $query = $myPDO->prepare($sql);
    $query->execute([$name, $description, $id]);
    $success_edit = "<p>Artículo satisfactoriamente editado.</p>";
    $success_add_size ="";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formId'] == "3") {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM sizes WHERE id=?";

    $query = $myPDO->prepare($sql);
    $query->execute([$id]);
}

$result = $myPDO->query("SELECT name, description, sizes.size AS size, sizes.price AS price, sizes.id as id, picture FROM posters LEFT JOIN sizes ON posters.id=sizes.id_poster WHERE posters.id=".$params['id']);

$tamanos = $result->fetchAll();

?>