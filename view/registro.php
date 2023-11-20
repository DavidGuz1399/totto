<?php
$id = $email = $content = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["email"])) $email = $dataToView["data"]["email"];

?>
<main>
    <div class="main-content">
        <div class="center">
            <h2>Ingresa tu correo para validarte en nuestra base de datos y continuar con el proceso.</h2>
        </div>
        <form class="form" action="index.php?controller=usuario&action=save" method="POST">
            <div>
                <input type="text" placeholder="Email" class="input" name="email" >
            </div>
            <div class="center" style="margin-top:40px;">
                <button class="button" type="submit">ENVIAR</button>
            </div>
        </form>
        <div class="center informacion">
            <p>Necesitas ayuda?</p>
            <p>Linea nacional: 01 8000 510203 - Bogota: 390 73 93</p>
            <p>Email: servicioalcliente@totto.com</p>
            <p>o escribenos a la linea de Whatsapps: 302 2200200</p>
        </div>
    </div>
</main>