<?
include ("conn.php");
$prof=$_POST['profsave'];$prof=htmlspecialchars($prof);
$telsave=$_POST['telsave'];$telsave=htmlspecialchars($telsave);
$datasave=$_POST['datasave'];$datasave=htmlspecialchars($datasave);
$id=$_COOKIE['center'];
if($prof!=1){
$prof=0;
}
if($telsave!=1){
$telsave=0;
}
if($datasave!=1){
$datasave=0;
}
$stmt = $link->prepare("UPDATE users set profil=:profil,chekTel=:chekTel, chekData=:chekData where id=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['id' => $id,'profil' => $prof,'chekTel' => $telsave,'chekData' => $datasave];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    echo"1";
?>