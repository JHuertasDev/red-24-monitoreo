<?php
    get_header();
    $galeria = new Galeria(get_field('slide'),true,true,2500);
    $galeria->mostrar_galeria();
    get_footer();