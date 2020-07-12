<?php
// $Id: modinfo.php,v 1.16 2004/12/26 19:11:56 onokazu Exp $
// Module Info

// The name of this module
define("_MI_RHA7DOWNLOADS_NAME","Downloads");

// A brief description of this module
define("_MI_RHA7DOWNLOADS_DESC","Creates a downloads section where users can download/submit/rate various files.");

// Names of blocks for this module (Not all module has blocks)
define("_MI_RHA7DOWNLOADS_BNAME1","Recent Downloads");
define("_MI_RHA7DOWNLOADS_BNAME2","Top Downloads");

// Sub menu titles
define("_MI_RHA7DOWNLOADS_SMNAME1","Submit");
define("_MI_RHA7DOWNLOADS_SMNAME2","Popular");
define("_MI_RHA7DOWNLOADS_SMNAME3","Top Rated");

// Names of admin menu items
define("_MI_RHA7DOWNLOADS_ADMENU2","Add/Edit Downloads");
define("_MI_RHA7DOWNLOADS_ADMENU3","Submitted Downloads");
define("_MI_RHA7DOWNLOADS_ADMENU4","Broken Downloads");
define("_MI_RHA7DOWNLOADS_ADMENU5","Modified Downloads");

// Title of config items
define('_MI_RHA7DOWNLOADS_POPULAR', 'Number of hits for downloadable items to be marked as popular');
define('_MI_RHA7DOWNLOADS_NEWDLS', 'Maximum number of new download items displayed on top page');
define('_MI_RHA7DOWNLOADS_PERPAGE', 'Maximum number of download items displayed on each page');
define('_MI_RHA7DOWNLOADS_USESHOTS', 'Select yes to display screenshot images for each download item');
define('_MI_RHA7DOWNLOADS_SHOTWIDTH', 'Type in the maximum width of screenshot images');
define('_MI_RHA7DOWNLOADS_CHECKHOST', 'Disallow direct download linking? (leeching)');
define('_MI_RHA7DOWNLOADS_REFERERS', 'This Sites can directly link you files <br />Separate each one with | ');
define("_MI_RHA7DOWNLOADS_ANONPOST","Allow anonymous users to post download items?");
define('_MI_RHA7DOWNLOADS_AUTOAPPROVE','Auto approve new downloads without admin intervention?');

define('_MI_RHA7DOWNLOADS_BUYNOWBUTTON','Buy Now button URL');
define('_MI_RHA7DOWNLOADS_PAYPALPGHDR','URL for PayPal payment page header image');
define('_MI_RHA7DOWNLOADS_AUTHTOKEN','Identity or Authorization Token from Paypal');
define('_MI_RHA7DOWNLOADS_AUTHTOKENDSC','In PayPal, My Account -> Profile -> Website Payment Preferences -> Payment Data Transfer -> Identity Token');
define('_MI_RHA7DOWNLOADS_NOTIFEMAIL','Notification email for manual verification');
define('_MI_RHA7DOWNLOADS_SELLEREMAIL','Seller Paypal Account Email Address');
define('_MI_RHA7DOWNLOADS_DEBUGGING','Select YES if your in a debugging session (sandbox.paypal.com)');

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
define('_MI_RHA7DOWNLOADS_GLOBAL_NOTIFYDSC', 'Global downloads notification options.');

define('_MI_RHA7DOWNLOADS_CATEGORY_NOTIFY', 'Category');
define('_MI_RHA7DOWNLOADS_CATEGORY_NOTIFYDSC', 'Notification options that apply to the current file category.');

define('_MI_RHA7DOWNLOADS_FILE_NOTIFY', 'File');
define('_MI_RHA7DOWNLOADS_FILE_NOTIFYDSC', 'Notification options that apply to the current file.');

define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFY', 'New Category');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new file category is created.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a new file category is created.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New file category');                              

define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFY', 'Modify File Requested');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYCAP', 'Notify me of any file modification request.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYDSC', 'Receive notification when any file modification request is submitted.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : File Modification Requested');

define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFY', 'Broken File Submitted');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYCAP', 'Notify me of any broken file report.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYDSC', 'Receive notification when any broken file report is submitted.');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILEBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Broken File Reported');

define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFY', 'File Submitted');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYCAP', 'Notify me when any new file is submitted (awaiting approval).');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYDSC', 'Receive notification when any new file is submitted (awaiting approval).');
define('_MI_RHA7DOWNLOADS_GLOBAL_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New file submitted');

define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFY', 'New File');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFYCAP', 'Notify me when any new file is posted.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFYDSC', 'Receive notification when any new file is posted.');
define('_MI_RHA7DOWNLOADS_GLOBAL_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New file');

define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFY', 'File Submitted');
define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notify me when a new file is submitted (awaiting approval) to the current category.');   
define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new file is submitted (awaiting approval) to the current category.');      
define('_MI_RHA7DOWNLOADS_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New file submitted in category'); 

define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFY', 'New File');
define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFYCAP', 'Notify me when a new file is posted to the current category.');   
define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFYDSC', 'Receive notification when a new file is posted to the current category.');      
define('_MI_RHA7DOWNLOADS_CATEGORY_NEWFILE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New file in category'); 

define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFY', 'File Approved');
define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFYCAP', 'Notify me when this file is approved.');
define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFYDSC', 'Receive notification when this file is approved.');
define('_MI_RHA7DOWNLOADS_FILE_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : File Approved');

?>
