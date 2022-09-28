jQuery( window ).load(function() {
	elementor.hooks.addAction( 'panel/open_editor/section', function( panel, model, view ) {

		jQuery('input[data-setting="dsvy-extended-column"], input[data-setting="dsvy-strech-content-left"], input[data-setting="dsvy-strech-content-right"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[data-setting="dsvy-strech-content-left"]').on('change', function(){
			setTimeout(function(){
				jQuery('#elementor-preview-iframe')[0].contentWindow.dsvy_rearrange_stretched_col( model.id );
			}, 200);
		});

	});

	elementor.hooks.addAction( 'panel/open_editor/column', function( panel, model, view ) {
		setTimeout(function(){
			jQuery('.elementor-component-tab > a').on('click',function(){
				setTimeout(function(){
					jQuery('input[data-setting="dsvy-extended-column"], input[data-setting="dsvy-strech-content-left"], input[data-setting="dsvy-strech-content-right"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[type=radio]').on('change', function(){
						setTimeout(function(){
							jQuery('#elementor-preview-iframe')[0].contentWindow.dsvy_rearrange_stretched_col( model.id );
						}, 200);
					});
					jQuery('label[for="elementor-control-classic"]').on('click', function(){
						jQuery('#elementor-preview-iframe')[0].contentWindow.dsvy_rearrange_stretched_col( model.id );
					});
				}, 500);
			})
		 }, 500);
	});

	window.elementor.on("preview:loaded", testfunc() );
	function testfunc(){
		var section = window.elementor.$previewContents.find(".elementor-add-new-section");
		console.log('1');
		if( section ){
			console.log('2');
			section.append( '<div class="dsvy-add-block-btn">Add Template [ICON]</div>' );

		}
		console.log('3');
	}

	window.elementor.$previewContents.on("click.dsvy-add-block-btn", dsvy_initModal() );

	function dsvy_initModal() {
		console.log('clicked');
		elementor.dialogsManager.createWidget( 'dsvy-elementor-modal', {
			id: 'dsvy-elementor-introduction',
			closeButton: !1
		} );
	}

});