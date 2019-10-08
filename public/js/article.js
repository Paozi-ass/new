// 使用jquery写自定义js
$(function(){
    //文件选择框
    $('#img').on('click',function(e){
        // 文件选择框
        $('#uploadField').click();
    });

    $('#uploadField').on('change',function(e){
        var $file = $(this)[0].files[0];
        console.log($file);
        // 将图片显示到缩略图中
        var reader = new FileReader();
        reader.readAsDataURL($file);
        reader.onload=function(){
           
          $('.img-thumbnail').attr('src',reader.result);
        };
    });
});