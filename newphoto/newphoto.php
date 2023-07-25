<link rel="stylesheet" href="/newphoto/newphoto.css">
<script type="text/javascript" src="/newphoto/jquery.imgareaselect.js"></script>
<link rel="stylesheet"  href="/newphoto/imgareaselect-default.css">  
<div class="centerNewPhoto">
<div class="blockNewFoto">
    <form method="post" id="newphoto" enctype="multipart/form-data" onsubmit="return false;">
                   <div id="errphotosave" style="color:red;font-size: 8pt;"></div>
                    <label for='inputFilePhoto'>
                        <div class="upload">
                            Загрузить фото
                        </div>
                    </label>
                        <input type="hidden" name="x1" id="x1" value="" />
                        <input type="hidden" name="y1" id="y1" value="" />
                        <input type="hidden" name="x2" id="x2" value="" />
                        <input type="hidden" name="y2" id="y2" value="" />
                        <input type="hidden" name="w" id="w" value="" />
                        <input type="hidden" name="h" id="h" value="" />

                    <input type="file" id="inputFilePhoto"  class="fileNewNovost" name="fileNewphoto">
                    <img id="image_photo" src="" />
                    <div style="text-align: center;"><input type="submit" value="сохранить" class="savenovost" id="savephotomy"></div>

                </form>
                <script>
function readURLs(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#image_photo').css('display', 'block');
                                $('#image_photo').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#inputFilePhoto").change(function() {
                        readURLs(this);
                    });
                    
         
          
         selection = $('#image_photo').imgAreaSelect({
    aspectRatio: '1:1',
    handles: true,
    instance: true,
             
});
    $("#savephotomy").click(function(){
    var s = selection.getSelection();
            $('input[name=x1]').val(s.x1);
            $('input[name=y1]').val(s.y1);
            $('input[name=x2]').val(s.x2);
            $('input[name=y2]').val(s.y2);
            $('input[name=w]').val(s.width);
            $('input[name=h]').val(s.height);
        x1 = $('#x1').val();
        y1 = $('#y1').val();
        x2 = $('#x2').val();
        y2 = $('#y2').val();
        w = $('#w').val();
        h = $('#h').val();
        var filePhoto = document.getElementById("inputFilePhoto").files[0]; //fetch file
                        var msg = new FormData();
                        msg.append('file', filePhoto);
                        msg.append('x1', x1);
                        msg.append('y1', y1);
                        msg.append('x2', x2);
                        msg.append('y2', y2);
                        msg.append('w', w);
                        msg.append('h', h);
                        
                       
                        $.ajax({
                            url: '/newphoto/addnewphoto.php',
                            method: 'post',
                            processData: false,
                            contentType: false,
                             data:  msg,
                            success: function(data) {
                                if (data == 1) {
                                    location.reload();
                                } else {
                                     errphotosave.innerHTML = data;
                                    
                                    
                                }

                            }
                        });
        
        
});
    


</script>
</div></div>
