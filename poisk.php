<?
include ("conn.php");
$name=$_POST['namePoisk'];$name=htmlspecialchars($name);
$fam=$_POST['famPoisk'];$fam=htmlspecialchars($fam);
$stmt = $link->prepare("SELECT name,fam,images,id FROM users WHERE name LIKE :name and fam LIKE :fam");
$parametr = ['name' =>'%'.$name.'%','fam' =>'%'.$fam.'%'];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$ffd=count($data);

echo"
            <form action=\"\" id=\"poiskformgo\"method=\"post\" onsubmit=\"return false\">
              <div class=\"formPoisk\">
              <div>
               <input type=\"text\" class=\"inputPodpis\" placeholder=\"Имя\" name=\"namePoisk\">
               <input type=\"text\" class=\"inputPodpis\" placeholder=\"Фамилия\" name=\"famPoisk\">
               </div>
                <button onclick=\"podpiskaGo()\" class=\"podpiskaGo\" >Найти</button>
                </div>
           </form>
           ";
if($ffd==0){
echo"<div style=\"text-align: center; color :red;font-size: 12px;\">Ничего не найдено</div> ";
}
for ($i=0;$i<$ffd;$i++){
 echo"
 <div class=\"obolochka\">
                <div class=\"fotopodpiska\"><a href=\"user.php?n=".$data[$i][3]."\"><img src=\"/newphoto/myphoto/".$data[$i][2]."\" alt=\"\" width=\"100%\"></a></div>
                <div class=\"opisPodpiska\"><a href=\"user.php?n=".$data[$i][3]."\">".$data[$i][0]." ". $data[$i][1]."</a></div>
            </div>
 ";   
}
?>
