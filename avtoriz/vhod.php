<?
include ("../conn.php");
$tel=$_POST['logintel'];$tel=htmlspecialchars($tel);
$pas=$_POST['passavto'];$pas=htmlspecialchars($pas);
if(($tel)&&($pas)){
$stmt = $link->prepare("SELECT tel,pass,id,hash FROM users WHERE tel=:phone and valid=1");
$parametr = ['phone' =>$tel];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data); 
    if($d){
        if(password_verify($pas,$data[0][1])){
            $hash=password_hash($data[0][3], PASSWORD_DEFAULT);
            $id=$data[0][2];
             setcookie("music", $hash, time()+60*60*24*30,"/");
             setcookie("center", $id, time()+60*60*24*30,"/");
            echo "1";
        }else{
             echo"не верный пароль";
        }
    }else{
$stmt = $link->prepare("SELECT tel FROM users WHERE tel=:phone and valid=0");
$parametr = ['phone' =>$tel];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data);      
 if($d){
$kod = random_int(1000, 10000);
$stmt = $link->prepare("UPDATE users set kod=:kods,hash=:hashs where tel=:phone");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$hash=time();
$parametr = ['kods' => $kod,'phone' =>$tel,'hashs'=>$hash];
$stmt->execute($parametr);
$data = $stmt->fetchAll(); 
if($_COOKIE['remix']){
    setcookie("remix", $hash, time()+60*1*-30);
}
setcookie("remix", $hash, time()+60*5);
$phone=$tel;
$text=$kod;
include ("sms.php");


 echo "2";
     
 }
        
        
    }
}
?>