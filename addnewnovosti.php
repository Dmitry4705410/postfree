<?
include ("conn.php");


                        

//var_dump($_POST['post']);
//var_dump($_FILES['file']);
//$text=$_POST['post'];$text=htmlspecialchars($text);
$text=$_POST['post'];$text=nl2br( htmlspecialchars($text));

$text = trim($text);
$id=$_COOKIE['center'];
if(!$text){
    echo"напишите текст";
    return;
}
$foto=$_FILES['file']['name'];
if($foto){
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
$detectedType = exif_imagetype($_FILES['file']['tmp_name']);
$error = !in_array($detectedType, $allowedTypes);
if($error){
    echo"загрузите файл с расширением PNG,JPEG";
    return;
}
    //загрузка текста и фото
    $ff=@date('YmdHis').rand(100,1000);
    $filename   = $_FILES['file']['name'];
    $new  = rand(0000,999999);
    $newfilename=$new.$ff.$filename;
$file = "postimg/".$newfilename;
move_uploaded_file($_FILES['file']['tmp_name'], $file );
  
//список месяцев с названиями для замены
$_monthsList = array(".01." => "января", ".02." => "февраля", 
".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", 
".07." => "июля", ".08." => "августа", ".09." => "сентября",
".10." => "октября", ".11." => "ноября", ".12." => "декабря");
//текущая дата
$currentDate = date("j.m.Y");
$datanew = date("H:i");   
//переменная $currentDate теперь хранит текущую дату в формате 22.07.2015
 
//но так как наша задача - вывод русской даты, 
//заменяем число месяца на название:
$_mD = date(".m."); //для замены
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);
//теперь в переменной $currentDate хранится дата в формате 22 июня 2015   
    
    
$stmt = $link->prepare("INSERT INTO post (id_users, text, img,data,time)
VALUES (:id_users, :text, :img,:data,:time)");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id_users' => $id,'text' => $text,'img' => $newfilename,'data' => $currentDate,'time' => $datanew];
$stmt->execute($parametr);
$data = $stmt->fetchAll(); 
    echo"1";
}else{
    //список месяцев с названиями для замены
$_monthsList = array(".01." => "января", ".02." => "февраля", 
".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня", 
".07." => "июля", ".08." => "августа", ".09." => "сентября",
".10." => "октября", ".11." => "ноября", ".12." => "декабря");
//текущая дата
$currentDate = date("j.m.Y");
$datanew = date("H:i");   
//переменная $currentDate теперь хранит текущую дату в формате 22.07.2015
 
//но так как наша задача - вывод русской даты, 
//заменяем число месяца на название:
$_mD = date(".m."); //для замены
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);
//теперь в переменной $currentDate хранится дата в формате 22 июня 2015   
    
    
$stmt = $link->prepare("INSERT INTO post (id_users, text, img,data,time)
VALUES (:id_users, :text, :img,:data,:time)");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id_users' => $id,'text' => $text,'img' => "0",'data' => $currentDate,'time' => $datanew];
$stmt->execute($parametr);
$data = $stmt->fetchAll(); 
    echo"1";
}

?>