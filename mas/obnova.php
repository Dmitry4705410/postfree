<? include ("../conn.php");?>
<?
$id=$_COOKIE['center'];
$get=$_POST['user'];
$int=$_POST['int'];
$stmt = $link->prepare("SELECT massag.users2,massag.users1,massag.text FROM massag 
WHERE (massag.users1=:id OR massag.users2=:ids) and (massag.users1=:user OR massag.users2=:users)");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' =>$id,'ids' =>$id,'users' =>$get,'user' =>$get];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$link->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
$ffd=count($data);
if($ffd>$int){
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
}
?>