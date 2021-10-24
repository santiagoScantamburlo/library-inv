<?php
include_once '../../configuracion.php';
$datos = data_submitted();

$validador = new validador();

$datos = data_submitted();
$dni = $datos['nro_dni'];
$message = $validador->validarDni($dni);

if ($message != "") {
    header('Location: ../pages/modificarPersona.php?message=' . urlencode($message));
    exit;
}

$abmPersona = new AbmPersona();
$lista = $abmPersona->buscar($datos);

if (!isset($lista[0])) {
    $message = "Persona no encontrada";
    header('Location: ../pages/modificarPersona.php?message=' . urlencode($message));
    exit;
}

$titulo = "Modificar Persona";
include_once '../estructura/cabecera.php';

if (isset($_GET['message'])) {
    echo "<div class='mt-3 col-md-4 card bg-danger text-white'>" . $_GET['message'] . "</div>";
}

?>
<div class="container mt-3">
    <form id="modificarPersona" name="modificarPersona" method="post" action="../acciones/accionModificarDatos.php">
        <div class="col-md-12">
            <?php
            echo "<input id='nro_dni' name='nro_dni' type='hidden' value=" . $lista[0]->getNroDni() . ">";
            echo "<input id='fecha_nac' name='fecha_nac' type='hidden' value=" . $lista[0]->getFechaNac() . ">";
            ?>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <?php
                echo "<input class='form-control' id='apellido' name='apellido' type='text' placeholder='Apellido' value='{$lista[0]->getApellido()}'>";
                ?>
                <label for="apellido">Ingrese su apellido</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <?php
                echo "<input class='form-control' id='nombre' name='nombre' type='text' placeholder='Nombre' value='{$lista[0]->getNombre()}'>";
                ?>
                <label for="nombre">Ingrese su nombre</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <?php
                echo "<input class='form-control' id='telefono' name='telefono' type='text' placeholder='Teléfono' value='{$lista[0]->getTelefono()}'>";
                ?>
                <label for="telefono">Ingrese su teléfono</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <?php
                echo "<input class='form-control' id='domicilio' name='domicilio' type='text' placeholder='Domicilio' value='{$lista[0]->getDomicilio()}'>";
                ?>
                <label for="domicilio">Ingrese su domicilio</label>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>