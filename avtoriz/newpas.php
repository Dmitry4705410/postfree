<?
include ("../conn.php");
$cod=$_POST['codvost'];$cod=htmlspecialchars($cod);
$pas=$_POST['passvost'];$pas=htmlspecialchars($pas);
$passvostclon=$_POST['passvostclon'];$passvostclon=htmlspecialchars($passvostclon);
$passreg=password_hash($pas, PASSWORD_DEFAULT);
if($pas==$passvostclon){
    
    if($_COOKIE['rem']){
          
    $hash=$_COOKIE['rem'];
    $stmt = $link->prepare("SELECT id,tel FROM vost WHERE hash=:hashs and kod=:kods");
   $parametr = ['kods' => $cod,'hashs'=>$hash];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
    $d=count($data);
        
        if($d){
            $hash=time();
        $stmt = $link->prepare("UPDATE users set pass=:pass,hash=:hashs where tel=:phone");
        $parametr = ['pass' => $passreg,'phone' =>$data[0][1],'hashs'=>$hash];
        $stmt->execute($parametr);
        $data = $stmt->fetchAll();
            if($_COOKIE['rem']){
        setcookie("rem", $hash, time()+60*1*-30);
        }
            echo"1";
        }else{
            echo"ошибка";
        }
        
    }else{
       echo"время истекло"; 
    }
    
}else{
    echo"пароли не совпадают";
}
?>