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
    <style>
        .news{
            width: 90%;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h6{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .novostiFriend{
            margin-bottom: 20px;
        }
    </style>
    <div class="novostiFriend" id="novostiFriend">
    <h6>НОВОСТИ</h6>
    
    
        
        
        
        <script>
        var d1 = document.getElementById('novostiFriend');
        str = 1;
        newnn();
        function newnn() {
            var msg = new FormData();
            msg.append('str', str);
            $.ajax({
                url: 'vivodnovost.php',
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
        
    </div>
    </div>
    <? include("fotoup/fotoSetting.php");?>
</body>
</html>
