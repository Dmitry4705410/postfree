
<? include ("../conn.php");?>

<?
$id = $_COOKIE['center'];
$user = $_POST['id'];
$stmt = $link->prepare("SELECT * FROM dialogmassage WHERE user1=:id and user2=:user");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id,'user' =>$user];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
$ffd=count($data);
if($ffd>0){
echo "уже добавлен";
}else{
    $stmt = $link->prepare("INSERT INTO `dialogmassage` (`id`, `user1`, `user2`, `new`, `data`) VALUES (NULL, :id, :user, '0', current_timestamp());");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id,'user' =>$user];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
    $stmt = $link->prepare("INSERT INTO `dialogmassage` (`id`, `user1`, `user2`, `new`, `data`) VALUES (NULL, :user, :id, '0', current_timestamp());");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id,'user' =>$user];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
    echo "1";
}

?>