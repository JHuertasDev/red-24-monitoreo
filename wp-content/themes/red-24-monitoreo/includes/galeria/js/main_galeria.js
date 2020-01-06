$(document).ready(function(){
    var conf_slick = {
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: duracion,
        draggable:true,
        adaptiveHeight:true,
        pauseOnFocus: true, 
        pauseOnHover: false
    }
    $('.galeria-slick').slick(conf_slick);

    if(barra_de_tiempo){
        $('.galeria-slick').on('beforeChange',beforeChange);
    
        function beforeChange(event, slick, currentSlide, nextSlide){
          //Cuando cambia el slide cambio el numero que esta coloreado y además
          //muevo la barra de "carga"
          if(indicadores_numericos){
            $('.contenedor-numeros-carga h2').removeClass('item-activo');
            $('.contenedor-numeros-carga h2[data-numero="'+nextSlide+'"').addClass('item-activo');  
          }
          $('.indicador-carga').stop();
          $('.indicador-carga').css('width', 0);
          $('.indicador-carga').animate({width: '100%'},duracion+500);
        }
        
        //Iniciamos la animación de la barra de carga
        $('.indicador-carga').animate({width: '100%'},duracion);

    }
    if(indicadores_numericos){
        $('.contenedor-numeros-carga h2').click(function(){
            //Con esto cambio el item de la galeria
            index = $(this).index();
            $('.galeria-slick').slick('slickGoTo',index)
        });
    }
    
});