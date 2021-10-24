<?php
$titulo = "Listar Personas";
include_once '../estructura/cabecera.php';
if (isset($_GET['message'])) {
    print "<script type='text/javascript'>alert('" . $_GET['message'] . "')</script>";
}
$abmPersona = new AbmPersona();
$lista = $abmPersona->buscar(null);
if (count($lista) > 0) {
?>

    <div class="container mt-3">
        <table class='table'>
            <thead class='table-dark'>
                <tr>
                    <th scope='col' class='text-center'>DNI</th>
                    <th scope='col' class='text-center'>Apellido</th>
                    <th scope='col' class='text-center'>Nombre</th>
                    <th scope='col' class='text-center'>Fecha de nacimiento</th>
                    <th scope='col' class='text-center'>Telefono</th>
                    <th scope='col' class='text-center'>Domicilio</th>
                    <th scope='col' class='text-center'>Editar</th>
                    <th scope='col' class='text-center'>Eliminar</th>
                </tr>
            </thead>

        <?php

        foreach ($lista as $var) {
            $dni = $var->getNroDni();
            echo "<tr>
            <td class='text-center'>$dni</td>
            <td class='text-center'>{$var->getApellido()}</td>
            <td class='text-center'>{$var->getNombre()}</td>
            <td class='text-center'>{$var->getFechaNac()}</td>
            <td class='text-center'>{$var->getTelefono()}</td>
            <td class='text-center'>{$var->getDomicilio()}</td>";

            echo "<form method='post' action='../acciones/accionModificarPersona.php'>
        <td class='text-center'>
        <input name='nro_dni' id='nro_dni' type='hidden' value='$dni'><button class='btn btn-warning btn-sm' type='submit'><i class='fas fa-user-edit'></i></button></td></form>
        <form method='post' action='../acciones/accionEliminarPersona.php'>
        <td class='text-center'>
        <input name='nro_dni' id='nro_dni' type='hidden' value='$dni'><button class='btn btn-warning btn-sm' type='submit'><i class='bi bi-trash'></i></button></td></form></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>No hay personas cargadas en la base de datos</h1>";
    }

        ?>
    </div>

    <?php
    include_once '../estructura/pie.php';
    ?>