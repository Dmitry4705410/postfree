
<?
 $id = $_COOKIE['center'];
$stmt = $link->prepare("SELECT dialogmassage.user2,dialogmassage.user1,dialogmassage.new, users.name,users.fam,users.images FROM dialogmassage 
INNER JOIN users on dialogmassage.user2=users.id
WHERE dialogmassage.user1=:id GROUP BY  dialogmassage.data DESC ");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
$ffd=count($data);
for($i=0;$i<$ffd;$i++){
    if($data[$i][2]==1){
        //$news="<div class=\"newMassageIndicator\"></div>";
}else{
        $news=" ";
    }
    echo"
    <a id=\"".$data[$i][0]."\" href=\"?dialog=".$data[$i][0]."\">
               <div class=\"myFriendMassage\">
                <div class=\"fotoFriendMassage\"><img src=\"/newphoto/myphoto/".$data[$i][5]."\"  ></div>
                <div class=\"infoFriendMassage\"><p>".$data[$i][4]." ".$data[$i][3]."</p></div>
                ";
    echo $news;
    echo"
            </div>
            </a>
    
    ";
}
?>