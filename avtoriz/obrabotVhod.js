$(window).on('load', function(){
    vhods.onclick = vhod;

    function vhod() {
        err.innerHTML = " ";
        mastel=/^[0-9]{11,15}$/;
        logintel = $('#logintel').val();
        passavto = $('#passavto').val();
        
        if(!mastel.test(logintel)){
            err.innerHTML="проверьте телефон";
            return;
        }
          msg = $('#vhod').serialize();
        if(logintel && passavto){
            $.ajax({
                    url: 'vhod.php',
                    method: 'post',
                    data: msg,
                    success: function (data) {
                        if (data == 1) {
                            document.location.href = "../index.php";
                        }else if(data == 2){
                            document.location.href = "avtoriz.php?p=pod";
                        } 
                        
                        else {
                            err.innerHTML = data;
                        }

                    }
                }); 
        } else {
            err.innerHTML = "заполните все поля";
        }
    }
    
    registr.onclick = regper;

    function regper() {
        document.location.href = "avtoriz.php?p=reg";
    }

})
