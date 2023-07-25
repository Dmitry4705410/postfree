stat = 0;

function statys() {
    if (stat == 0) {
        $('.stat-form').css('display', 'block');
        stat = 1;
    } else {
        $('.stat-form').css('display', 'none');
        stat = 0;
    }

}

gostatys.onclick = statysGo;

function statysGo() {
    statsname = $('.statys').val();
    //masstats = /^[A-Za-zА-Яа-яЁё0-9\s]{0,100}$/;
   // if (!masstats.test(statsname)) {
      //  alert("разрешено до 100 символов русских,англ букв и цифр ");
       // return;
  //  }
     msg = $('#formStatys').serialize();
    $.ajax({
        url: 'statys.php',
        method: 'post',
        data: msg,
        success: function (data) {
            if (data == 1) {
                location.reload();
            } else {
                alert(data);
            }

        }
    });


}
now = 0;
function newNovost(){
     if (now == 0) {
        $('.addnewnovost').css('display', 'block');
        now = 1;
    } else {
        $('.addnewnovost').css('display', 'none');
        now = 0;
    }
}

