<?php // Xoops Spanish Support (http://www.esxoops.com)
// $Id: modinfo.php,v 1.10 2003/03/27 23:17:10 w4z004 Exp $
// Module Info

// The name of this module
define("_MI_RHA7DOWNLOADS_NAME","Descargas por Pago");

// A brief description of this module
define("_MI_RHA7DOWNLOADS_DESC","Crea una sección de Descargas donde los usuarios pueden bajar/enviar/valorar varios archivos.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_RHA7DOWNLOADS_BNAME1","Descargas Recientes");
define("_MI_RHA7DOWNLOADS_BNAME2","Top Descargas");

// Sub menu titles
define("_MI_RHA7DOWNLOADS_SMNAME1","Enviar");
define("_MI_RHA7DOWNLOADS_SMNAME2","Popular");
define("_MI_RHA7DOWNLOADS_SMNAME3","Top Valoración");

// Names of admin menu items
define("_MI_RHA7DOWNLOADS_ADMENU2","Agregar/Editar Descargas");
define("_MI_RHA7DOWNLOADS_ADMENU3","Descargas Enviadas");
define("_MI_RHA7DOWNLOADS_ADMENU4","Descargas Rotas");
define("_MI_RHA7DOWNLOADS_ADMENU5","Descargas Modificadas");

// Title of config items
define('_MI_RHA7DOWNLOADS_POPULAR', 'Número de hits para ser marcado como popular');
define('_MI_RHA7DOWNLOADS_NEWDLS', 'Máximo número de nuevos items mostrados en la página principal');
define('_MI_RHA7DOWNLOADS_PERPAGE', 'Máximo número de items mostrados en cada página');
define('_MI_RHA7DOWNLOADS_USESHOTS', 'Seleccione SI para mostrar imágenes para cada item de descarga');
define('_MI_RHA7DOWNLOADS_SHOTWIDTH', 'Máximo ancho de las imágenes');
define('_MI_RHA7DOWNLOADS_CHECKHOST', '¿ Restringir el enlace directo a tus Archivos ? (Leeching)');
define('_MI_RHA7DOWNLOADS_REFERERS', 'Estos sitios podrán enlazar directamente los archivos <br />Separar cada uno con | ');
define("_MI_RHA7DOWNLOADS_ANONPOST","¿ Permitir a los usuarios anónimos el envío de descargas ?");
define('_MI_RHA7DOWNLOADS_AUTOAPPROVE','¿ Auto aprobar nuevas Descargas sin la intervención del Adminstrador ?');
define('_MI_RHA7DOWNLOADS_BUYNOWBUTTON','URL de la imágen para el botón de -Compre Ahora-');
define('_MI_RHA7DOWNLOADS_PAYPALPGHDR','URL de la imágen para el encabezado de la pagina de PayPal de pago');
define('_MI_RHA7DOWNLOADS_AUTHTOKEN','Token de Autorización de Paypal');
define('_MI_RHA7DOWNLOADS_AUTHTOKENDSC','En PayPal, My Account -> Profile -> Website Payment Preferences -> Payment Data Transfer -> Identity Token');
define('_MI_RHA7DOWNLOADS_NOTIFEMAIL','Email para notificación cuando se requiera autorización manual.');
define('_MI_RHA7DOWNLOADS_SELLEREMAIL','Email de la cuenta de vendedor en PayPal');
define('_MI_RHA7DOWNLOADS_DEBUGGING','Seleccione SI si esta en una sesión de debugging (sandbox.paypal.com)');

// Description of each config items
define('_MI_RHA7DOWNLOADS_POPULARDSC', '');
define('_MI_RHA7DOWNLOADS_NEWDLSDSC', '');
define('_MI_RHA7DOWNLOADS_PERPAGEDSC', '');
define('_MI_RHA7DOWNLOADS_USESHOTSDSC', '');
define('_MI_RHA7DOWNLOADS_SHOTWIDTHDSC', '');
define('_MI_RHA7DOWNLOADS_REFERERSDSC', '');
define('_MI_RHA7DOWNLOADS_AUTOAPPROVEDSC', '');

// Text for notifications

define('_MI_RHA7DOWNLOADS_GLOBAL_NOTIFY', 'Global');
define('_MI_RHA7DOWNLOADS_GLOBAL_NOTIFYDSC', 'Opciones de Notificación Global de Descargas.');

define('_MI_RHA7DOWNLOADS_CATEGORY_NOTIFY', 'Categoría');
define('_MI_RHA7DOWNLOADS_CATEGORY_NOTIFYDSC', 'Opciones de Notificación que se aplican a la categoría actual de archivos.');

define('_MI_RHA7DOWNLOADS_FILE_NOTIFY', 'Archivo');
define('_MI_RHA7DOWNLOADS_FILE_NOTIFYDSC', 'Opciones de Notificación que se aplican al archivo actual.');

define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nueva Categoría');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificarme cuando una nueva categoría es creada.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Recibir notificación cuando una categoría es creada.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nueva categoría');

define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFY', 'Modificación de archivo Requerida');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYCAP', 'Notificarme de cualquier pedido de modificación de archivo.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYDSC', 'Recibir notificación cuando cualquier pedido de modificación es enviado.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Modificación de archivo Requerida');

define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFY', 'Archivo Roto reportado');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYCAP', 'Notificarme de cualquier reporte de archivo roto.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYDSC', 'Recibir notificación cuando un reporte de cualquier archivo roto es enviado.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación :  Archivo Roto reportado');

define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFY', 'Archivo enviado');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYCAP', 'Notificarme cuando cualquier nuevo archivo es enviado (aguardando aprobación).');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYDSC', 'Recibir una notificación cuando cualquier archivo nuevo es enviado (aguardando aprobación).');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo archivo enviado');

define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFY', 'Nuevo Archivo');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFYCAP', 'Notificarme cuando un nuevo archivo es publicado.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFYDSC', 'Recibir una noticicación cuando cualquier archivo nuevo sea publicado.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo archivo');

define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFY', 'Archivo enviado');
define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notificarme cuando un nuevo archivo es enviado (aguardando aprobación) en la categoría actual.');
define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Recibir una notificación cuando un nuevo archivo es enviado (aguardando aprobación) en la categoría actual.');
define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo archivo enviado en categoría');

define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFY', 'Nuevo archivo');
define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFYCAP', 'Notificarme cuando un nuevo archivo es publicado en la categoría actual.');
define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFYDSC', 'Recibir una notificación cuando un nuevo archivo es publicado en la categoría actual.');
define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo archivo en categoría');

define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFY', 'Archivo Aprobado');
define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFYCAP', 'Notificarme cuando este archivo es aprobado.');
define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFYDSC', 'Recibir una notificación cuando este archivo sea aprobado.');
define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Archivo Aprobado');

?>