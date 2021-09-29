<?php 
$show_copyright=get_theme_mod('coming_soon_event_footer_copyright_display',true);
$copyright=get_theme_mod('coming_soon_event_copyright','Proudly powered by WordPress','');
?>
	<footer class="footer-section">
		<?php if($show_copyright){ ?>
			<div class="copyright-footer">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 text-lg-center align-self-center">
							<p><?php echo wp_kses_post($copyright); ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php }?>
	</footer>
	<!-- preloader
	================================================== -->
	<div id="preloader">
		<div id="loader">
			<div class="line-scale-pulse-out">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</div>
</div><!-- #page -->
<?php wp_footer(); ?>
    </body>
</html>