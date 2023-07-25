<link rel="stylesheet" href="avtoriz.css">
<div class="center-block">
    <div class="novosti">
        <div class="zagolovok">НОВОСТИ</div>
        <div class="center-ramka">
            <div class="center-novosti">
                <div class="name-novosti">Открытие проекта</div>
                <div class="data-novosti">17 апреля 2021 в 20:35</div>
                <div class="text-novosti">Начато тестирование проекта. <br>О всех ошибках и багах сообщать на электронную почту 470541099@mail.ru</div>
                <div class="photo-novosti"><img src="images/ERROR.jpg" alt="" width="100%"></div>
            </div>
        </div>
    </div>
    <?
        $get=$_GET['p'];
        $get = htmlspecialchars(trim(strip_tags(stripslashes($get))));
        if($get=="reg"){
            $today = date("Y-m-d"); 
           echo"
           <div class=\"avtoriz regis \" >
            <div class=\"zagolovok\">РЕГИСТРАЦИЯ</div>
            <div class=\"center-ramka\">
                <div class=\"center-form\">
                    <div class=\"eror\"id=\"err\"></div>
                    <form  method=\"post\" id=\"registracia\" onsubmit=\"return false;\">
                        <input class=\"input\" required pattern=\"[A-Za-zА-Яа-яЁё]{1,100}\" title=\"русские,англисские буквы не менее 1\" type=\"text\" id=\"nameReg\" placeholder=\"имя\" name=\"name\"><br>
                        <input class=\"input\" pattern=\"[A-Za-zА-Яа-яЁё]{1,100}\" title=\"русские,англисские буквы не менее 1\" type=\"text\" id=\"famReg\" placeholder=\"фамилия\" name=\"fam\"><br>
                        <input type=\"date\" class=\"input\" id=\"datareg\" name=\"dataregusers\" max=\"".$today."\"><br>
                        <input class=\"input\" type=\"text\" id=\"telReg\" placeholder=\"телефон\" pattern=\"[0-9]{11,15}\" title=\"номер в формате 89...\" name=\"login-reg\"><br>
                        <input class=\"input\" pattern=\"[A-Za-z0-9]{8,100}\" title=\"8 или более символов, имеющих по крайней мере одно число, и одну букву верхнего и нижнего регистра\" type=\"password\" id=\"passReg\" placeholder=\"пароль\" name=\"pass-reg\"><br>
                        <input class=\"input\" pattern=\"[A-Za-z0-9]{8,100}\" title=\"8 или более символов на англ, имеющих по крайней мере одно число, и одну букву верхнего и нижнего регистра\" type=\"password\" id=\"paspovReg\" placeholder=\"повтор пароля\" name=\"pass-pov-reg\"><br>
                        <input type=\"button\" value=\"регистрация\" id=\"zareg\" name=\"reg\" class=\"submit reg regsmen\">
                    </form>
                </div>
            </div>
        </div>
        <script src=\"obrabotReg.js\"></script>
           "; 
        }elseif($get=="pod"){
            echo"
            <div class=\"avtoriz regis \">
            <div class=\"zagolovok\">РЕГИСТРАЦИЯ</div>
            <div class=\"center-ramka\">
                <div class=\"center-form\">
                    <div class=\"eror\" id=\"err\"></div>
                    <form action=\"\" id=\"podtver\" method=\"post\" onsubmit=\"return false;\">
                        <input class=\"input\" type=\"text\" id=\"kodphone\" pattern=\"[0-9]{4}\" title=\"только цифры\" placeholder=\"код\" name=\"cod-reg\"><br>
                        <input type=\"button\" value=\"подтверждение\" id=\"podtv\" name=\"kod\" class=\"submit reg regsmen\">
                    </form>
                </div>
            </div>
        </div>
        <script src=\"obrabotPod.js\"></script>
            ";
        }elseif($get=="pas"){
            echo"
            <div class=\"avtoriz regis \">
            <div class=\"zagolovok\">восстановление</div>
            <div class=\"center-ramka\">
                <div class=\"center-form\">
                    <div class=\"eror\" id=\"err\"></div>
                    <form action=\"\" id=\"vost\" method=\"post\" onsubmit=\"return false;\">
                        <input class=\"input\" type=\"text\" id=\"telvost\" pattern=\"[0-9]{11,15}\" title=\"номер в формате 89...\" placeholder=\"телефон\" name=\"telvost\"><br>
                        <input type=\"button\" value=\"далее\" id=\"vostan\" name=\"vost\" class=\"submit reg regsmen\">
                    </form>
                </div>
            </div>
        </div>
        <script src=\"vost.js\"></script>
            ";
        }elseif($get=="paspod"){
            echo"
            <div class=\"avtoriz regis \">
            <div class=\"zagolovok\">восстановление</div>
            <div class=\"center-ramka\">
                <div class=\"center-form\">
                    <div class=\"eror\" id=\"err\"></div>
                    <form action=\"\" id=\"paspod\" method=\"post\" onsubmit=\"return false;\">
                       <input class=\"input\" type=\"text\" id=\"kodvost\" pattern=\"[0-9]{4}\" title=\"только цифры\" placeholder=\"код\" name=\"codvost\"><br>
                       <input class=\"input\" pattern=\"[A-Za-z0-9]{8,100}\" title=\"8 или более символов, имеющих по крайней мере одно число, и одну букву верхнего и нижнего регистра\" type=\"password\" id=\"passvost\" placeholder=\"новый пароль\" name=\"passvost\"><br>
                        <input class=\"input\" pattern=\"[A-Za-z0-9]{8,100}\" title=\"8 или более символов на англ, имеющих по крайней мере одно число, и одну букву верхнего и нижнего регистра\" type=\"password\" id=\"passvostclon\" placeholder=\"повтор пароля\" name=\"passvostclon\"><br>
                        <input type=\"button\" value=\"изменить\" id=\"izmen\" name=\"izmen\" class=\"submit reg regsmen\">
                    </form>
                </div>
            </div>
        </div>
        <script src=\"vostpas.js\"></script>
            ";
        }else{
echo"

             <div class=\"avtoriz vhods\">
            <div class=\"zagolovok\">АВТОРИЗАЦИЯ</div>
            <div class=\"center-ramka\">
                <div class=\"center-form\">
                    <div class=\"eror\" id=\"err\"></div>
                    <form method=\"post\" onsubmit=\"return false;\" id=\"vhod\">
                        <input class=\"input\" pattern=\"[0-9]{11,15}\" title=\"номер в формате 89...\" id=\"logintel\" type=\"text\" placeholder=\"телефон\" name=\"logintel\"><br>
                        <input class=\"input\" type=\"password\" placeholder=\"пароль\" id=\"passavto\" name=\"passavto\"><br>
                        <input type=\"button\" value=\"регистрация\" id=\"registr\" name=\"reg\" class=\"submit reg regsmen\">
                        <input type=\"button\" value=\"вход\" id=\"vhods\" name=\"vhod\" class=\"submit vhod vhodsmen \">
                         <a style=\" font-size: 8pt\" href=\"avtoriz.php?p=pas\">забыл пароль</a>
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <script src=\"obrabotVhod.js\"></script>
            ";
        }
        ?>

</div>
