<? include ("proverka.php");?>
<?
$get=$_GET['n'];
$id=$_COOKIE['center'];
if(!$get){
    header("Location:/index.php");
}
        if($get==$id){
        header("Location:/index.php");
        
        }else{

        }
?>
<?
$id=$get;
$stmt = $link->prepare("SELECT name,fam FROM users WHERE id=:id");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$datattt = $stmt->fetchAll();
$id=$_COOKIE['center'];
        
?>
<html lang="ru">
<head>
    <link rel="stylesheet" href="/mysranic.css">
    <meta charset="UTF-8">
    <title> <? echo $datattt[0][0]." ".$datattt[0][1];?></title>
     <?php include ('osnovnie-connect.php');?>
</head>
<body>
      <?php include("avtoriz/top-menu.php");?>
      
      <div class="centermystr">
    <div class="menumystr">
        <? include("menu/menu.php");?>
        <?
$id=$get;
$stmt = $link->prepare("SELECT name,fam,tel,images,statys,data,profil,chekTel,chekData FROM users WHERE id=:id");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
        
?>
    </div>

    <div class="fotomystr">
        <div class="fotored">
            <div class="myfoto" id="myphotostrmy"><img src="/newphoto/myphoto/<? echo $data[0][3];?>" width="100%" alt=""></div>
            <?
            $stmmt = $link->prepare("SELECT COUNT( * ) FROM friend WHERE user1=:myid AND user2=:id");
            $parametr = ['myid' =>$_COOKIE['center'],'id' =>$get];
            $stmmt->execute($parametr);
            $dataa = $stmmt->fetchAll();
            if($dataa[0][0]==0){
                echo "
                <div class=\"buttonRedact\" id=\"redactcnop\"><button onclick=\"podpiska()\" class=\"buttonRedact-cnop\">Подписаться</button></div>
                ";
            }else{
                echo "
                <div  class=\"buttonRedact\" id=\"redactcnop\"><button style=\" background: #E3E3E3;color:#216ca1;border: #c2c2c2 1px dashed;\"onclick=\"otpiska()\" class=\"buttonRedact-cnop\">Отписаться</button></div>
                ";
            }
            
            ?>
            
        </div>
        <script>
            function otpiska(){
               var msgd = new FormData();
            msgd.append('myid', <? echo $_COOKIE['center']; ?>);
            msgd.append('id', <? echo $id; ?>);
    $.ajax({
        url: 'otpiska.php',
        method: 'post',
        data: msgd,
        processData: false,
            contentType: false,
        success: function (data) {
            if (data == 1) {
                location.reload();
            } else {
                alert(data);
            }

        }
    }); 
            }
        function podpiska(){
            
             var msgd = new FormData();
            msgd.append('myid', <? echo $_COOKIE['center']; ?>);
            msgd.append('id', <? echo $id; ?>);
    $.ajax({
        url: 'podpiska.php',
        method: 'post',
        data: msgd,
        processData: false,
            contentType: false,
        success: function (data) {
            if (data == 1) {
                location.reload();
            } else {
                alert(data);
            }

        }
    });
        }
        </script>
        <?
        $stmts = $link->prepare("SELECT name,fam,images,id FROM users WHERE id IN(SELECT user2 FROM friend WHERE user1=:id)");
$parametr = ['id' =>$id];
$stmts->execute($parametr);
$datas = $stmts->fetchAll();
$ffd=count($datas);
        
        
        ?>
        <?
        if($data[0][6]==1){
            echo"
            <div class=\"myfriend\">
            <div class=\"myfriend-center\">
                <div class=\"countfriend\">Подписки &nbsp;&nbsp;<span class=\"myfriend-count\">
                    
                     ".$ffd."
                    
                    </span></div>
                <hr class=\"myfriendhr\">
                <div class=\"listMyfriend\">
                    <div class=\"myfriendStr\">
";
                     if($ffd==0){
            
            }else if($ffd>4){
                $ffd=4;
            }
for ($i=0;$i<$ffd;$i++){
    echo "

            
           <div class=\"myFriendblock m".$i."\">
                            <a href=\"user.php?n=".$datas[$i][3]."\">
                                <div class=\"myfriend-foto\"><img src=\"/newphoto/myphoto/".$datas[$i][2]."\" width=\"100%\" alt=\"\"></div>
                                <div class=\"namefriend\">
                                    <p>".$datas[$i][0]."</p>
                                </div>
                            </a>
                        </div> 
            
    ";
}    
                        
                        
                        

                    echo "</div>

                </div>
            </div>
        </div>
            
            
            ";
            
        }
        
        ?>
        
        
    </div>
    
    <div class="infomystr" id="infomffff">
        <div class="myinfo">
            <div class="myinfocenter">
                <div class="infomyname">

                    <p>
                        <? echo $data[0][0]." ".$data[0][1];?>
                    </p>
                </div>
                <?
                if($data[0][6]==1){
                echo "
                <div class=\"mystatys mytext\">
                    <div class=\"stat-form\">
                        <form method=\"post\" onsubmit=\"return false;\" name=\"form-statys\" id=\"formStatys\">
                            <input type=\"text\" placeholder=\"новый статус\" name=\"statys\" class=\"statys\">
                            <input type=\"submit\" value=\"сохранить\" class=\"sub-stat\" id=\"gostatys\">
                        </form>
                        <script src=\"statys.js\"></script>
                    </div>
                    <p><span class=\"myinfoopas\">Статус:</span>&nbsp;";
                         
                        if(!$data[0][4]==0){
                            echo $data[0][4];
                        }else{
                            echo"<span style=\"color: red\">нет статуса</span>";
                        }
                        echo"
                    </p>
                </div>
                ";
                }else{
                    echo " <div style=\"text-align: center;color:red;margin-top: 20px;
    margin-bottom: 20px;\">профиль скрыт</div>";
                }
                ?>
               <?
                if($data[0][6]==1){
                    if($data[0][8]==0){
                        $dataprof="скрыто";
                    }else{
                        $dataprof=$data[0][5];
                    }
                    if($data[0][7]==0){
                        $telprof="скрыто";
                    }else{
                        $telprof=$data[0][2];
                    }
                    echo"
                    <hr class=\"myfriendhr\">
                <div class=\"mydata mytext \">
                    <p><span class=\"myinfoopas\"> Дата рождения:</span>&nbsp;&nbsp;
                        ".$dataprof."
                    </p>
                </div>

                <div class=\"mytel mytext\">
                    <p><span class=\"myinfoopas\">Телефон:</span> &nbsp;&nbsp;
                       ".$telprof."
                    </p>
                </div>
                <hr class=\"myfriendhr\" style=\"margin-bottom: 20px;\">
                    
                    ";
                    
                }
                ?>
                
            </div>
        </div>
        

    </div>
</div>
      <script>
    
    var d1 = document.getElementById('infomffff');
        str = 1;
        newnn();
        function newnn() {
            var msg = new FormData();
            msg.append('str', str);
            msg.append('n', <? echo $get;?>);
            msg.append('prof', <? echo $data[0][6];?>);
            $.ajax({
                url: 'novostiAll.php',
                method: 'post',
                processData: false,
                contentType: false,
                data: msg,
                success: function(data) {
                    if (data == 1) {
                        return;
                    } else {
                        d1.insertAdjacentHTML('beforeend', data);
                    }
                }
            });
            str = str + 1;
        }
        $(window).scroll(function() {
            if ($(window).scrollTop() + window.innerHeight >= 0.8 * $(document).height()) {
                newnn();
                $('.daldal').remove();
            }
        });
    </script>
    <? include("fotoup/fotoSetting.php");?>
</body>
</html>