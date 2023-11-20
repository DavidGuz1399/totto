<?php
$id = $email = $cedula = $nombre = $apellido = $celular = $departamento = $fecha_nacimiento = $tiene_hijos = $genero ="";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["email"])) $email = $dataToView["data"]["email"];
if(isset($dataToView["data"]["cedula"])) $cedula = $dataToView["data"]["cedula"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["apellido"])) $apellido = $dataToView["data"]["apellido"];
if(isset($dataToView["data"]["celular"])) $celular = $dataToView["data"]["celular"];
if(isset($dataToView["data"]["departamento"])) $departamento = $dataToView["data"]["departamento"];
if(isset($dataToView["data"]["fecha_nacimiento"])) $fecha_nacimiento = $dataToView["data"]["fecha_nacimiento"];
if(isset($dataToView["data"]["tiene_hijos"])) $tiene_hijos = $dataToView["data"]["tiene_hijos"];
if(isset($dataToView["data"]["genero"])) $genero = $dataToView["data"]["genero"];

?>
<main>
    <div class="main-content">
        <div>
            <form action="index.php?controller=usuario&action=save" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="text" placeholder="Email" class="input" name="email" id="email" value="<?php echo $email; ?>">
                <input type="text" placeholder="Cédula/Identificación" class="input" name="cedula" id="cedula" value="<?php echo $cedula; ?>">
                <input type="text" placeholder="Nombre" class="input" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
                <input type="text" placeholder="Apellido" class="input" name="apellido" id="apellido" value="<?php echo $apellido; ?>">
                <input type="text" placeholder="Número Móvil" class="input" name="celular" id="celular" value="<?php echo $celular; ?>">
                <input type="text" placeholder="Departamento" class="input" name="departamento" id="departamento" value="<?php echo $departamento; ?>">
                <input type="date" placeholder="Fecha de nacimiento(año/mm/dd)*" class="input" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">
                <div>
                    <label for="">¿Tienes hijos?</label><br>
                    <label for="">Si</label><input type="radio" name="tiene_hijos" id="si" value="0">
                    <label for="">No</label><input type="radio" name="tiene_hijos" id="no" value="1">
                </div>
                <div>
                    <label for="">¿Género?</label><br>
                    <label for="">Masculino</label><input type="radio" name="genero" id="m" value="0">
                    <label for="">Femenino</label><input type="radio" name="genero" id="f" value="1">
                </div>
                <input type="checkbox" name="" id=""><label for="">Acepto los tyc para la actualizacion de datos</label><br>
                <input type="checkbox" name="" id=""><label for="">Autorizo el tratamiento de mis datos personales</label>
    
                <div class="center" style="margin-top:40px;">
                    <button class="button" type="submit"  onclick="validarFormulario()">ENVIAR</button>
                </div>
            </form>
        </div>
    </div>
</main>