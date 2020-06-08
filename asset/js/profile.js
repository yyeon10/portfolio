$(function () {
    //start
    var num;
    var direction = 0;
    var bln = true;
    /*$('.graph li').each(function(j){
        num = parseInt($(this).find('span').eq(1).data('num'));
        skill(num,j);
    })*/
    $(window).on('mousewheel DOMMouseScroll', function (e) {
        mousewheel(e);
        transform();
    });

    $('.profile_box > li').eq(0).on('click', function(){
        $('.profile_box').addClass('on');
        $('.content_box').addClass('on');
            if (bln) {
                skill();
                bln = false;
            }
    });
    
    $('.profile_box > li').eq(1).on('click', function(){
        $('.profile_box').removeClass('on');
        $('.content_box').removeClass('on');
    });
    
    transform();
    
    function transform(){
        var liHeight = $('.profile_box > li').innerHeight();
        var liZ = liHeight/2;
        var trans1 = 'rotateX(0deg) translateY(0) translateZ('+liZ+'px)';
        var trans2 = 'rotateX(-90deg) translateY(0) translateZ('+liZ+'px)';

        $('.profile_box > li').eq(0).css({
            transform: trans1
        })
        $('.profile_box > li').eq(1).css({
            transform: trans2
        })
    }
    

    function mousewheel(e) {
        if (e.originalEvent.detail === 0) { // 표준브라우저
            direction = e.originalEvent.wheelDelta / -120;
        }
        else { // 파폭
            direction = e.originalEvent.detail / 3;
        }
        console.log(direction);
        if (direction < 0) {
            $('.profile_box').removeClass('on');
            $('.content_box').removeClass('on');
        }
        else {
            $('.profile_box').addClass('on');
            $('.content_box').addClass('on');
            if (bln) {
                skill();
                bln = false;
            }
        }
    }

    function skill() {
        // Instead of appending the elements directly to the document when they are created, append them to the DocumentFragment instead, and finish by adding that to the DOM.
        
        var total = 158, // stroke length
            el = null
            , c1 = null
            , c2 = null
            , pie = document.querySelectorAll('.c-pie')
            , i = 0
            , fragment = document.createDocumentFragment()
            , good = ["#7d96c1", "#dde3ed"]
            , blank = ["#dfa0a0", "#f7e7e7"];
        var numberPercent = function (num) {
            var result = ((num * total) / 100);
            return result;
        }
        var colourPercent = function (num) {
            if (num > 50) {
                return good;
            }
            else {
                return blank;
            }
        }
        Array.prototype.forEach.call(pie, function (pie, i) {
            var number = pie.getAttribute('data-percent');
            var fixedNumber = numberPercent(number);
            var result = fixedNumber + ' ' + total;
            el = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            el.setAttribute('viewBox', '0 0 100 100');
            el.setAttribute('class', 'c-pie__c');
            el.style.background = colourPercent(number)[1];
            // Create colour circle
            c1 = document.createElementNS("http://www.w3.org/2000/svg", 'circle');
            c1.setAttribute('r', '25');
            c1.setAttribute('cx', '50');
            c1.setAttribute('cy', '50');
            c1.setAttribute('class', 'c-pie__s');
            c1.style.strokeDasharray = result;
            c1.style.stroke = colourPercent(number)[0];
            // Create inner circle
            c2 = document.createElementNS("http://www.w3.org/2000/svg", 'circle');
            c2.setAttribute('r', '42');
            c2.setAttribute('cx', '50');
            c2.setAttribute('cy', '50');
            c2.setAttribute('class', 'c-pie__i');
            // Build SVG
            el.appendChild(c1);
            el.appendChild(c2);
            fragment.appendChild(el);
            pie.appendChild(fragment);
        });
    }
    //end  
})