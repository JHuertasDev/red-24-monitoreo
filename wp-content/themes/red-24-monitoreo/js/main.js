$(document).ready(function(){
    $('.img-cover').each(function(){
        imgCoverEffect($(this)[0], {
          alignX: "center",
          alignY: "middle"
        });
    });

    $(document).scroll(function () {
        var $nav = $("#menu-contenedor");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});
