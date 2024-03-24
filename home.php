

<?php 

$smarty = new Template();


$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());

$smarty->display('home.tpl');


 ?>