<?php
// $Id: index.php,v 1.14 2004/12/26 19:11:55 onokazu Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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


$sql = "SELECT title, price FROM ".$xoopsDB->prefix("rha7downloads_downloads")." WHERE cid = ".$_GET['cid']." and lid = ".$_GET['lid'];
$result=$xoopsDB->query($sql);
$myrow = $xoopsDB->fetchArray($result);
?>

<center>Haga click en el botón para comprar este archivo!<br />
  <strong>$<?php echo number_format($myrow['price'], 2, '.', ''); ?></strong><br />
Descripci&oacute;n: <?php echo $myrow['title']; ?><br>
<?php echo $paypalobj->MakeButton($xoopsModuleConfig['selleremail'],$myrow['title'], $_GET['cid'].'-'.$_GET['lid'], number_format($myrow['price'], 2, '.', '')); ?>
</center>
<?php
include XOOPS_ROOT_PATH."/modules/rha7downloads/footer.php";
?>
