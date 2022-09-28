<div class="dsvy-fld-contents">
	<?php echo dsvy_esc_kses( $icon ); ?>
	<div class="dsvy-fld-wrap">
		<h4 class="dsvy-fid-inner">
			<?php echo dsvy_esc_kses( $before_text ); ?>
			<span
				class				  = "dsvy-number-rotate"
				data-appear-animation = "animateDigits"
				data-from             = "0"
				data-to               = "<?php echo esc_html( $digit ); ?>"
				data-interval         = "<?php echo esc_html( $interval ); ?>"
				data-before           = ""
				data-before-style     = ""
				data-after            = ""
				data-after-style      = ""
				>
					<?php echo esc_html( $digit ); ?>
			</span><span class="dsvy-fid"><?php echo dsvy_esc_kses( $after_text ); ?></span>
		</h4>
		<?php if( !empty($title) ) : ?>
		<div class="dsvy-fid-title"><span><?php echo dsvy_esc_kses($title); ?></span></div>
		<?php endif; ?>
	</div>
</div><!-- .dsvy-fld-contents -->
