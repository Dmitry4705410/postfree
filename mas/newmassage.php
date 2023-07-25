<? include ("../conn.php");?>
<?
$text=$_POST['post'];$text=nl2br( htmlspecialchars($text));

$text = trim($text);

$id=$_COOKIE['center'];
$get=$_POST['get'];
if(!$text){
    echo"напишите текст";
    return;
}



$stmt = $link->prepare("INSERT INTO massag (id, users1, users2, text, data)
VALUES (NULL, :users1, :users2, :text, current_timestamp())");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['users1' => $id,'users2' => $get,'text' => $text];
$stmt->execute($parametr);
$data = $stmt->fetchAll();

$stmt = $link->prepare("UPDATE dialogmassage set new=1 where user2=:idss and user1=:ids");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
    $parametr = ['idss' => $get,'ids' => $id];
    $stmt->execute($parametr);
    $data = $stmt->fetchAll();
$alltext= $text;
                $alltext=str_replace("\n", "</p><p>", $alltext);
echo"
                 <div class=\"sms\">
                   <div class=\"my\"><p>".$alltext."</p></div>
               </div>
                 "; 
?>