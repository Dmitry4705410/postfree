$(window).on('load', function () {
    zareg.onclick = reg;

    function reg() {
        err.innerHTML = " ";
        masname=/^[A-Za-zА-Яа-яЁё]{1,100}$/;
        masfam=/^[A-Za-zА-Яа-яЁё]{1,100}$/;
        mastel=/^[0-9]{11,15}$/;
        maspas=/^[A-Za-z0-9]{8,100}$/;
        
        namereg = $('#nameReg').val();
        famReg = $('#famReg').val();
        telReg = $('#telReg').val();
        passReg = $('#passReg').val();
        paspovReg = $('#paspovReg').val();
        dataReg = $('#datareg').val();
        if(!dataReg){
            err.innerHTML="проверь дату";
            return;
        }
        
        
        if(!masname.test(namereg)){
            err.innerHTML="проверьте именя";
            return;
        }
        if(!masfam.test(famReg)){
            err.innerHTML="проверьте фамилию";
            return;
        }
        if(!mastel.test(telReg)){
            err.innerHTML="проверьте телефон";
            return;
        }
        if(!maspas.test(passReg)){
            err.innerHTML="проверьте пароль";
            return;
        }
        
        
        
        
        if (namereg && famReg && passReg && paspovReg && telReg) {
            if (passReg == paspovReg) {
                msg = $('#registracia').serialize();
                $.ajax({
                    url: 'registracia.php',
                    method: 'post',
                    data: msg,
                    success: function (data) {
                        if (data == 1) {
                             document.location.href = "avtoriz.php?p=pod";
                        } else {
                            err.innerHTML = data;
                        }

                    }
                });
            }else{
                 err.innerHTML="пароли не равны";
            }
        } else {
            err.innerHTML = "заполните все поля";
        }


    }


})
