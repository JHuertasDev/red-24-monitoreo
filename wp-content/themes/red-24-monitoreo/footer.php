

    <div class="container-fluid pie text-center">
        <div class="row">
            <div class="col">
                <div class="cont-logo-pie">
                    <?php 
                        the_custom_logo();
                    ?>
                </div>
            </div>
        </div>
        <div class="row datos-pie">
            <div class="col">
                <p><b><?php echo get_field('direccion','options');?></b> | <?php echo get_field('ciudad','option'); ?></p>
              
                <p><?php echo get_field('provincia_y_pais','options');?></p>
              
                <p> <a href="tel:54<?php echo str_replace(' ', '', get_field('telefono','options')); ?>" > Tel:<b> <?php echo get_field('telefono','options'); ?></b></a></p>
              
                <p> <a href="mailto:<?php echo get_field('mail','options')?>"><b><?php echo get_field('mail','options')?></b></a></p>
                
                <p id="developedby"> <a href="mailto:jhdeveloper@gmail.com">Sitio desarrollado por<b> J.L Huertas <b></a></p>

            </div>
        </div>
    </div>
	<?php wp_footer(); ?>
    </body>
</html>