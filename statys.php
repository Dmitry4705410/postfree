<?
include ("conn.php");
$statys=$_POST['statys'];$statys=htmlspecialchars($statys);
$id=$_COOKIE['center'];
if($statys){
    $stmt = $link->prepare("UPDATE users set statys=:stat where id=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['id' => $id,'stat' => $statys];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    echo"1";
}else{
   $stmt = $link->prepare("UPDATE users set statys=0 where id=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['id' => $id];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    echo"1"; 
}
?>