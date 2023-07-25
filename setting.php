<? include ("proverka.php");?>
<?
$id=$_COOKIE['center'];
$stmt = $link->prepare("SELECT name,fam FROM  `users` WHERE  `id` = :id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' => $id];
$stmt->execute($parametr);
$datared = $stmt->fetchAll();
?>
<html lang="ru">
<head>
   <link rel="stylesheet" href="/setting.css">
    <meta charset="UTF-8">
    <title>Настройки профиля</title>
     <?php include ('osnovnie-connect.php'); ?>
</head>
<body>
     <script>
    function saveProfilMy(){
        err.innerHTML = " ";
        masname=/^[A-Za-zА-Яа-яЁё]{1,100}$/;
        masfam=/^[A-Za-zА-Яа-яЁё]{1,100}$/;
        
        namereg = $('#namesetting').val();
        famReg = $('#famsetting').val();
        if(!namereg){
            err.innerHTML="проверьте имя";
            return;
        }
        if(!famReg){
            err.innerHTML="проверьте фамилию";
            return;
        }
        if(!masname.test(namereg)){
            err.innerHTML="проверьте именя";
            return;
        }
        if(!masfam.test(famReg)){
            err.innerHTML="проверьте фамилию";
            return;
        }
        msg = $('#settingprofilmy').serialize();
                $.ajax({
                    url: 'settingMy.php',
                    method: 'post',
                    data: msg,
                    success: function (data) {
                        if (data == 1) {
                             document.location.href = "setting.php";
                        } else {
                            err.innerHTML = data;
                        }

                    }
                });
        
    }
         function saveMypas(){
             errpas.innerHTML = " ";
             starpas = $('#starpas').val();
             passReg = $('#pasnew').val();
            paspovReg = $('#pasnewpov').val();
             if(!starpas){
            errpas.innerHTML="проверьте старый пароль";
            return;
        }
             if(!passReg){
            errpas.innerHTML="проверьте новый пароль";
            return;
        }
             if(paspovReg!=passReg){
                errpas.innerHTML="пароли не совпадают";
            return; 
             }
              msg = $('#smena-pass').serialize();
                $.ajax({
                    url: 'settingMypas.php',
                    method: 'post',
                    data: msg,
                    success: function (data) {
                        if (data == 1) {
                             document.location.href = "setting.php";
                        } else {
                            errpas.innerHTML = data;
                        }

                    }
                });
             
         }
    
    </script>
      <?php include ("avtoriz/top-menu.php"); ?>
      <div class="settingMy">
         <p>Личные данные</p>
         <div id="err"></div>
          <form action="" method="post" onsubmit="return false" id="settingprofilmy">
              <input type="text" name="namesetting" id="namesetting" class="setting" placeholder="Имя" value="<?echo $data[0][0]?>"><br>
              <input type="text" name="famsetting" id="famsetting" class="setting" placeholder="Фамилия" value="<?echo $data[0][1]?>"><br>
               <button onclick="saveProfilMy()" class="setting-button" >сохранить</button>
          </form>
          <p>Смена пароля</p>
           <div id="errpas"></div>
        <form action="" onsubmit="return false" method="post" id="smena-pass">
          <input type="text" class="setting" id="starpas" name="starpas" placeholder="Cтарый пароль"><br>
          <input type="text" class="setting" id="pasnew" name="pasnew"placeholder="Новый пароль"><br>
          <input type="text" class="setting" name="pasnewpov" id="pasnewpov" placeholder="Повтор пароля"><br> 
          <button onclick="saveMypas()" class="setting-button" >сохранить</button> 
        </form>
          
      </div>
</body>
</html>