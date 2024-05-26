<?php include 'header.php'; ?>
<?php include_once("controlador_edit.php") ?>

<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th></th>
    </tr>
    <tr>
        <td><?= $tamanos[0]['name']; ?></td>
        <td><?= $tamanos[0]['description']; ?></td>
        <td><img class="index" src="imagenes/<?= $tamanos[0]['picture']; ?>" alt="<?= $tamanos[0]['picture']; ?>"></td>
        <td>
            <form action="index.php" method="POST">
                <input type="hidden" name="formId" value="2">
                <input type="hidden" name="id" value="<?= $params['id']; ?>">
                <input type="submit" value="Eliminar">
            </form>
        </td>
    </tr>
</table>
<br>
<?php if ($tamanos[0]['size']) { ?>
    <table class="table">
        <tr>
            <th>Tamaño</th>
            <th>Precio</th>
            <th></th>
        </tr>
        <?php foreach ($tamanos as $clave => $valor) : ?>
            <tr>
                <td><?= $valor['size']; ?></td>
                <td><?= $valor['price']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="formId" value="3">
                        <input type="hidden" name="id" value="<?= $valor['id']; ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>
<br>
<br>
<h4>Añadir nuevo tamaño:</h4>
<form method="POST">
    <input type="hidden" name="formId" value="1">
    Tamaño: <input type="text" pattern="A\d" name="size"><br>
    Precio: <input type="text" pattern="\d+(\.\d{2})?" name="price"><br>
    <input type="submit"> <?php if ($success_add_size) echo $success_add_size; ?>
</form>
<br>
<h4>Editar características:</h4>
<form method="POST">
    <input type="hidden" name="formId" value="2">
    Nombre: <input type="text" name="name" value="<?= $tamanos[0]['name'] ?>"><br>
    Descripción: <textarea name="description" rows="4" cols="50"><?= $tamanos[0]['description'] ?></textarea><br>
    <input type="submit"> <?php if ($success_edit) echo $success_edit; ?>
</form>
<br>
<a href="index.php">Go back</a>
<?php include 'footer.php'; ?>