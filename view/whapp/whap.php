<?php
//TOKEN QUE NOS DA FACEBOOK GENERADO PARA 60 DIAS 25/10/23
//EAAB4C7ZAkYaQBOZCQqDcQR7O8lcH07UQLtNbkZCl41eCzVGyaHijnILgaxoSbbYkSzzDsPQtjVAUVGsMJTEbc7KAzWZAeqHZBwH9fYwbPxVciCeI0OI8wllhgVEAh5vhGW1ZB4Lz7gZCWHJeTWq5BPkvu8QZCCgblGI7QSzEoy3baaJDcsluG6yxE0DWKiFauoqBnFIRtLwwPLcOnBDz8vnOCi7Qslf0DhEKKoIZD
$token = 'EAASeCdEfDC0BOZCn0mJfctotueR1RedojGmHTM78VOSLTgcZCHYFpzIJHTA36jZARAaTignOoHYUawDnDWFQ0a6b8cm2ld3EjpisFf5zGyxJG1Bq5e9UpIHhGZA1lVhAZBXzuUUooh3VsoaKeSGidNF3BYe5bAJG6nEjw63bZAKfiL9ZAfvGkTUvMyvZCrh7';
//NUESTRO TELEFONO
$telefono = '503'.$_REQUEST['telefono'];
//URL A DONDE SE MANDARA EL MENSAJE
$url = 'https://graph.facebook.com/v17.0/175454632310543/messages';

//CONFIGURACION DEL MENSAJE
$mensaje = ''
        . '{'
        . '"messaging_product": "whatsapp", '
        . '"to": "'.$telefono.'", '
        . '"type": "template", '
        . '"template": '
        . '{'
        . '     "name": "lab240",'
        . '     "language":{ "code": "es" } '
        . '} '
        . '}';
//DECLARAMOS LAS CABECERAS
$header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
//INICIAMOS EL CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
$response = json_decode(curl_exec($curl), true);
//IMPRIMIMOS LA RESPUESTA 
print_r($response);
//OBTENEMOS EL CODIGO DE LA RESPUESTA
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//CERRAMOS EL CURL
curl_close($curl);

echo '<br>';
echo '<br>';
echo '<br>';

echo '<a href="" onclick="test()" class="btn btn-danger">Cerrar</a>';

?>
<script>
function test() {
        window.close();
}
</script>
