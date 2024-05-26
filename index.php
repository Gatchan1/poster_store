<?php include 'header.php'; ?>
<?php include_once("controlador.php") ?>
<h1>Inicio</h1>

<a href="add_poster.php">Add new item to store</a>

<h1>Posters </h1>
<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
    </tr>
    <?php
    $id = 0;
    foreach ($posters as $clave => $valor) :
        if ($id != $valor['id']) {
    ?>
            <tr>
                <td><?= $valor['name']; ?></td>
                <td><?= $valor['description']; ?></td>
                <td><?= $valor['size']; ?></td>
                <td><?= $valor['price']; ?></td>
                <td><img class="index" src="imagenes/<?= $valor['picture']; ?>" alt="<?= $valor['picture']; ?>"></td>
                <td><a href="edit_poster.php?id=<?= $valor['id']; ?>">Editar</a></td>
            </tr>
        <?php
            $id = $valor['id'];
        } else { ?>
            <tr>
                <td></td>
                <td></td>
                <td><?= $valor['size']; ?></td>
                <td><?= $valor['price']; ?></td>
                <td></td>
                <td></td>
            </tr>
        <?php } ?>

    <?php endforeach; ?>

</table>

<?php include 'footer.php'; ?>