<?php
$id = $email = $cedula = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["email"])) $email = $dataToView["data"]["email"];

?>
<main>
    <div class="main-content">
        <div>
            <form action="">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="text" placeholder="Email" class="input" id="email" value="<?php echo $email; ?>">
                <input type="text" placeholder="Cédula/Identificación" class="input" id="cedula">
                <input type="text" placeholder="Nombre" class="input" id="nombre">
                <input type="text" placeholder="Apellido" class="input" id="apellido">
                <input type="text" placeholder="Número Móvil" class="input" id="celular">
                <input type="text" placeholder="Departamento" class="input" id="departamento">
                <input type="date" placeholder="Fecha de nacimiento(año/mm/dd)*" class="input" id="fecha_nacimiento">
                <div>
                    <label for="">¿Tienes hijos?</label><br>
                    <label for="">Si</label><input type="radio" name="si" id="si">
                    <label for="">No</label><input type="radio" name="no" id="no">
                </div>
                <div>
                    <label for="">¿Género?</label><br>
                    <label for="">Masculino</label><input type="radio" name="m" id="m">
                    <label for="">Femenino</label><input type="radio" name="f" id="f">
                </div>
                <input type="checkbox" name="" id=""><label for="">Acepto los tyc para la actualizacion de datos</label><br>
                <input type="checkbox" name="" id=""><label for="">Autorizo el tratamiento de mis datos personales</label>
    
                <div class="center" style="margin-top:40px;">
                    <a class="button" type="submit"  onclick="validarFormulario()">ENVIAR</a>
                </div>
            </form>
        </div>
    </div>
</main>