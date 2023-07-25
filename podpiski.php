<? include ("proverka.php");?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подписки</title>
     <?php include ('osnovnie-connect.php'); ?>
</head>
<body>
      <?php include ("avtoriz/top-menu.php"); ?>
      <? include ("conn.php");?>
<link rel="stylesheet" href="/mysranic.css">
<link rel="stylesheet" href="/podpiski.css">
<? include ("newphoto/newphoto.php");?>
<div class="centermystr">
    <div class="menumystr">
        <? include("menu/menu.php");?>
    </div>
    <div class="podpiski">
        <div class="Myvariant">
            <div class="variant"><a href="podpiski.php">Я подписан(а)</a></div>
            <div class="variant"><a href="podpiski.php?k=all">Мои подписчики</a></div>
            <div class="variant"><a href="podpiski.php?k=poisk">Поиск</a></div>
        </div>
        <hr class="hr-podpiski">
        <div class="osnivaPodpiski" id="osnivaPodpiski11">
            <?
        $get=$_GET['k'];
        if($get=="poisk"){
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
        }else if($get=="all"){
             $stmt = $link->prepare("SELECT name,fam,images,id FROM users WHERE id IN(SELECT user1 FROM friend WHERE user2=:id)");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$ffd=count($data);
            if($ffd==0){
                echo"<div style=\"text-align: center; color :red;font-size: 12px;\">На вас никто не подписан</div> ";
            }
for ($i=0;$i<$ffd;$i++){
    echo "
    <div class=\"obolochka\">
                <div class=\"fotopodpiska\"><a href=\"user.php?n=".$data[$i][3]."\"><img src=\"/newphoto/myphoto/".$data[$i][2]."\" alt=\"\" width=\"100%\"></a></div>
                <div class=\"opisPodpiska\"><a href=\"user.php?n=".$data[$i][3]."\">".$data[$i][0]." ". $data[$i][1]."</a></div>
            </div>
    ";
}   
            
        
        }else{
             $stmt = $link->prepare("SELECT name,fam,images,id FROM users WHERE id IN(SELECT user2 FROM friend WHERE user1=:id)");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
$ffd=count($data);
            if($ffd==0){
                
                echo"<div style=\"text-align: center; color :red;font-size: 12px;\">Подпишитесь на кого нибудь</div> ";
            }
for ($i=0;$i<$ffd;$i++){
    echo "
    <div class=\"obolochka\">
                <div class=\"fotopodpiska\"><a href=\"user.php?n=".$data[$i][3]."\"><img src=\"/newphoto/myphoto/".$data[$i][2]."\" alt=\"\" width=\"100%\"></a></div>
                <div class=\"opisPodpiska\"><a href=\"user.php?n=".$data[$i][3]."\">".$data[$i][0]." ". $data[$i][1]."</a></div>
            </div>
    ";
}            
        }
        ?>
         <script>
            
            function podpiskaGo(){
                msg = $('#poiskformgo').serialize();
                var d1 = document.getElementById('osnivaPodpiski11');
                $("#osnivaPodpiski11").html("");
    $.ajax({
        url: 'poisk.php',
        method: 'post',
        data: msg,
        success: function (data) {
            if (data == 1) {
                location.reload();
            } else {
                 
        d1.insertAdjacentHTML('beforeend', data);
            }

        }
    });
            }
            </script>  
            
        </div>
    </div>
    </div>
</body>
</html>