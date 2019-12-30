<?php
global $cdfondo;
?>	<div id="pie" class="contenido">
		<div class="lineatr top <?php echo ($cdfondo&&$cdfondo=="crema"?"bor":"cre"); ?>"></div>
		<div class="contenido <?php echo ($cdfondo&&$cdfondo=="crema"?"cre":"bor"); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logopie<?php echo ($cdfondo&&$cdfondo=="crema"?"r":"b"); ?>.png" class="logo" />
			<p><b>Boulangerie Panader&iacute;a &amp; Confiter&iacute;a</b></p>
			<p>19 de Mayo 11 | Thompson 1096 | Estomba 1335</p>
			<p>Bahía Blanca | Buenos Aires | Argentina</p>
			<p>054-0291-4500937</p>
			<p><a href="mailto:hola@boulangeriepyc.com">hola@boulangeriepyc.com</a></p>
			<p class="diseno">
				<span class="off">dise&ntilde;o web <a href="https://montangiedg.com.ar/" target="_blank">montangiedg.com.ar</a></span>
				<span class="on">su nuevo sitio web <a href="https://montangiedg.com.ar/" target="_blank">aqu&iacute;!</a></span>
			</p>
			<?php /*<img src="<?php echo get_template_directory_uri(); ?>/img/dataf.png" class="dataf" /> */ ?>
		</div>
	</div>
	<?php wp_footer(); ?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-79840032-1', 'auto');
	ga('send', 'pageview');

	</script>
    </body>
</html>