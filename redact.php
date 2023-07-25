<script>
function savered(){
    msg = $('#ssssaaavvvee').serialize();
    $.ajax({
        url: 'redactsave.php',
        method: 'post',
        data: msg,
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
$id=$_COOKIE['center'];
$stmt = $link->prepare("SELECT profil,chekTel,chekData FROM  `users` WHERE  `id` = :id");//ЗАЩИТА ОТ ИНЬЕКЦИЙ
$parametr = ['id' => $id];
$stmt->execute($parametr);
$datared = $stmt->fetchAll();
?>
   <div class="myprof-redact">
    <p>Редактирование профиля</p>
    <form action="" method="post" onsubmit="return false" id="ssssaaavvvee">
       <p class="red-save"> Открыть профиль <input name="profsave" type="checkbox"  value="1"
       <? 
      if($datared[0][0]=="1"){
          echo "checked";
      }                     
       ?>
       ></p>
       <p class="red-save"> Показывать номер <input name="telsave" type="checkbox" value="1"
       <? 
      if($datared[0][1]=="1"){
          echo "checked";
      }                     
       ?>
         ></p>
        <p class="red-save">Показывать дату рождения <input name="datasave" type="checkbox" value="1"
        <? 
      if($datared[0][2]=="1"){
          echo "checked";
      }                     
       ?>
        ></p>
        <button id="redsavecnop" onclick="savered()" class="red-cnop-save" >сохранить</button>
       
    </form>
</div>