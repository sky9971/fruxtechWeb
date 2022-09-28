jQuery( window ).on( 'elementor/frontend/init', function() {
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_blog_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_portfolio_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_service_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_team_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_testimonial_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_client_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_staticbox_element.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_multiple_icon_heading.default', function($scope, $){ dsvy_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dsvy_fid_element.default', function($scope, $){ dsvy_circle_progressbar(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope, $ ) {
		setTimeout(function(){
			dsvy_rearrange_stretched_col( $scope.data('id') );			
			dsvy_bgimage_class();
			dsvy_bgcolor_class();
		}, 200);
	} );
} );

