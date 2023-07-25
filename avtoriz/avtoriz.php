<?
if($_COOKIE['music']||$_COOKIE['center']){
   header("Location:../index.php");
}
$avtorizacia=0;

?>
<?
$get=$_GET['p'];
?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?
        if($get=="reg"){
echo"Регистрация";}elseif($get=="pod"){
            echo"Регистрация";
        }elseif($get=="pas"){
echo"восстановление пароля";
        }elseif($get=="paspod"){
echo"восстановление пароля";
        }else{
            echo"авторизация";
        }
        ?></title>
    <?php include ('../osnovnie-connect.php'); ?>
</head>

<body>
   
    <?php include ("top-menu.php"); ?>
    <?php include ("reg.php"); ?>
</body>

</html>
