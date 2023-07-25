<?
include ("conn.php");
$myid = $_POST['myid'];
$id = $_POST['id'];
$stmt = $link->prepare("INSERT INTO friend (user1, user2)
VALUES (:user1, :user2)");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['user1' => $myid,'user2' => $id];
$stmt->execute($parametr);
$data = $stmt->fetchAll(); 
    echo"1";
?>