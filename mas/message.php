<? include ("../proverka.php");
header("Access-Control-Allow-Origin: *");
?>

<html lang="ru">
<head>
   <link rel="stylesheet" href="/mysranic.css">
   <link rel="stylesheet" href="mass.css">
    <meta charset="UTF-8">
    <?php include ('../osnovnie-connect.php'); ?>
    <title>Сообщения</title>
</head>
<body>
<?php include ("../avtoriz/top-menu.php"); ?>
<div class="centermystr">
    <div class="menumystr">
     <? include("../menu/menu.php");?>
    </div>
    <div class="massageBlock">
        <div class="MassageFriend">
           <div class="nameBlock">Сообщения</div>
           <? include("myMassageFriend.php");?>
            
            
        </div>
         <? include("vivod.php");?>
        
    </div>
</div>
<? include("addDialog.php");?>


<script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
    
    
    
    
<script>
    function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
    let socket = io('http://localhost:1001');
    let clientidsocket=getCookie('center');
    socket.emit('clientId', clientidsocket);
    
    socket.on('private message',(id,text)=>{
        idmassagDialogs = $('.idmassagDialogs').val();
        if(idmassagDialogs==id){
            var str = '<div class="sms"><div class="TextSMS"><p>'+ text +'</p></div></div>';
            d1.insertAdjacentHTML('beforeend', str);
        }
        
    });
    
</script>






<script>
     var int = $(".sms").length;
   
    tt=0;
    $(document).on('click', '.MassageWindow', function() {
      
            if(tt==0){
               
                tt=1;
                $('.massagPoiskAdd').css('display', 'block');
            }else{
                tt=0;
                $('.massagPoiskAdd').css('display', 'none');
            }
            
        });
    $(document).on('click', '.buttonExitMassagePoisk', function() {
 
                $('.massagPoiskAdd').css('display', 'none');
        tt=0;
            
            
        });
    $(document).on('click', '.addsmsdialog', function() {
        id = $(this).children('.idmassagDialogs').val();
        var msgid = new FormData();
            msgid.append('id', id);
        $.ajax({
                url: 'addDialogmasseg.php',
                method: 'post',
                processData: false,
                contentType: false,
                data: msgid,
                success: function(data) {
                    if (data == 1) {
                        location.reload();
                    } else {
                        //alert(data);
                    }
                }
            });
            
            
        });
    ginewnovostiadd.onclick = goNewNovosti;

                    function goNewNovosti() {
                        textareanews = $('#textareanews').val();
                        idmassagDialogs = $('.idmassagDialogs').val();
                        if (!textareanews) {

                            errnew.innerHTML = "напишите текст";
                            return;
                        }
                        socket.emit('massege', {id:idmassagDialogs,text:textareanews,myid:clientidsocket});
                        var msg = new FormData();
                        msg.append('post', textareanews); //append file to formData object
                        msg.append('get', idmassagDialogs);

                        $.ajax({
                            url: 'newmassage.php',
                            method: 'post',
                            processData: false,
                            contentType: false,
                            data: msg,
                            success: function(data) {
                                if (data == 1) {
                                    location.reload();
                                } else {
                                    $('#textareanews').val(" ");
                                     d1.insertAdjacentHTML('beforeend', data);
                                      int = int+1;
                                    $(".allMessages").scrollTop($(".allMessages")[0].scrollHeight);
                                }

                            }
                        });
                       
                    }
   
   
     $(".allMessages").scrollTop($(".allMessages")[0].scrollHeight);
    </script>
    
    
    
    
    
</body>
</html>  