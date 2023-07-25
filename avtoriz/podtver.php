<?
include ("../conn.php");
$kod=$_POST['cod-reg'];$kod=htmlspecialchars($kod);
if($_COOKIE['remix']){
    $hach=$_COOKIE['remix'];
    $stmt = $link->prepare("SELECT id,kod FROM users WHERE hash=:hash and valid=0");
    $parametr = ['hash' =>$hach];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    $d=count($data);
    if($d){
        if($data[0][1]==$kod){
            $stmt = $link->prepare("UPDATE users set valid=1 where id=:id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
            $parametr = ['id' => $data[0][0]];
            $stmt->execute($parametr);
            $data = $stmt->fetchAll();
            setcookie("remix", $hash, time()+60*1*-30);
            echo"1";   
        }else{
 echo"не верный код";
        }
    }else{
        echo"ошибка";
    }
    
}else{
    echo"ошибка";
}
?>
