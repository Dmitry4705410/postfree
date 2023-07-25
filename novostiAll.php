<?
include ("conn.php");
if($_POST['n']){
$id =$_POST['n'];
$ptl= "

";
    if($_POST['prof']==0){
return;
}
}else{
    $id = $_COOKIE['center'];

}


$stmt = $link->prepare("SELECT images,name,fam FROM  `users` WHERE  `id` = :id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' => $id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$images = $data[0][0];
$name=$data[0][1];
$fam=$data[0][2];

$stmt = $link->prepare("SELECT COUNT( * ) FROM  `post` WHERE  `id_users` = :id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' => $id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();

$allnovosti=$data[0][0];
$strs=$_POST["str"];
$str=$strs-1;
$count=4;
$startnovost=$str*$count;
$allstr=$allnovosti/$count;
$allstr=ceil($allstr);


if($str<=$allstr){
    $link->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $stmt = $link->prepare("SELECT id_post,text,img,data,time FROM `post` WHERE  `id_users` = :id ORDER BY id_post DESC LIMIT :nacalo OFFSET :konec");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' => $id,'nacalo' => $count,'konec' => $startnovost];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
     $link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
     
    
$ffd=count($data);
if($ffd<$count){
    $count=$ffd;
}
for ($i=0;$i<$count;$i++){
    if($_POST['n']){
    
     }else{
         $ptl= "
<div class=\"podrobNews\">
                <img src=\"imgmenubar/podrob.png\" width=\"100%;\" alt=\"\">
                </div>
                <div class=\"delete\">
       <button class=\"deleteButton\">удалить</button>
       <input class=\"deleteId\" type=\"hidden\" value=\"".$data[$i]['id_post']."\">
       </div>
";
     }
    
    
    if($data[$i]['img']==0){
        $tt="";
    }else{
       $tt="
       <div class=\"newsImg fotoUps\" ><img  src=\"postimg/".$data[$i]['img']."\" \"></div>
       <input class=\"fotoUp\" type=\"hidden\" value=\"".$data[$i]['img']."\">
       "; 
    }
    echo"
    <div class=\"news\">
            <div class=\"infoNews\">
                <div class=\"polnonfoNews\">
                    <div class=\"imgnameNews\"><img src=\"/newphoto/myphoto/".$images."\" width=\"100%;\"></div>
                    <div class=\"infonews-name-data\">
                        <div class=\"nameNews\">".$name." ".$fam."</div>
                        <div class=\"dataNews\">".$data[$i]['data']." в ".$data[$i]['time']."</div>
                    </div>
                </div>
                
                ";
                echo $ptl;
                $alltextNovost= $data[$i]['text'];
                $alltextNovost=str_replace("\n", "</p><p>", $alltextNovost);
                echo"
                
            </div>
            
            <div class=\"newsnovst\">
                <div class=\"newText\">
                    <p>".$alltextNovost."</p>
                </div>
                ".$tt."
                <div class=\"news-ocenka\">
                    
                </div>
            </div>
        </div>
    
    ";
    
} if($allstr==0){
    echo"
    <div class=\"novostNull\">записей нет</div>
   ";
}elseif($strs!=$allstr){
   echo"
   <div class=\"daldal\" id=\"dalpoo\">далее</div> 
   ";
        
}
   
}



?>
      
       

       