<?
include ("conn.php");
$id = $_COOKIE['center'];
$stmt = $link->prepare("SELECT post.id_post,post.text,post.img,post.data,post.time,users.images,users.name,users.fam
         FROM users,friend,post WHERE post.id_users IN (SELECT user2 FROM friend WHERE user1=:id) AND users.id IN (SELECT user2 FROM friend WHERE user1=:id) GROUP BY  post.id_post ");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' => $id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$allnovosti=count($data);

$strs=$_POST["str"];
$str=$strs-1;
$count=4;
$startnovost=$str*$count;
$allstr=$allnovosti/$count;
$allstr=ceil($allstr);
if($str<=$allstr){
    $link->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $stmt = $link->prepare("SELECT users.name,users.fam,users.images,post.text,post.img,post.data,post.time,users.id
    FROM friend 
INNER JOIN users on friend.user2=users.id and users.profil=1
INNER JOIN post on friend.user2=post.id_users
WHERE friend.user1=:id GROUP BY  post.id_post DESC LIMIT :nacalo OFFSET :konec");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id,'nacalo' => $count,'konec' => $startnovost];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
$ffd=count($data);
if($ffd<$count){
    $count=$ffd;
}
    
for ($i=0;$i<$count;$i++){
    if($data[$i][4]==0){
        $tt="";
    }else{
       $tt="
       <div class=\"newsImg fotoUps\" ><img src=\"postimg/".$data[$i][4]."\" \" ></div>
       <input class=\"fotoUp\" type=\"hidden\" value=\"".$data[$i][4]."\">
       "; 
    }
    echo"
    <div class=\"news\">
            <div class=\"infoNews\">
                <div class=\"polnonfoNews\">
                    <div class=\"imgnameNews\"><a href=\"user.php?n=".$data[$i][7]."\"><img src=\"/newphoto/myphoto/".$data[$i][2]."\" width=\"100%;\"></a></div>
                    <div class=\"infonews-name-data\">
                        <div class=\"nameNews\"><a href=\"user.php?n=".$data[$i][7]."\">".$data[$i][0]." ".$data[$i][1]."</a></div>
                        <div class=\"dataNews\">".$data[$i][5]." в ".$data[$i][6]."</div>
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


//         $stmts = $link->prepare("SELECT post.id_post,post.text,post.img,post.data,post.time,users.images,users.name,users.fam
//         FROM users,friend,post WHERE post.id_users AND users.id IN (SELECT user2 FROM friend WHERE user1=21) GROUP BY  post.id_post DESC LIMIT :nacalo OFFSET :konec");
//$parametr = ['id' =>$id,'nacalo' => $count,'konec' => $startnovost];
//$stmts->execute($parametr);
//$datas = $stmts->fetchAll();
//$ffd=count($datas);
//        echo $ffd;
        ?>