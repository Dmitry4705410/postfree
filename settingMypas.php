<?
include ("conn.php");
$starpas=$_POST['starpas'];$starpas=htmlspecialchars($starpas);
$pasnew=$_POST['pasnew'];$pasnew=htmlspecialchars($pasnew);
$pasnewpov=$_POST['pasnewpov'];$pasnewpov=htmlspecialchars($pasnewpov);
$id=$_COOKIE['center'];
if($pasnewpov!=$pasnew){
echo"пароли не совпадают";
    return;
}
$stmt = $link->prepare("SELECT pass FROM users WHERE id=:id and valid=1");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data); 
if($d){
 if(password_verify($starpas,$data[0][0])){
     $pasnew=password_hash($pasnew, PASSWORD_DEFAULT);
     $hash=time();
     $stmt = $link->prepare("UPDATE users set pass=:pass,hash=:hash where id=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['id' => $id,'pass' => $pasnew,'hash' => $hash];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    echo"1";
        }else{
     echo "не верный старый пароль";
     return;
 }   
    
}
?>