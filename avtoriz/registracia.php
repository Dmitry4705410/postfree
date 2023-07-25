<?
include ("../conn.php");
$name=$_POST['name'];$name=htmlspecialchars($name);
$fam=$_POST['fam'];$fam=htmlspecialchars($fam);
$loginreg=$_POST['login-reg'];$loginreg=htmlspecialchars($loginreg); 
$passreg=$_POST['pass-reg'];$passreg=htmlspecialchars($passreg);
$dataReg=$_POST['dataregusers'];$dataReg=htmlspecialchars($dataReg);
 $today = date("Y-m-d"); 
if($dataReg>$today){
    echo "ошибка в дате";
    return;
}
$passreg=password_hash($passreg, PASSWORD_DEFAULT);
if(($name)&&($fam)&&($loginreg)&&($passreg)){
$stmt = $link->prepare("SELECT tel FROM users WHERE tel=:phone and valid=1");
$parametr = ['phone' =>$loginreg];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data);
    if(!$d){
$stmt = $link->prepare("SELECT tel FROM users WHERE tel=:phone and valid=0");
$parametr = ['phone' =>$loginreg];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data);
        if($d){
$kod = random_int(1000, 10000);
$stmt = $link->prepare("UPDATE users set kod=:kods,hash=:hashs where tel=:phone");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$hash=time();
$parametr = ['kods' => $kod,'phone' =>$loginreg,'hashs'=>$hash];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
if($_COOKIE['remix']){
    setcookie("remix", $hash, time()+60*1*-30);
}
setcookie("remix", $hash, time()+60*5);
$phone=$loginreg;
$text=$kod;
include ("sms.php");



            echo "1";
            
        }else{
            $kod = random_int(1000, 10000);
$hash=time();
if($_COOKIE['remix']){
    setcookie("remix", $hash, time()+60*1*-30);
}
setcookie("remix", $hash, time()+60*5);
            
$phone=$loginreg;
$text=$kod;
include ("sms.php");
            
$stmt = $link->prepare("INSERT INTO users (name, fam, tel,pass,kod,hash,data)
VALUES (:name, :fam, :tel,:pass,:kod,:hash,:data)");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['name' => $name,'fam' => $fam,'tel' => $loginreg,'pass' => $passreg,'hash' => $hash,'kod' => $kod,'data' => $dataReg];
$stmt->execute($parametr);
$data = $stmt->fetchAll();  
           echo "1";
        }
    }else{
        echo"аккаунт с таким номером существует";
}
}

?>