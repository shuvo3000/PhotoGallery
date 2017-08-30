<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/27/2017
 * Time: 12:15 PM
 */
/*Database connection cinstants*/


define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','gallery_db');

defined('DS') ? null : define("DS", DIRECTORY_SEPARATOR);

define("SITE_ROOT", DS.'XAMPP'.DS.'HTDOCS'.DS.'PHOTOGALLERY');
define('INCLUDES_PATH', SITE_ROOT.DS.'ADMIN'.DS.'INCLUDES');


//if($conn)
//{
//    echo 'Connected to Database';
//}
?>