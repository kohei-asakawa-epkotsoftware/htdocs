$(function(){
    $('.drag').draggable({
      containment:'#drag-area',
      cursor:'move',
      opacity:0.6,
      scroll:true,
      zIndex:10,

        stop:function(event, ui){
            let myNum  = $(this).data('num');
            let myLeft = (ui.offset.left - $('#drag-area').offset().left);
            let myTop  = (ui.offset.top  - $('#drag-area').offset().top);

            $.ajax({
                type:'POST',
                url :'http://localhost:8001/',
                data: {
                id  :myNum,
                left:myLeft,
                top :myTop
                }
            }).done(function(){
                /*console.log('成功');*/
            }).fail(function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest.status);
                console.log(textStatus);
                console.log(errorThrown);
            });
                console.log("左: " + myLeft);
                console.log("上: " + myTop);
        }
    });
  });