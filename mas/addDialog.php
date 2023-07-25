<?
$id = $_COOKIE['center'];
$stmt = $link->prepare("SELECT name,fam,images,id FROM users WHERE id IN(SELECT user2 FROM friend WHERE user1=:id)");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$ffd=count($data);
if($ffd==0){
                echo"
                <div class=\"massagPoiskAdd\">
    <div class=\"centerPoiskmassage\">
        <div class=\"buttonExitMassagePoisk\">Выход</div>
                <div style=\"text-align: center; color :red;font-size: 12px;\">Подпишитесь на кого нибудь</div>
                </div>
</div>
                ";
            }else{
    echo"
    <div class=\"massagPoiskAdd\">
    <div class=\"centerPoiskmassage\">
        <div class=\"buttonExitMassagePoisk\">Выход</div>
    ";
    for($i=0;$i<$ffd;$i++){
        echo"
    
        <div class=\"addsmsdialog\">
            <div class=\"fotoadddialog\"><img src=\"/newphoto/myphoto/".$data[$i][2]."\" ></div>
            <div class=\"nameadddialog\"><p>".$data[$i][1]." ".$data[$i][0]."</p></div>
            <input class=\"idmassagDialogs\" type=\"hidden\" value=\"".$data[$i][3]."\">
    </div>
        ";
    }
    echo"    
        
    </div>
</div>";
    
}


?>
