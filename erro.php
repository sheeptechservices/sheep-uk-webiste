<?php
require './lib/autoload.php';
$Smarty = new Template();
$Smarty->assign('SITE_HOME', Rotas::get_SiteHOME());
$Smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$Smarty->display('not_found.tpl');
Rotas::Redirecionar("5",Rotas::pag_Produtos());