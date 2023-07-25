$(window).on('load', function () {
    vostan.onclick = vost;
     function vost() {
     err.innerHTML = " ";
     mastel=/^[0-9]{11,15}$/;
     telvost = $('#telvost').val();
         
         if(!mastel.test(telvost)){
            err.innerHTML="проверьте телефон";
            return;
        }
         msg = $('#telvost').serialize();
         $.ajax({
                    url: 'vost.php',
                    method: 'post',
                    data: msg,
                    success: function (data) {
                        if (data == 1) {
                             document.location.href = "avtoriz.php?p=paspod";
                        } else {
                            err.innerHTML = data;
                        }

                    }
                });
        
         
     }
    
})