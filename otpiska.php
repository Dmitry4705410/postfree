<?
include ("conn.php");
$myid = $_POST['myid'];
$id = $_POST['id'];
$stmt = $link->prepare("DELETE FROM friend WHERE user1=:user1 and user2=:user2");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['user1' => $myid,'user2' => $id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
echo"1";
?>