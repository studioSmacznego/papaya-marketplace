	</div>
	<footer>
		<p class="text-center copyright"><?php echo get_field('copyright','options'); ?></p>
	</footer>
	<div class="contact-wrap">
		<?php echo do_shortcode('[contact-form-7 id="50" title="Talk to us"]'); ?>
		<div class="talk-success-message">
			<img class="talk-message-icon" src="<?php echo get_stylesheet_directory_uri() . '/img/img_thank_popup.png'; ?>">
			<h2 class="text-center">Thank you for contacting us!</h2>
			<p class="text-center">Our Papaya experts will get back to you shortly</p>
			<a href="#" class="btn-link btn-orange keep-btn">Keep browsing</a>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>