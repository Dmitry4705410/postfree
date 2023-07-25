<?
include ("../conn.php");
$id=$_COOKIE['center'];
$foto=$_FILES['file']['name'];
if($foto){
$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
$detectedType = exif_imagetype($_FILES['file']['tmp_name']);
$error = !in_array($detectedType, $allowedTypes);
if($error){
    echo"загрузите файл с расширением PNG,JPEG";
    return;
}
    //загрузка  фото
    $ff=@date('YmdHis').rand(100,1000);
    $filename   = $_FILES['file']['name'];
    $new  = rand(0000,99999999999);
    $newfilename=$new.$ff;
$file = "myphoto/".$newfilename;
move_uploaded_file($_FILES['file']['tmp_name'], $file );
}

// оригинальное изображение
$filename = $file;
//die(print_r($_POST));
$failnamenew="PHOTO".$newfilename;
$new_filename = "myphoto/".$failnamenew;

// получаем размеры изображения
list($current_width, $current_height) = getimagesize($filename);
$pogreh=$current_width/500;

// координаты x и y оригинального изображение, где мы
// будем вырезать фрагмент, по данным, берущимся из формы
$x1    = $_POST['x1']*$pogreh;
$y1    = $_POST['y1']*$pogreh;
$x2    = $_POST['x2']*$pogreh;
$y2    = $_POST['y2']*$pogreh;
$w    = $_POST['w']*$pogreh;
$h    = $_POST['h']*$pogreh;     

//die(print_r($_POST));

// финальные размеры изображения
$crop_width = 220;
$crop_height = 220;

// создаём маленькое изображение
$new = imagecreatetruecolor($crop_width, $crop_height);
// создаём оригинальное изображение
$current_image = imagecreatefromjpeg($filename);
//вырезаем
imagecopyresampled($new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $w, $h);
// создаём новое изображение
imagejpeg($new, $new_filename, 95);
unlink($file);
$stmt = $link->prepare("UPDATE users set images=:photo where id=:id");
$parametr = ['photo' => $failnamenew,'id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
echo "1";




