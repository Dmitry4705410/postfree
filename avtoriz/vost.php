<?
include ("../conn.php");
$tel=$_POST['telvost'];$tel=htmlspecialchars($tel);
if($tel){
$stmt = $link->prepare("SELECT id FROM users WHERE tel=:phone");
$parametr = ['phone' =>$tel];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data);
    if($d){
$stmt = $link->prepare("SELECT id FROM vost WHERE tel=:phone");
$parametr = ['phone' =>$tel];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$d=count($data);
        if($d){
        $kod = random_int(1000, 10000);  
        $hash=time();
        $stmt = $link->prepare("UPDATE vost set kod=:kods,hash=:hashs where tel=:phone");
        $parametr = ['kods' => $kod,'phone' =>$tel,'hashs'=>$hash];
        $stmt->execute($parametr);
        $data = $stmt->fetchAll();
        if($_COOKIE['rem']){
        setcookie("rem", $hash, time()+60*1*-30);
        }
        setcookie("rem", $hash, time()+60*5);
        $phone=$tel;
        $text=$kod;
        include ("sms.php");
        echo "1";
        }else{
        $kod = random_int(1000, 10000);  
        $hash=time();  
        $stmt = $link->prepare("INSERT INTO vost (kod,hash,tel) VALUES (:kod,:hash,:tel)");
        $parametr = ['kod' => $kod,'hash' => $hash,'tel' =>$tel ];
        $stmt->execute($parametr);
        $data = $stmt->fetchAll();
         if($_COOKIE['rem']){
        setcookie("rem", $hash, time()+60*1*-30);
        }
        setcookie("rem", $hash, time()+60*5);
        $phone=$tel;
        $text=$kod;
        include ("sms.php");
        echo "1";   
        }
        

    }else{
echo"пользователя с таким номером нет";
    }
}
?>