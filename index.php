<?php

//
//ini_set('display_errors', 0 ); error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');


require './lib/autoload.php';

$smarty = new Template();



if(!isset($_SESSION)){
    session_start();
}
$message = "";
if (!empty($_POST["email"])) {
    $Email = new EnviarEmail();

    $name = $_POST['name'];
    $msg_subject = $_POST['msg_subject'];
    $email = "contact.tpl@gtconnectweb.co.uk";
    $message .= "Responder para: ".$_POST['email']."<br><br>";
    $message .= $_POST['message'];
    $destinatarios = array(Config::EMAIL_USER);
    if ($Email->Enviar( $msg_subject, $message, $destinatarios,$email,$name)){
        echo "<script type='text/javascript'>alert('Sended with success')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Error to send');</script>";

    }
}



if(!isset($_GET['pag'])){
    $smarty->assign('pagina','index');
}else{
    $pagina = explode('/', $_GET['pag']);

    $smarty->assign('pagina',$pagina[0]);
    if(isset($pagina[0]) && $pagina[0] == "produtos_info"){
        $id_produto = $pagina[1];

    }

    //   produtos =
}









//valores para o template

$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('GET_NOME', Config::SITE_NOME);
$smarty->assign('GET_SITE_HOME', Rotas::get_SiteHOME());



if(Login::clienteLogado()){
    $smarty->assign('USER', $_SESSION['CLI']['cli_nome']);

}
$smarty->display('index.tpl');
?>