$(function(){
//start
    
    $('.content_box figcaption a').on('click', function(e){
        e.preventDefault();
        $('.content_box').addClass('on');
        $('.detail_box').addClass('on');
    })
    
    $('.detail_box figcaption a').eq(0).on('click', function(e){
        e.preventDefault();
        $('.content_box').removeClass('on');
        $('.detail_box').removeClass('on');
    })
    
    $('.pj_list li').on('click', function(){
        $(this).addClass('on')
        .siblings().removeClass('on');
    })

//end  
})