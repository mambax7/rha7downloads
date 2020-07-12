<?php
// $Id: visit.php,v 1.10 2004/12/26 19:11:56 onokazu Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

include "../../mainfile.php";
$myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object
$lid = intval($HTTP_GET_VARS['lid']);
$cid = intval($HTTP_GET_VARS['cid']);
if ( $xoopsModuleConfig['check_host'] ) {
	$goodhost      = 0;
	$referer       = parse_url(xoops_getenv('HTTP_REFERER'));
	$referer_host  = $referer['host'];
	foreach ( $xoopsModuleConfig['referers'] as $ref ) {
		if ( !empty($ref) && preg_match("/".$ref."/i", $referer_host) ) {
			$goodhost = "1";
			break;
		}
	}
	if ($referer_host == "") {
		$goodhost = "1";
	}
	if (!$goodhost) {
		redirect_header(XOOPS_URL . "/modules/rha7downloads/singlefile.php?cid=$cid&amp;lid=$lid", 20, _MD_NOPERMISETOLINK);
		exit();
	}
}
// "Ao5VDRweFjGdhgBf4-owDHEH_8NGUIOtgbAOHPERf3ObfRHOXpqfeNIt-YS"
include "header.php";
include_once XOOPS_ROOT_PATH."/class/xoopstree.php";
include XOOPS_ROOT_PATH."/header.php";

include XOOPS_ROOT_PATH."/modules/rha7downloads/paypalgw/pdt.inc.php";
$paypalobj = new PayPalGateway();
if($xoopsModuleConfig['debugging'] == 1) {
$paypalobj->init( true,
	              $xoopsModuleConfig['buynowbutton'],
				  XOOPS_URL . "/modules/rha7downloads/visit2.php?cid=" . $_GET['cid'] . "&lid=" . $_GET['lid'] . "&",
				  XOOPS_URL . "/modules/rha7downloads/visitfail.php",
				  $xoopsModuleConfig['paypalpghdr'],
				  $xoopsModuleConfig['authtoken']
				 );
} else {
$paypalobj->init( false,
	              $xoopsModuleConfig['buynowbutton'],
				  XOOPS_URL . "/modules/rha7downloads/visit2.php?cid=" . $_GET['cid'] . "&lid=" . $_GET['lid'] . "&",
				  XOOPS_URL . "/modules/rha7downloads/visitfail.php",
				  $xoopsModuleConfig['paypalpghdr'],
				  $xoopsModuleConfig['authtoken']
				 );
}

$paypal = $paypalobj->PaymentDataTransfer($_GET['tx']);
	if ($paypal['result'] == "SUCCESS:SUCCESS") {
		$sql = sprintf("UPDATE %s SET hits = hits+1 WHERE lid = %u AND status > 0", $xoopsDB->prefix("rha7downloads_downloads"), $lid);
		$xoopsDB->queryF($sql);
		$result = $xoopsDB->query("SELECT url, price FROM ".$xoopsDB->prefix("rha7downloads_downloads")." WHERE lid=$lid AND status>0");
		list($url,$price) = $xoopsDB->fetchRow($result);
		if (round($price,2) != round($paypal['payment_gross'],2)) {
			mail($xoopsModuleConfig['notifemail'], "Download Payment Manual Verification", print_r($paypal, true) . "<br /><br />" . print_r($_GET, true));
			?>
<p align="center">Ocurrio un problema al recibir la información de su pago.<br>
Ya se ha enviado una notificación para verificar<br>
su pago manualmente, por favor contactenos para <br>
poder indicarle como debe bajar su archivo.<br>
Su informacion ha sido guardada para posterior<br>
investigacion y/o posible fraude.<br>
<br>
<a href="<?php echo XOOPS_URL; ?>">Regresar al Sitio</a></p>
<br>
<br>
  <br>
		    <?php
		} else {
echo "<center><a href=\"" . $url . "\">Haga click aqu&iacute; para bajar su archivo.</a><br>
Conserve esta direccion para que pueda bajar este archivo en el futuro.<br>
<a href=\"" . $url . "\">".$url."</a><br>
<br>
    <strong>ID del Articulo:</strong> ".$paypal['item_number']."
  <br>
    <strong>Descripci&oacute;n:</strong> ".$paypal['item_name']."<br> 
    <strong>Monto Pagado:</strong> ".$paypal['payment_gross']."<br>
    <strong>Estatus:</strong> ".$_GET['st']."<br>
    <strong>Monto por Pagar:</strong> ".$_GET['amt']."<br>
    <strong>Moneda:</strong> ".$_GET['cc']."<br>
  <br>
    <a href=\"" . XOOPS_URL . "\">Haga Click Aqu&iacute; para regresar a nuestro sitio.</a>
  </center>";
		}
} else {
	mail($xoopsModuleConfig['notifemail'], "Download Payment Manual Verification", print_r($paypal, true) . "<br /><br />" . print_r($_GET, true));
	?>
<p align="center">Ocurrio un problema al recibir la información de su pago.<br>
Ya se ha enviado una notificación para verificar<br>
su pago manualmente, por favor contactenos para <br>
poder indicarle como debe bajar su archivo.<br>
<br>
<a href="<?php echo XOOPS_URL; ?>">Regresar al Sitio</a></p>
<br>
<br>
  <br>
  <?php
}

include XOOPS_ROOT_PATH."/modules/rha7downloads/footer.php";

?>




