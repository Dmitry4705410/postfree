
<? include ("conn.php");?>
<link rel="stylesheet" href="/mysranic.css">
<? include ("newphoto/newphoto.php");?>
<div class="centermystr">
    <div class="menumystr">
        <? include("menu/menu.php");?>
        <?
$id=$_COOKIE['center'];
$stmt = $link->prepare("SELECT name,fam,tel,images,statys,data FROM users WHERE id=:id");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();
         
?>
    </div>

    <div class="fotomystr">
        <div class="fotored">
            <div class="myfoto" id="myphotostrmy"><img src="/newphoto/myphoto/<? echo $data[0][3];?>" width="100%" alt=""></div>
            <div class="buttonRedact" id="redactcnop"><button class="buttonRedact-cnop">Редактировать профиль</button></div>
        </div>

        <script>
            redactcnop.onclick = redact;
            radct = 0;

            function redact() {
                if (radct == 0) {
                    $('.myprof-redact').css('display', 'block');
                    radct = 1;
                } else {
                    $('.myprof-redact').css('display', 'none');
                    radct = 0;
                }
            }

        </script>
        
        <?
        $stmts = $link->prepare("SELECT name,fam,images,id FROM users WHERE id IN(SELECT user2 FROM friend WHERE user1=:id)");
$parametr = ['id' =>$id];
$stmts->execute($parametr);
$datas = $stmts->fetchAll();
$ffd=count($datas);
        
        
        ?>
        <div class="myfriend">
            <div class="myfriend-center">
                <div class="countfriend">Подписок &nbsp;&nbsp;<span class="myfriend-count">
                   <?
                    echo $ffd;
                    ?>
                    </span></div>
                <hr class="myfriendhr">
                <div class="listMyfriend">
                    <div class="myfriendStr">
<?

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
                        
                        
                        
?>
                        
                        
                        
                        

                    </div>

                </div>
            </div>
        </div>
    </div>
    <?
    include ("redact.php");
    ?>
    <div class="infomystr" id="infomffff">
        <div class="myinfo">
            <div class="myinfocenter">
                <div class="infomyname">
   
                    <p>
                        <? echo $data[0][0]." ".$data[0][1];?><span class="myinfoopas" onclick="statys()"> &nbsp;&nbsp;Изменить статус</span>
                    </p>
                </div>

                <div class="mystatys mytext">
                    <div class="stat-form">
                        <form method="post" onsubmit="return false;" name="form-statys" id="formStatys">
                            <input type="text" placeholder="новый статус" name="statys" class="statys">
                            <input type="submit" value="сохранить" class="sub-stat" id="gostatys">
                        </form>
                        <script src="statys.js"></script>
                    </div>
                    <p><span class="myinfoopas">Статус:</span>&nbsp;
                        <? 
                        if(!$data[0][4]==0){
                            echo $data[0][4];
                        }else{
                            echo"<span style=\"color: red\">нет статуса</span>";
                        }
                        
                        ?>
                    </p>
                </div>
                <hr class="myfriendhr">
                <div class="mydata mytext ">
                    <p><span class="myinfoopas"> Дата рождения:</span>&nbsp;&nbsp;
                        <? echo $data[0]['data'];?>
                    </p>
                </div>

                <div class="mytel mytext">
                    <p><span class="myinfoopas">Телефон:</span> &nbsp;&nbsp;
                        <? echo $data[0]['tel'];?>
                    </p>
                </div>
                <hr class="myfriendhr" style="margin-bottom: 20px;">
            </div>
        </div>
        <div class="addnovost" onclick="newNovost()">
            <p>Добавить запись</p>
        </div>
        <div class="addnewnovost">
            <div class="centerNewNovost">
                <form method="post" id="addnovostiNEW" enctype="multipart/form-data" onsubmit="return false;">
                    <div id="errnew" style="color:red;font-size: 8pt;"></div>
                    

                    <div id="uploaded" style="color:red;font-size: 8pt;"></div>
                    <textarea class="novostNewText" placeholder="введите текст" id="textareanews" cols="1" name="textNewnovost"></textarea><br>
                    <label for='inputFile'>
                        <div class="upload">
                            Загрузить фото
                        </div>
                    </label>
                    <input type="file" id="inputFile" class="fileNewNovost" name="fileNewfNovost">
                    <img id="image_upload_preview" src="" />
                    <div style="text-align: right;"><input type="submit" value="сохранить" class="savenovost" id="ginewnovostiadd"></div>

                </form>
                <script>
                    $('#textareanews').on('input', function(e) {
                        this.style.height = '1px';
                        this.style.height = (this.scrollHeight + 6) + 'px';
                    });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#image_upload_preview').css('display', 'block');
                                $('#image_upload_preview').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#inputFile").change(function() {
                        readURL(this);
                    });

                    ginewnovostiadd.onclick = goNewNovosti;

                    function goNewNovosti() {
                        textareanews = $('#textareanews').val();
                        if (!textareanews) {

                            errnew.innerHTML = "напишите текст";
                            return;
                        }
                        var file = document.getElementById("inputFile").files[0]; //fetch file
                        
    
                        //var msgh = $('#addnovostiNEW').serialize();
                        var msg = new FormData();
                        msg.append('post', textareanews); //append file to formData object
                        msg.append('file', file); //append file to formData object


                        $.ajax({
                            url: 'addnewnovosti.php',
                            method: 'post',
                            processData: false,
                            contentType: false,
                            data: msg,
                            success: function(data) {
                                if (data == 1) {
                                    location.reload();
                                } else {
                                    errnew.innerHTML = data;

                                }

                            }
                        });
                       
                    }

                </script>
            </div>
        </div>

    </div>
</div>
<? include("fotoup/fotoSetting.php");?>
<script>
    $(window).on('load', function() {
        myphotostrmy.onclick = newphotoOn;
        onphoto = 0;

        function newphotoOn() {
            if (onphoto == 0) {
                $('.centerNewPhoto').css('display', 'block');
                onphoto = 1;
            } else {
                $('.centerNewPhoto').css('display', 'none');
                onphoto = 0;
            }

        }
        $(document).mouseup(function(e) {
            if (onphoto == 1) {
                // отслеживаем событие клика по веб-документу
                var fans = $(".blockNewFoto");
                // определяем элемент, к которому будем применять условия (можем указывать ID, класс либо любой другой идентификатор элемента)
                if (!fans.is(e.target) // проверка условия если клик был по нашему блоку
                    &&
                    fans.has(e.target).length === 0
                ) { // проверка условия если клик не по его дочерним элементам
                    //newphotoOn();
                    // если условия выполняются - скрываем наш элемент
                }
            }
        });



        $(document).on('click', '.daldal', function() {
            newnn();
            this.remove();
        });
        $(document).on('click', '.podrobNews', function() {
            $(this).siblings('.delete').css('display', 'block');
            this.remove();
        });
        $(document).on('click', '.deleteButton', function() {
            $(this).parents('.news').remove();
            id = $(this).siblings('.deleteId').val();
            var msgid = new FormData();
            msgid.append('id', id);
            $.ajax({
                url: 'deletenews.php',
                method: 'post',
                processData: false,
                contentType: false,
                data: msgid,
                success: function(data) {
                    if (data == 1) {
                        return;
                    } else {
                        alert(data);
                    }
                }
            });
        });

        var d1 = document.getElementById('infomffff');
        str = 1;
        newnn();
        function newnn() {
            var msg = new FormData();
            msg.append('str', str);
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




    });

</script>
