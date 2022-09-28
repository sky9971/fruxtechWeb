<div class="dsvy-fld-contents">
	<div class="dsvy-circle-outer"
		data-digit			= "<?php echo esc_html($digit); ?>"
		data-fill			= "<?php echo esc_html($global_color); ?>"		
		data-emptyfill		= "#5a666f"
		data-before			= "<?php echo esc_html($before_text); ?>"
		data-before-type	= "<?php echo esc_html($beforetextstyle); ?>"
		data-after			= "<?php echo esc_html($after_text); ?>"
		data-after-type		= "<?php echo esc_html($aftertextstyle); ?>"
		data-thickness		= "4" 
		data-width			= "85"
		>
		<div class="dsvy-circle">
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
				</span><span class="dsvy-fid-sub"><?php echo dsvy_esc_kses( $after_text ); ?></span>
			</h4>
		</div>			
		<div class="dsvy-circle-inner"> 
			<h3 class="dsvy-fid-title"><?php echo dsvy_esc_kses($title); ?></h3>
		</div>

	</div>
</div><!-- .dsvy-fld-contents -->