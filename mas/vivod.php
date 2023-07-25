<?
        $get=$_GET['dialog'];
        if(!$get){
echo"<div class=\"MassageWindow\">
            Новое сообщение
        </div>";
        }else{
$id = $_COOKIE['center'];
$stmt = $link->prepare("UPDATE dialogmassage set new=0 where user2=:id and user1=:ids");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['id' => $get,'ids' => $id];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
$stmt = $link->prepare("SELECT  users.name,users.fam,users.images FROM users 
WHERE id=:idl ");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['idl' =>$get];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
$ffd=count($data);
            echo"
            <div class=\"MassageWindowText\">
          <div class=\"infoblokMassage\">
              <div class=\"fotoFriendUser\"><a href=\"../user.php?n=".$get."\"><img src=\"/newphoto/myphoto/".$data[0][2]."\"></a></div>
              <div class=\"nameFriendUser\"><a href=\"../user.php?n=".$get."\">".$data[0][1]." ".$data[0][0]."</a></div>
          </div>
           <div class=\"allMessages\" id=\"d1\">
            
            ";
            
            
            

$stmt = $link->prepare("SELECT massag.users2,massag.users1,massag.text FROM massag 
WHERE (massag.users1=:id OR massag.users2=:ids) and (massag.users1=:user OR massag.users2=:users)");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id,'ids' =>$id,'users' =>$get,'user' =>$get];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
$ffd=count($data);
            
          for($i=0;$i<$ffd;$i++){
              $alltext= $data[$i][2];
                $alltext=str_replace("\n", "</p><p>", $alltext);
              if($data[$i][1]==$id){
                  
                 echo"
                 <div class=\"sms\">
                   <div class=\"my\"><p>".$alltext."</p></div>
               </div>
                 "; 
              }else{
                  echo"
                  <div class=\"sms\">
                   <div class=\"TextSMS\"><p>".$alltext."</p></div>
               </div>
                  ";
              }
          }
            echo "
  
           </div>
           
           <div class=\"formMasseg\">
               <form method=\"post\" onsubmit=\"return false;\">
                 <div class=\"settingformsave\">
                 <div class=\"textMassageSave\">
                 <input class=\"idmassagDialogs\" type=\"hidden\" value=\"".$get."\">
                  <textarea class=\"novostNewText textMassag\" placeholder=\"введите текст\" id=\"textareanews\" cols=\"1\" name=\"textNewnovost\"></textarea></div>
                  <div class=\"savemassage\"><input id=\"ginewnovostiadd\" type=\"submit\" value=\"отправить\" class=\"savemassageButton\" ></div>
                  </div>
               </form>
           </div>
        </div>
            
            ";
     
            
            
        }
        ?>