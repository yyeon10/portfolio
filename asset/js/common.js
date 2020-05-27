$(function(){
//start
    
    if(localStorage.page != '0'){
        $('.menu_box').hide();
    }

    setTimeout(function(){
        $('.menu_box').removeClass('on');
        $('.menu_box').show();
        localStorage.page = 1;
    },200)

    $('.menu_btn').on('click', function(){
        $('.menu_box').toggleClass('on');
    });
    
    $('header .close_box').on('click', function(){
        $('.menu_box').toggleClass('on');
    });
    
    var color = $('.wrap').data('color');
    console.log(color);
    $('.contact_box li').eq(3).find('input').css('background',color);
    
    $('.menu_box nav a').eq(2).on('click', function(e){
        e.preventDefault();
        $('.menu_box').toggleClass('on');
        setTimeout(function(){
            $('.contact_box').toggleClass('on');
        },500)
    })
    
    $('.contact_box .close_box').on('click', function(){
        $('.contact_box').toggleClass('on');
    });
    
    $('.menu_box nav a').not(":last").on('click', function(e){
        e.preventDefault();
        var $this = $(this);
        localStorage.page = 0;
        setTimeout(function(){
            location.href = $this.attr('href');
        },10);
    })

//end  
})