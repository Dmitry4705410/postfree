<?
$link = new PDO('mysql:host=localhost;dbname=qwert','root','root');
$link->exec("SET NAMES UTF8");
if($link)
{
//echo"связь есть<br>";
}else{
    header("Location: eror.php");
}
?>