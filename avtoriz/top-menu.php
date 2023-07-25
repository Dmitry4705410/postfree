<link rel="stylesheet" href="/avtoriz/top-menu.css">
<div class="top-menu">
    <div class="center">
        <div class="logo"><a href="/index.php">PostFree</a></div>
        <?
        if($avtorizacia==1){
            
$stmt = $link->prepare("SELECT name,fam,images FROM users WHERE id=:id");
$parametr = ['id' =>$id];
$stmt->execute($parametr);
$data = $stmt->fetchAll();

 
            echo" <div class=\"barname\" id=\"menuon\">
            <div class=\"imagesname\"><img src=\"/newphoto/myphoto/".$data[0][2]."\" width=\"100%\" ></div>
            <div class=\"namename\">
                <p>".$data[0][0]."</p>
            </div>
            <div class=\"strelkaname\"><img class=\"imgstrelka\"  src=\"/avtoriz/images/strelka.png\" width=\"100%\" ></div>
        </div>

    <div class=\"menufoc\">
            <div class=\"menufocCenter\">
                <a href=\"/setting.php\"><div class=\"menusilka\">Настройки</div></a>
                
                <hr class=\"hr-menu\">
               <a href=\"/delete.php\"> <div class=\"menusilka\">Выход</div></a>
            </div>
        </div>
        <script src=\"/avtoriz/menu.js\"></script>
        ";
        }
        ?>

        

    </div>
    
        
   
</div>
