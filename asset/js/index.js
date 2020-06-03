$(function () {
    //start
    
    var agent = navigator.userAgent.toLowerCase();

    if ( (navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1) ) {
        
        var text = "<div class='explore'><div>이 사이트는 크롬 브라우저에 최적화되어있습니다.</div><div>크롬 브라우저로 실행하거나<a href='https://www.google.com/intl/ko/chrome/'>여기</a>에서 브라우저를 다운 받아주세요.</div></div>"
        $('.wrap').hide();
        $('body').html(text);

    }
    
    var typingBool = false;
    var typingIdx = 0;
    var typingTxt = $('.content_box span').eq(0).text(); // 타이핑될 텍스트를 가져온다 
    typingTxt = typingTxt.split(""); // 한글자씩 자른다. 
    if (typingBool == false) { // 타이핑이 진행되지 않았다면 
        typingBool = true;
        var tyInt = setInterval(typing, 100); // 반복동작 
    }
    
    setTimeout(function(){
        $('.content_box a').fadeIn();
    },3000)

    function typing() {
        if (typingIdx < typingTxt.length) { // 타이핑될 텍스트 길이만큼 반복 
            $(".content_box span").eq(1).append(typingTxt[typingIdx]); // 한글자씩 이어준다. 
            typingIdx++;
        }
        else {
            clearInterval(tyInt); //끝나면 반복종료 
        }
    }
    //end  
})