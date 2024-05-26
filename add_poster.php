<?php include 'header.php'; ?>
<?php include_once("controlador.php") ?>
<h1>Add new poster</h1>

<form action="index.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="formId" value="1">
    Nombre: <input type="text" name="name"><br>
    Descripción: <input type="text" name="description"><br>
    Imagen: <input type="file" name="fichero_usuario"><br>
    <input type="submit">
</form>

<a href="index.php">Go back</a>

<?php include 'footer.php'; ?>