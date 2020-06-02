$(function(){
//start
    
    var idx = $('.pj_list li').length;

    $('.pj_list li').on('click', function(e){
        e.preventDefault();
        $(this).addClass('on')
        .siblings().removeClass('on');
        var num = $(this).data('num');
        $('.content_box figure').removeClass('on');
        setTimeout(function(){
            workData(num);
        },700)
    });

    
    function workData(page){
        $.ajax({
            url:'data.php',
            type:'post',
            data :{num:page},
            success:function(data){
                $('.content_box figure').remove();
                $('.content_box').append($(data)[0]);
                $('.detail_box').html($(data)[1]);
                setTimeout(function(){
                    $('.content_box figure').addClass('on');
                },100)
                

                 $('.content_box figcaption a').on('click', function(e){
                    e.preventDefault();
                    $('.content_box').addClass('on');
                    $('.detail_box').addClass('on');
                })
                
                $('.content_box figure').on('click', function(e){
                    e.preventDefault();
                    $('.content_box').addClass('on');
                    $('.detail_box').addClass('on');
                })
                
                 $('.detail_box figcaption a').eq(0).on('click', function(e){
                    e.preventDefault();
                    $('.content_box').removeClass('on');
                    $('.detail_box').removeClass('on');
                })
            }
        });
    }
    
    workData(idx);
    $('.pj_list li').eq(0).addClass('on');
    setTimeout(function(){
        $('.content_box figure').addClass('on');
    },100)

//end  
})