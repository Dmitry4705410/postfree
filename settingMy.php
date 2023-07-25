<?
include ("conn.php");
$name=$_POST['namesetting'];$name=htmlspecialchars($name);
$fam=$_POST['famsetting'];$fam=htmlspecialchars($fam);
$id=$_COOKIE['center'];
if(!$name){
    echo"Проверьте имя";
    return;
}
if(!$fam){
    echo"Проверьте фамилию";
    return;
}
$stmt = $link->prepare("UPDATE users set name=:name,fam=:fam where id=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['id' => $id,'name' => $name,'fam' => $fam];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    echo"1";
?>