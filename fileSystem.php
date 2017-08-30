<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/28/2017
 * Time: 1:17 AM
 */
require_once "admin/includes/config.php";
echo __FILE__."<br>";

echo __LINE__."<br>";

echo __DIR__."<br>";

if (file_exists(__DIR__)){
    echo __DIR__."YES <br>";

}

if (is_file(__FILE__)){
    echo __DIR__."YES it is a FILE<br>";

}
echo "<pre>";
    print_r($_FILES['fileupload']);
echo "</pre>";


echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];

echo "<br><br><br>".INCLUDES_PATH."<br><br><br>";
echo "<br><br><br>".SITE_ROOT."<br><br><br>";
echo "<br><br><br>".DS."<br><br><br>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <input type="button" value="">
    <title>Document</title>
</head>
<body>

<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="fileupload">
    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>
