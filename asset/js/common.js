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
    });
    
    $('#submit').on('click',function(e){
        e.preventDefault();
        contact();
    })
    
    function contact(){
        var $company = $('input[name=company]').val(),
            $name = $('input[name=name]').val(),
            $tel = $('input[name=tel]').val(),
            $email = $('input[name=email]').val(),
            $content = $('textarea[name=content]').val();
        
        if($name == ''){
            alert('이름을 입력해주세요');
            $('input[name=name]').focus();
            return;
        }
        
        if($tel == ''){
            alert('연락처를 입력해주세요');
            $('input[name=tel]').focus();
            return;
        }
        
        if($email == ''){
            alert('이메일을 입력해주세요');
            $('input[name=email]').focus();
            return;
        }
        
        document.getElementById("contact").reset();
        
        $.ajax({
            url:'data.php',
            type:'post',
            data :{
                mode:'insert',
                company:$company,
                name:$name,
                tel:$tel,
                email:$email,
                content:$content
            },
            success:function(data){
                console.log(data);
                alert(data);
                $('.contact_box').removeClass('on');
            }
        });
    }

//end  
})