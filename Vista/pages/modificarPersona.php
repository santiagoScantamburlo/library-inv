<?php
include_once '../estructura/cabecera.php';
if (isset($_GET['message'])) {
    print "<script type='text/javascript'>alert('" . $_GET['message'] . "')</script>";
}
?>

<div class="container mt-3">
    <form id="buscarPersona" method="post" action="../acciones/accionModificarPersona.php">
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="nro_dni" name="nro_dni" type="text" maxlength="8" minlength="7" placeholder="DNI">
                <label for="nro_dni">Ingrese su DNI</label>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>

<?php
include_once '../estructura/pie.php';
