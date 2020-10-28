<?php

if(!$_POST) exit;

// Verificação de endereço de email
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|c*|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|você|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$first_name     = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$email    = $_POST['email'];
if(trim($first_name) == '') {
	echo '<div class="error_message">Atenção! Você deve digitar seu nome.</div>';
	exit();
}  else if(trim($email) == '') {
	echo '<div class="error_message">Atenção! Por favor insira um endereço de email válido.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Atenção! Você digitou um endereço de email inválido, tente novamente.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}



// Opção de configuração.
// Digite o endereço de email para o qual deseja enviar os emails.
// Exemplo $ address = "John@seudominio.com";

$address = "minharedacaonotamil@gmail.com";



// Opção de configuração.
// i.e. O assunto padrão aberto como "Você foi contratado por John Doe".

// Exemplo, $ e_subject = '$ name. 'entrou em contato com você através do seu site.';

$e_subject = 'You\'ve been contacted by ' . $first_name . '.';



// Opção de configuração.
// Você pode alterar isso se achar necessário.
// Desenvolvedores, convém adicionar mais campos ao formulário, caso em que você deve adicioná-los aqui.

$e_body = "You have been contacted by $first_name. $first_name ." . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $first_name via email, $email";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {


// O email foi enviado com sucesso, ecoa uma página de sucesso.

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h1>Email Sent Successfully.</h1>";
	echo "<p>Thank you <strong>$first_name</strong>, sua mensagem foi enviada para nós.</p>";
	echo "</div>";
	echo "</fieldset>";

} else {

	echo 'ERROR!';

}
?>