$(window).on('load', function () {
    on=0;
    menuon.onclick = ons;
     function ons() {
         if(on==0){
         $('.barname').css('background', '#3574a0');
         $('.imgstrelka').css('transform', 'rotate(180deg)');
             $('.menufoc').css('display', 'block');
             on=1;
}else{
     $('.imgstrelka').css('transform', 'rotate(0deg)');
    $('.barname').css('background', '');
   $('.menufoc').css('display', 'none');
    on=0;
}  
     }
    
    
     $(document).mouseup(function (e){ 
        if(on==1){
            // отслеживаем событие клика по веб-документу
        var menus = $("#menuon");
        var block = $(".menufoc"); // определяем элемент, к которому будем применять условия (можем указывать ID, класс либо любой другой идентификатор элемента)
        if (!block.is(e.target) // проверка условия если клик был не по нашему блоку
            && block.has(e.target).length === 0 
            &&!menus.is(e.target)
           && menus.has(e.target).length === 0) { // проверка условия если клик не по его дочерним элементам
            ons();
             // если условия выполняются - скрываем наш элемент
        }
           }
    }); 
    

    
})