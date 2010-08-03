var active = true;
$(document).ready(function(){
    $("#cycle").cycle({
        fx:'scrollHorz',
        random:1,
        delay:5000,
        pauseOnPagerHover:true,
        randomizeEffects:true,
        timeout:5000,
        pause:1,
        pager:'.otrosmodelos ul',
        pagerClick : function(zeroBasedSlideIndex, slideElement){
            
        },
        updateActivePagerLink : function(pager, currSlideIndex){
            if(active){
                $("#cycle .oferta .otrosmodelos li a").removeClass('activeSlide') ;
                $("#cycle .oferta:visible .otrosmodelos li:eq(" + currSlideIndex+") a").addClass("activeSlide");
            }
        },
        pagerAnchorBuilder : function(index, DOMelement){
            return '<li><a>' + index + ".- "+$(DOMelement).find("h1").text() + '</a></li>';
        }
    });

    $("#cycle .oferta .imagenes a:has(img)").click(function(){
        //console.info("click");
        foto = $(this).find("img");
        target = $("#cycle .oferta:visible p img");
        target.fadeOut(function(){
            target.attr("src", foto.attr("src"));
        });
        target.fadeIn();
        return false;
    });

    $("#cycle .oferta").hover(function(){// hover
        active = false;
//        console.info('hover')
    }, function(){// blur
        active = true;
//        console.info('resumed');
    });
});