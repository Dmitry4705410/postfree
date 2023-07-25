$(window).on('load', function(){
    podtv.onclick = pod;
      err.innerHTML = "код приходит до 5 минут";
    function pod() {
        err.innerHTML = "код приходит до 5 минут";
        kodphone = $('#kodphone').val();
        maskod=/^[0-9]{4}$/;
        if(!maskod.test(kodphone)){
            err.innerHTML="проверьте код";
            return;
        }
        
        
        if(kodphone){
        msg = $('#podtver').serialize();
            $.ajax({
                    url: 'podtver.php',
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
            
            
        }
    }
    

})