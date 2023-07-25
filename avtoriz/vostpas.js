$(window).on('load', function () {
     err.innerHTML = "код приходит до 5 минут";
    izmen.onclick = izme;
     function izme() {
         
     err.innerHTML = "код приходит до 5 минут";
         
     maspas=/^[A-Za-z0-9]{8,100}$/;
     maskod=/^[0-9]{4}$/;
         
     kodvost = $('#kodvost').val();
     passvost = $('#passvost').val();
     passvostclon = $('#passvostclon').val();
         
         if(!maskod.test(kodvost)){
            err.innerHTML="проверьте код";
            return;
        }
         
        if(!maspas.test(passvost)){
            err.innerHTML="проверьте пароль";
            return;
        }
         if(passvost==passvostclon){
            msg = $('#paspod').serialize();
         $.ajax({
                    url: 'newpas.php',
                    method: 'post',
                    data: msg,
                    success: function (data) {
                        if (data == 1) {
                             document.location.href = "avtoriz.php";
                        } else {
                            err.innerHTML = data;
                        }

                    }
                });
            }else{
               err.innerHTML="пароли не совпадают"; 
            }
        
         
     }
    
})