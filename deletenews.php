<?
include ("conn.php");
include ("proverka.php");
$id=$_COOKIE['center'];
$idpost=$_POST['id'];
$stmt = $link->prepare("DELETE FROM post WHERE id_post=:postid and id_users=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['postid' => $idpost,'id' => $id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
echo"1";
?>