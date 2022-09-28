<?php

/**
 * Add Elementor editor support in custom CPT
 */
add_action( 'elementor/controls/controls_registered', 'dsvy_elementor_init_controls');
function dsvy_elementor_init_controls() {
	// Include Control files
	require( get_template_directory() . '/includes/elementor/controls/control-dsvy-imgselect.php' );
	// Register control
	\Elementor\Plugin::$instance->controls_manager->register_control( 'dsvy_imgselect', new DSVY_imgselect() );

}

/**
 * Add Elementor editor support in custom CPT
 */
if( !function_exists('dsvy_elementor_add_cpt_support') ){
function dsvy_elementor_add_cpt_support() {

    $cpt_list = get_option( 'elementor_cpt_support' );

    if( empty($cpt_list) ) {
        $cpt_list = array( 'page', 'post', 'dsvy-portfolio', 'dsvy-service', 'dsvy-team-member', 'dsvy-testimonial' );
		update_option( 'elementor_cpt_support', $cpt_list );

    } else if( !in_array( array( 'dsvy-portfolio', 'dsvy-service', 'dsvy-team-member', 'dsvy-testimonial' ), $cpt_list ) ) {
        $cpt_list[] = 'dsvy-portfolio';
        $cpt_list[] = 'dsvy-service';
        $cpt_list[] = 'dsvy-team-member';
        $cpt_list[] = 'dsvy-testimonial';
		update_option( 'elementor_cpt_support', $cpt_list );

    }
}
}
add_action( 'after_switch_theme', 'dsvy_elementor_add_cpt_support' );

/**
 * Add group in Elementor editor
 */
if( !function_exists('dsvy_elementor_add_group') ){
function dsvy_elementor_add_group() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'lyfpro_category',
		[
			'title' => esc_attr__( 'Lyfpro Special Elements', 'lyfpro' ),
			'icon' => 'fa fa-plug',
		],
		1 // tab position
	);
}
}
add_action( 'elementor/init', 'dsvy_elementor_add_group' );

/**
 * Adding custom icon to icon control in Elementor
 */
if( !function_exists('dsvy_elementor_add_custom_icons_tab') ){
function dsvy_elementor_add_custom_icons_tab( $icons_tabs = array() ) {

	// Business Special icons
	$dsvy_lyfpro_icons_array = array(
		'business',
		'incubator',
		'startup',
		'development',
		'teamwork',
		'network',
		'program',
		'client',
		'company',
		'service',
		'model',
		'successful',
		'growth',
		'businessman',
		'crowdfunding',
		'executive',
		'coaching',
		'leadership',
		'coaching-1',
		'mentor',
		'coaching-2',
		'coach',
		'experience',
		'award',
		'trophy',
		'award-1',
		'secure-payment',
		'medal',
		'technical-support',
		'support',
		'customer-service',
		'email',
		'email-1',
		'pin',
		'call',
		'pdf',
		'doc',
		'coach-1',
		'coaching-3',
		'online-course',
		'consulting',
		'consulting-1',
		'instructor',
		'business-professional',
		'coaching-4',
		'mentor-1',
		'presentation',
		'supporter',
		'accounting',
		'presentation-1',
		'consulting-2',
		'opportunity',
		'online-business',
		'advisor',
		'right-arrow',
		'check'
	);
	$icons_tabs['dsvy-lyfpro-icon'] = array(
		'name'          => 'dsvy-lyfpro-icon',
		'label'         => esc_html__( 'Lyfpro Special Icons', 'lyfpro' ),
		'labelIcon'     => 'fas fa-user',
		'prefix'        => 'dsvy-lyfpro-icon-',
		'displayPrefix' => 'dsvy-lyfpro-icon',
		'url'           => get_template_directory_uri() . '/libraries/dsvy-lyfpro-icon/flaticon.css',
		'icons'         => $dsvy_lyfpro_icons_array,
		'ver'           => '1.0.0',
	);

	// Material Icons
	$material_icons_array = array(
		'3d-rotation',
		'ac-unit',
		'access-alarm',
		'access-alarms',
		'access-time',
		'accessibility',
		'accessible',
		'account-balance',
		'account-balance-wallet',
		'account-box',
		'account-circle',
		'adb',
		'add',
		'add-a-photo',
		'add-alarm',
		'add-alert',
		'add-box',
		'add-circle',
		'add-circle-outline',
		'add-location',
		'add-shopping-cart',
		'add-to-photos',
		'add-to-queue',
		'adjust',
		'airline-seat-flat',
		'airline-seat-flat-angled',
		'airline-seat-individual-suite',
		'airline-seat-legroom-extra',
		'airline-seat-legroom-normal',
		'airline-seat-legroom-reduced',
		'airline-seat-recline-extra',
		'airline-seat-recline-normal',
		'airplanemode-active',
		'airplanemode-inactive',
		'airplay',
		'airport-shuttle',
		'alarm',
		'alarm-add',
		'alarm-off',
		'alarm-on',
		'album',
		'all-inclusive',
		'all-out',
		'android',
		'announcement',
		'apps',
		'archive',
		'arrow-back',
		'arrow-downward',
		'arrow-drop-down',
		'arrow-drop-down-circle',
		'arrow-drop-up',
		'arrow-forward',
		'arrow-upward',
		'art-track',
		'aspect-ratio',
		'assessment',
		'assignment',
		'assignment-ind',
		'assignment-late',
		'assignment-return',
		'assignment-returned',
		'assignment-turned-in',
		'assistant',
		'assistant-photo',
		'attach-file',
		'attach-money',
		'attachment',
		'audiotrack',
		'autorenew',
		'av-timer',
		'backspace',
		'backup',
		'battery-alert',
		'battery-charging-full',
		'battery-full',
		'battery-std',
		'battery-unknown',
		'beach-access',
		'beenhere',
		'block',
		'bluetooth',
		'bluetooth-audio',
		'bluetooth-connected',
		'bluetooth-disabled',
		'bluetooth-searching',
		'blur-circular',
		'blur-linear',
		'blur-off',
		'blur-on',
		'book',
		'bookmark',
		'bookmark-border',
		'border-all',
		'border-bottom',
		'border-clear',
		'border-color',
		'border-horizontal',
		'border-inner',
		'border-left',
		'border-outer',
		'border-right',
		'border-style',
		'border-top',
		'border-vertical',
		'branding-watermark',
		'brightness-1',
		'brightness-2',
		'brightness-3',
		'brightness-4',
		'brightness-5',
		'brightness-6',
		'brightness-7',
		'brightness-auto',
		'brightness-high',
		'brightness-low',
		'brightness-medium',
		'broken-image',
		'brush',
		'bubble-chart',
		'bug-report',
		'build',
		'burst-mode',
		'business',
		'business-center',
		'cached',
		'cake',
		'call',
		'call-end',
		'call-made',
		'call-merge',
		'call-missed',
		'call-missed-outgoing',
		'call-received',
		'call-split',
		'call-to-action',
		'camera',
		'camera-alt',
		'camera-enhance',
		'camera-front',
		'camera-rear',
		'camera-roll',
		'cancel',
		'card-giftcard',
		'card-membership',
		'card-travel',
		'casino',
		'cast',
		'cast-connected',
		'center-focus-strong',
		'center-focus-weak',
		'change-history',
		'chat',
		'chat-bubble',
		'chat-bubble-outline',
		'check',
		'check-box',
		'check-box-outline-blank',
		'check-circle',
		'chevron-left',
		'chevron-right',
		'child-care',
		'child-friendly',
		'chrome-reader-mode',
		'class',
		'clear',
		'clear-all',
		'close',
		'closed-caption',
		'cloud',
		'cloud-circle',
		'cloud-done',
		'cloud-download',
		'cloud-off',
		'cloud-queue',
		'cloud-upload',
		'code',
		'collections',
		'collections-bookmark',
		'color-lens',
		'colorize',
		'comment',
		'compare',
		'compare-arrows',
		'computer',
		'confirmation-number',
		'contact-mail',
		'contact-phone',
		'contacts',
		'content-copy',
		'content-cut',
		'content-paste',
		'control-point',
		'control-point-duplicate',
		'copyright',
		'create',
		'create-new-folder',
		'credit-card',
		'crop',
		'crop-16-9',
		'crop-3-2',
		'crop-5-4',
		'crop-7-5',
		'crop-din',
		'crop-free',
		'crop-landscape',
		'crop-original',
		'crop-portrait',
		'crop-rotate',
		'crop-square',
		'dashboard',
		'data-usage',
		'date-range',
		'dehaze',
		'delete',
		'delete-forever',
		'delete-sweep',
		'description',
		'desktop-mac',
		'desktop-windows',
		'details',
		'developer-board',
		'developer-mode',
		'device-hub',
		'devices',
		'devices-other',
		'dialer-sip',
		'dialpad',
		'directions',
		'directions-bike',
		'directions-boat',
		'directions-bus',
		'directions-car',
		'directions-railway',
		'directions-run',
		'directions-subway',
		'directions-transit',
		'directions-walk',
		'disc-full',
		'dns',
		'do-not-disturb',
		'do-not-disturb-alt',
		'do-not-disturb-off',
		'do-not-disturb-on',
		'dock',
		'domain',
		'done',
		'done-all',
		'donut-large',
		'donut-small',
		'drafts',
		'drag-handle',
		'drive-eta',
		'dvr',
		'edit',
		'edit-location',
		'eject',
		'email',
		'enhanced-encryption',
		'equalizer',
		'error',
		'error-outline',
		'euro-symbol',
		'ev-station',
		'event',
		'event-available',
		'event-busy',
		'event-note',
		'event-seat',
		'exit-to-app',
		'expand-less',
		'expand-more',
		'explicit',
		'explore',
		'exposure',
		'exposure-neg-1',
		'exposure-neg-2',
		'exposure-plus-1',
		'exposure-plus-2',
		'exposure-zero',
		'extension',
		'face',
		'fast-forward',
		'fast-rewind',
		'favorite',
		'favorite-border',
		'featured-play-list',
		'featured-video',
		'feedback',
		'fiber-dvr',
		'fiber-manual-record',
		'fiber-new',
		'fiber-pin',
		'fiber-smart-record',
		'file-download',
		'file-upload',
		'filter',
		'filter-1',
		'filter-2',
		'filter-3',
		'filter-4',
		'filter-5',
		'filter-6',
		'filter-7',
		'filter-8',
		'filter-9',
		'filter-9-plus',
		'filter-b-and-w',
		'filter-center-focus',
		'filter-drama',
		'filter-frames',
		'filter-hdr',
		'filter-list',
		'filter-none',
		'filter-tilt-shift',
		'filter-vintage',
		'find-in-page',
		'find-replace',
		'fingerprint',
		'first-page',
		'fitness-center',
		'flag',
		'flare',
		'flash-auto',
		'flash-off',
		'flash-on',
		'flight',
		'flight-land',
		'flight-takeoff',
		'flip',
		'flip-to-back',
		'flip-to-front',
		'folder',
		'folder-open',
		'folder-shared',
		'folder-special',
		'font-download',
		'format-align-center',
		'format-align-justify',
		'format-align-left',
		'format-align-right',
		'format-bold',
		'format-clear',
		'format-color-fill',
		'format-color-reset',
		'format-color-text',
		'format-indent-decrease',
		'format-indent-increase',
		'format-italic',
		'format-line-spacing',
		'format-list-bulleted',
		'format-list-numbered',
		'format-paint',
		'format-quote',
		'format-shapes',
		'format-size',
		'format-strikethrough',
		'format-textdirection-l-to-r',
		'format-textdirection-r-to-l',
		'format-underlined',
		'forum',
		'forward',
		'forward-10',
		'forward-30',
		'forward-5',
		'free-breakfast',
		'fullscreen',
		'fullscreen-exit',
		'functions',
		'g-translate',
		'gamepad',
		'games',
		'gavel',
		'gesture',
		'get-app',
		'gif',
		'golf-course',
		'gps-fixed',
		'gps-not-fixed',
		'gps-off',
		'grade',
		'gradient',
		'grain',
		'graphic-eq',
		'grid-off',
		'grid-on',
		'group',
		'group-add',
		'group-work',
		'hd',
		'hdr-off',
		'hdr-on',
		'hdr-strong',
		'hdr-weak',
		'headset',
		'headset-mic',
		'healing',
		'hearing',
		'help',
		'help-outline',
		'high-quality',
		'highlight',
		'highlight-off',
		'history',
		'home',
		'hot-tub',
		'hotel',
		'hourglass-empty',
		'hourglass-full',
		'http',
		'https',
		'image',
		'image-aspect-ratio',
		'import-contacts',
		'import-export',
		'important-devices',
		'inbox',
		'indeterminate-check-box',
		'info',
		'info-outline',
		'input',
		'insert-chart',
		'insert-comment',
		'insert-drive-file',
		'insert-emoticon',
		'insert-invitation',
		'insert-link',
		'insert-photo',
		'invert-colors',
		'invert-colors-off',
		'iso',
		'keyboard',
		'keyboard-arrow-down',
		'keyboard-arrow-left',
		'keyboard-arrow-right',
		'keyboard-arrow-up',
		'keyboard-backspace',
		'keyboard-capslock',
		'keyboard-hide',
		'keyboard-return',
		'keyboard-tab',
		'keyboard-voice',
		'kitchen',
		'label',
		'label-outline',
		'landscape',
		'language',
		'laptop',
		'laptop-chromebook',
		'laptop-mac',
		'laptop-windows',
		'last-page',
		'launch',
		'layers',
		'layers-clear',
		'leak-add',
		'leak-remove',
		'lens',
		'library-add',
		'library-books',
		'library-music',
		'lightbulb-outline',
		'line-style',
		'line-weight',
		'linear-scale',
		'link',
		'linked-camera',
		'list',
		'live-help',
		'live-tv',
		'local-activity',
		'local-airport',
		'local-atm',
		'local-bar',
		'local-cafe',
		'local-car-wash',
		'local-convenience-store',
		'local-dining',
		'local-drink',
		'local-florist',
		'local-gas-station',
		'local-grocery-store',
		'local-hospital',
		'local-hotel',
		'local-laundry-service',
		'local-library',
		'local-mall',
		'local-movies',
		'local-offer',
		'local-parking',
		'local-pharmacy',
		'local-phone',
		'local-pizza',
		'local-play',
		'local-post-office',
		'local-printshop',
		'local-see',
		'local-shipping',
		'local-taxi',
		'location-city',
		'location-disabled',
		'location-off',
		'location-on',
		'location-searching',
		'lock',
		'lock-open',
		'lock-outline',
		'looks',
		'looks-3',
		'looks-4',
		'looks-5',
		'looks-6',
		'looks-one',
		'looks-two',
		'loop',
		'loupe',
		'low-priority',
		'loyalty',
		'mail',
		'mail-outline',
		'map',
		'markunread',
		'markunread-mailbox',
		'memory',
		'menu',
		'merge-type',
		'message',
		'mic',
		'mic-none',
		'mic-off',
		'mms',
		'mode-comment',
		'mode-edit',
		'monetization-on',
		'money-off',
		'monochrome-photos',
		'mood',
		'mood-bad',
		'more',
		'more-horiz',
		'more-vert',
		'motorcycle',
		'mouse',
		'move-to-inbox',
		'movie',
		'movie-creation',
		'movie-filter',
		'multiline-chart',
		'music-note',
		'music-video',
		'my-location',
		'nature',
		'nature-people',
		'navigate-before',
		'navigate-next',
		'navigation',
		'near-me',
		'network-cell',
		'network-check',
		'network-locked',
		'network-wifi',
		'new-releases',
		'next-week',
		'nfc',
		'no-encryption',
		'no-sim',
		'not-interested',
		'note',
		'note-add',
		'notifications',
		'notifications-active',
		'notifications-none',
		'notifications-off',
		'notifications-paused',
		'offline-pin',
		'ondemand-video',
		'opacity',
		'open-in-browser',
		'open-in-new',
		'open-with',
		'pages',
		'pageview',
		'palette',
		'pan-tool',
		'panorama',
		'panorama-fish-eye',
		'panorama-horizontal',
		'panorama-vertical',
		'panorama-wide-angle',
		'party-mode',
		'pause',
		'pause-circle-filled',
		'pause-circle-outline',
		'payment',
		'people',
		'people-outline',
		'perm-camera-mic',
		'perm-contact-calendar',
		'perm-data-setting',
		'perm-device-information',
		'perm-identity',
		'perm-media',
		'perm-phone-msg',
		'perm-scan-wifi',
		'person',
		'person-add',
		'person-outline',
		'person-pin',
		'person-pin-circle',
		'personal-video',
		'pets',
		'phone',
		'phone-android',
		'phone-bluetooth-speaker',
		'phone-forwarded',
		'phone-in-talk',
		'phone-iphone',
		'phone-locked',
		'phone-missed',
		'phone-paused',
		'phonelink',
		'phonelink-erase',
		'phonelink-lock',
		'phonelink-off',
		'phonelink-ring',
		'phonelink-setup',
		'photo',
		'photo-album',
		'photo-camera',
		'photo-filter',
		'photo-library',
		'photo-size-select-actual',
		'photo-size-select-large',
		'photo-size-select-small',
		'picture-as-pdf',
		'picture-in-picture',
		'picture-in-picture-alt',
		'pie-chart',
		'pie-chart-outlined',
		'pin-drop',
		'place',
		'play-arrow',
		'play-circle-filled',
		'play-circle-outline',
		'play-for-work',
		'playlist-add',
		'playlist-add-check',
		'playlist-play',
		'plus-one',
		'poll',
		'polymer',
		'pool',
		'portable-wifi-off',
		'portrait',
		'power',
		'power-input',
		'power-settings-new',
		'pregnant-woman',
		'present-to-all',
		'print',
		'priority-high',
		'public',
		'publish',
		'query-builder',
		'question-answer',
		'queue',
		'queue-music',
		'queue-play-next',
		'radio',
		'radio-button-checked',
		'radio-button-unchecked',
		'rate-review',
		'receipt',
		'recent-actors',
		'record-voice-over',
		'redeem',
		'redo',
		'refresh',
		'remove',
		'remove-circle',
		'remove-circle-outline',
		'remove-from-queue',
		'remove-red-eye',
		'remove-shopping-cart',
		'reorder',
		'repeat',
		'repeat-one',
		'replay',
		'replay-10',
		'replay-30',
		'replay-5',
		'reply',
		'reply-all',
		'report',
		'report-problem',
		'restaurant',
		'restaurant-menu',
		'restore',
		'restore-page',
		'ring-volume',
		'room',
		'room-service',
		'rotate-90-degrees-ccw',
		'rotate-left',
		'rotate-right',
		'rounded-corner',
		'router',
		'rowing',
		'rss-feed',
		'rv-hookup',
		'satellite',
		'save',
		'scanner',
		'schedule',
		'school',
		'screen-lock-landscape',
		'screen-lock-portrait',
		'screen-lock-rotation',
		'screen-rotation',
		'screen-share',
		'sd-card',
		'sd-storage',
		'search',
		'security',
		'select-all',
		'send',
		'sentiment-dissatisfied',
		'sentiment-neutral',
		'sentiment-satisfied',
		'sentiment-very-dissatisfied',
		'sentiment-very-satisfied',
		'settings',
		'settings-applications',
		'settings-backup-restore',
		'settings-bluetooth',
		'settings-brightness',
		'settings-cell',
		'settings-ethernet',
		'settings-input-antenna',
		'settings-input-component',
		'settings-input-composite',
		'settings-input-hdmi',
		'settings-input-svideo',
		'settings-overscan',
		'settings-phone',
		'settings-power',
		'settings-remote',
		'settings-system-daydream',
		'settings-voice',
		'share',
		'shop',
		'shop-two',
		'shopping-basket',
		'shopping-cart',
		'short-text',
		'show-chart',
		'shuffle',
		'signal-cellular-4-bar',
		'signal-cellular-connected-no-internet-4-bar',
		'signal-cellular-no-sim',
		'signal-cellular-null',
		'signal-cellular-off',
		'signal-wifi-4-bar',
		'signal-wifi-4-bar-lock',
		'signal-wifi-off',
		'sim-card',
		'sim-card-alert',
		'skip-next',
		'skip-previous',
		'slideshow',
		'slow-motion-video',
		'smartphone',
		'smoke-free',
		'smoking-rooms',
		'sms',
		'sms-failed',
		'snooze',
		'sort',
		'sort-by-alpha',
		'spa',
		'space-bar',
		'speaker',
		'speaker-group',
		'speaker-notes',
		'speaker-notes-off',
		'speaker-phone',
		'spellcheck',
		'star',
		'star-border',
		'star-half',
		'stars',
		'stay-current-landscape',
		'stay-current-portrait',
		'stay-primary-landscape',
		'stay-primary-portrait',
		'stop',
		'stop-screen-share',
		'storage',
		'store',
		'store-mall-directory',
		'straighten',
		'streetview',
		'strikethrough-s',
		'style',
		'subdirectory-arrow-left',
		'subdirectory-arrow-right',
		'subject',
		'subscriptions',
		'subtitles',
		'subway',
		'supervisor-account',
		'surround-sound',
		'swap-calls',
		'swap-horiz',
		'swap-vert',
		'swap-vertical-circle',
		'switch-camera',
		'switch-video',
		'sync',
		'sync-disabled',
		'sync-problem',
		'system-update',
		'system-update-alt',
		'tab',
		'tab-unselected',
		'tablet',
		'tablet-android',
		'tablet-mac',
		'tag-faces',
		'tap-and-play',
		'terrain',
		'text-fields',
		'text-format',
		'textsms',
		'texture',
		'theaters',
		'thumb-down',
		'thumb-up',
		'thumbs-up-down',
		'time-to-leave',
		'timelapse',
		'timeline',
		'timer',
		'timer-10',
		'timer-3',
		'timer-off',
		'title',
		'toc',
		'today',
		'toll',
		'tonality',
		'touch-app',
		'toys',
		'track-changes',
		'traffic',
		'train',
		'tram',
		'transfer-within-a-station',
		'transform',
		'translate',
		'trending-down',
		'trending-flat',
		'trending-up',
		'tune',
		'turned-in',
		'turned-in-not',
		'tv',
		'unarchive',
		'undo',
		'unfold-less',
		'unfold-more',
		'update',
		'usb',
		'verified-user',
		'vertical-align-bottom',
		'vertical-align-center',
		'vertical-align-top',
		'vibration',
		'video-call',
		'video-label',
		'video-library',
		'videocam',
		'videocam-off',
		'videogame-asset',
		'view-agenda',
		'view-array',
		'view-carousel',
		'view-column',
		'view-comfy',
		'view-compact',
		'view-day',
		'view-headline',
		'view-list',
		'view-module',
		'view-quilt',
		'view-stream',
		'view-week',
		'vignette',
		'visibility',
		'visibility-off',
		'voice-chat',
		'voicemail',
		'volume-down',
		'volume-mute',
		'volume-off',
		'volume-up',
		'vpn-key',
		'vpn-lock',
		'wallpaper',
		'warning',
		'watch',
		'watch-later',
		'wb-auto',
		'wb-cloudy',
		'wb-incandescent',
		'wb-iridescent',
		'wb-sunny',
		'wc',
		'web',
		'web-asset',
		'weekend',
		'whatshot',
		'widgets',
		'wifi',
		'wifi-lock',
		'wifi-tethering',
		'work',
		'wrap-text',
		'youtube-searched-for',
		'zoom-in',
		'zoom-out',
		'zoom-out-map',
	);
	$icons_tabs['material-icons'] = array(
		'name'          => 'material-icons',
		'label'         => esc_html__( 'Material Icons', 'lyfpro' ),
		'labelIcon'     => 'mdi mdi-group',
		'prefix'        => 'mdi-',
		'displayPrefix' => 'mdi',
		'url'           => get_template_directory_uri() . '/libraries/material-icons/css/material-icons.min.css',
		'icons'         => $material_icons_array,
		'ver'           => '1.0.0',
	);

	// sgicon
	$sgicon_array = array(
		'',
		'WorldWide',
		'WorldGlobe',
		'Underpants',
		'Tshirt',
		'Trousers',
		'Tie',
		'TennisBall',
		'Telesocpe',
		'Stop',
		'Starship',
		'Starship2',
		'Speaker',
		'Speaker2',
		'Soccer',
		'Snikers',
		'Scisors',
		'Puzzle',
		'Printer',
		'Pool',
		'Podium',
		'Play',
		'Planet',
		'Pause',
		'Next',
		'MusicNote2',
		'MusicNote',
		'MusicMixer',
		'Microphone',
		'Medal',
		'ManFigure',
		'Magnet',
		'Like',
		'Hanger',
		'Handicap',
		'Forward',
		'Footbal',
		'Flag',
		'FemaleFigure',
		'Dislike',
		'DiamondRing',
		'Cup',
		'Crown',
		'Column',
		'Click',
		'Cassette',
		'Bomb',
		'BatteryLow',
		'BatteryFull',
		'Bascketball',
		'Astronaut',
		'WineGlass',
		'Water',
		'Wallet',
		'Umbrella',
		'TV',
		'TeaMug',
		'Tablet',
		'Soda',
		'SodaCan',
		'SimCard',
		'Signal',
		'Shaker',
		'Radio',
		'Pizza',
		'Phone',
		'Notebook',
		'Mug',
		'Mastercard',
		'Ipod',
		'Info',
		'Icecream2',
		'Icecream1',
		'Hourglass',
		'Help',
		'Goto',
		'Glasses',
		'Gameboy',
		'ForkandKnife',
		'Export',
		'Exit',
		'Espresso',
		'Drop',
		'Download',
		'Dollars',
		'Dollar',
		'DesktopMonitor',
		'Corkscrew',
		'CoffeeToGo',
		'Chart',
		'ChartUp',
		'ChartDown',
		'Calculator',
		'Bread',
		'Bourbon',
		'BottleofWIne',
		'Bag',
		'Arrow',
		'Antenna2',
		'Antenna1',
		'Anchor',
		'Wheelbarrow',
		'Webcam',
		'Unlinked',
		'Truck',
		'Timer',
		'Time',
		'StorageBox',
		'Star',
		'ShoppingCart',
		'Shield',
		'Seringe',
		'Pulse',
		'Plaster',
		'Plaine',
		'Pill',
		'PicnicBasket',
		'Phone2',
		'Pencil',
		'Pen',
		'PaperClip',
		'On-Off',
		'Mouse',
		'Megaphone',
		'Linked',
		'Keyboard',
		'House',
		'Heart',
		'Headset',
		'FullShoppingCart',
		'FullScreen',
		'Folder',
		'Floppy',
		'Files',
		'File',
		'FileBox',
		'ExitFullScreen',
		'EmptyBox',
		'Delete',
		'Controller',
		'Compass',
		'CompassTool',
		'ClipboardText',
		'ClipboardChart',
		'ChemicalGlass',
		'CD',
		'Carioca',
		'Car',
		'Book',
		'BigTruck',
		'Bicycle',
		'Wrench',
		'Web',
		'Watch',
		'Volume',
		'Video',
		'Users',
		'User',
		'UploadCLoud',
		'Typing',
		'Tools',
		'Tag',
		'Speedometter',
		'Share',
		'Settings',
		'Search',
		'Screwdriver',
		'Rolodex',
		'Ringer',
		'Resume',
		'Restart',
		'PowerOff',
		'Pointer',
		'Picture',
		'OpenedLock',
		'Notes',
		'Mute',
		'Movie',
		'Microphone2',
		'Message',
		'MessageRight',
		'MessageLeft',
		'Menu',
		'Media',
		'Mail',
		'List',
		'Layers',
		'Key',
		'Imbox',
		'Eye',
		'Edit',
		'DSLRCamera',
		'DownloadCloud',
		'CompactCamera',
		'Cloud',
		'ClosedLock',
		'Chart2',
		'Bulb',
		'Briefcase',
		'Blog',
		'Agenda'
	);

	$icons_tabs['sgicon'] = array(
		'name'          => 'sgicon',
		'label'         => esc_html__( 'Stroke Gap Icons', 'lyfpro' ),
		'labelIcon'     => 'sgicon sgicon-WorldWide',
		'prefix'        => 'sgicon-',
		'displayPrefix' => 'sgicon',
		'url'           => get_template_directory_uri() . '/libraries/stroke-gap-icons/style.css',
		'icons'         => $sgicon_array,
		'ver'           => '1.0.0',
	);

	return $icons_tabs;
}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'dsvy_elementor_add_custom_icons_tab' );

/**
 *  Add base js specially for Elementor
 */
function dsvy_elementor_enqueue_front_scripts(){
	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script(  'dsvy-elementor-frontview', get_template_directory_uri() . '/includes/elementor-frontview.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsvy_elementor_enqueue_front_scripts' );

/**
 *  Add base js specially for Elementor core part
 */
function dsvy_elementor_enqueue_base_scripts(){
	wp_enqueue_script(  'dsvy-core-script', get_template_directory_uri() . '/js/core.js' );
	wp_enqueue_script(  'dsvy-elementor-base', get_template_directory_uri() . '/includes/elementor-base.js' );
}
add_action('elementor/editor/before_enqueue_scripts', 'dsvy_elementor_enqueue_base_scripts');

/**
 * Creating element widgets now
 */
add_action( 'elementor/widgets/widgets_registered', 'dsvy_elementor_register_widgets',1,1 );
function dsvy_elementor_register_widgets() {
    // We check if the Elementor plugin has been installed / activated.
    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
        // Include Elementor Widget files here.

        // Remove this 2 require_once line below after completed the theme.
        require_once( get_template_directory() . '/includes/elementor/heading-subheading.php' );
        require_once( get_template_directory() . '/includes/elementor/icon-heading.php' );
        require_once( get_template_directory() . '/includes/elementor/multiple-icon-heading.php' );
        require_once( get_template_directory() . '/includes/elementor/blog.php' );
        require_once( get_template_directory() . '/includes/elementor/portfolio.php' );
        require_once( get_template_directory() . '/includes/elementor/service.php' );
        require_once( get_template_directory() . '/includes/elementor/team.php' );
        require_once( get_template_directory() . '/includes/elementor/testimonial.php' );
        require_once( get_template_directory() . '/includes/elementor/client.php' );
        require_once( get_template_directory() . '/includes/elementor/static-box.php' );
        require_once( get_template_directory() . '/includes/elementor/fid.php' );
        require_once( get_template_directory() . '/includes/elementor/timeline.php' );
        require_once( get_template_directory() . '/includes/elementor/pricing-table.php' );
    }
}

if( !function_exists('dsvy_link_render') ){
function dsvy_link_render( $value=array(), $type='start' ) {
	if( !empty($value) && is_array($value) && !empty($value['url']) ){
		if( $type=='start' ){
			$target		= $value['is_external'] ? ' target="_blank"' : '';
			$nofollow	= $value['nofollow'] ? ' rel="nofollow"' : '';
			return dsvy_esc_kses( '<a href="' . $value['url'] . '"' . $target . $nofollow . '><span>' ); 
		} else {
			return dsvy_esc_kses( '</span></a>' ); 
		}
	}
}
}

if( !function_exists('dsvy_iheading_icon') ){
function dsvy_iheading_icon( $settings, $echo=false ){
	$return = '';
	if( !empty($settings['icon_type']) ){

		switch( $settings['icon_type'] ){

			case 'icon':
				if( !empty($settings['icon']['value']) ){
					$return = '<i class="'.esc_attr( $settings['icon']['value'] ).'"></i>';
				}
				break;

			case 'image':
				if( !empty($settings['icon_image']['url']) ){
					$return = '<img src="'.esc_attr( $settings['icon_image']['url'] ).'" />';
				}
			break;

			case 'text':
				if( !empty($settings['icon_text']) ){
					$return = '<div class="dsvy-iheading-icontext">'.esc_attr($settings['icon_text']).'</div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = dsvy_esc_kses('<div class="dsvy-iheading-icon dsvy-iheading-icon-type-'.esc_attr($settings['icon_type']).'">'.$return.'</div>');
	}

	// final output
	if( $echo == true ){
		echo dsvy_esc_kses($return);
	} else {
		return dsvy_esc_kses($return);
	}

}
}

if( !function_exists('dsvy_heading_subheading') ){
function dsvy_heading_subheading( $settings = array(), $echo = false ){

	// Reverse heading class
	$reverse_class = '';
	if( !empty($settings['reverse_title']) && $settings['reverse_title']=='yes' ){
		$reverse_class = 'dsvy-reverse-heading-yes';
	}

	$return = '	<div class="dsvy-heading-subheading ' . dsvy_esc_kses($settings['text_align']) . '-align '.esc_attr($reverse_class).'">';
	$title = '';

	// icon
	$return .= dsvy_iheading_icon($settings);

	// Heading
	if( !empty($settings['title']) ) {
		$title_tag = ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;

		$title .= '<'. dsvy_esc_kses($title_tag) . ' class="dsvy-element-title">
			'.dsvy_link_render($settings['title_link'], 'start' ).'
				'.dsvy_esc_kses($settings['title']).'
			'.dsvy_link_render($settings['title_link'], 'end' ).'
			</'. dsvy_esc_kses($title_tag) . '>
		';
	}

	// Heading before sub-title
	if( empty($settings['reverse_title']) && !empty($title) ){
		$return .= dsvy_esc_kses($title);
	}

	// SubTitle
	if( !empty($settings['subtitle']) ) {
		$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
		$subtitle		= '<'. dsvy_esc_kses($subtitle_tag) . ' class="dsvy-element-subtitle">
			'.dsvy_link_render($settings['subtitle_link'], 'start' ).'
				'.dsvy_esc_kses($settings['subtitle']).'
			'.dsvy_link_render($settings['subtitle_link'], 'end' ).'
			</'. dsvy_esc_kses($subtitle_tag) . '>
		';
		$return .= dsvy_esc_kses($subtitle);
	}

	// Heading after sub-title
	if( !empty($settings['reverse_title']) && !empty($title) ){
		$return .= dsvy_esc_kses($title);
	}

	if( !empty($settings['desc']) ){
		$desc = '<div class="dsvy-heading-desc">'.dsvy_esc_kses($settings['desc']).'</div>';
		$return .= dsvy_esc_kses($desc);
	}

	// closing div
	$return .= dsvy_esc_kses('</div>');

	// final output
	if( $echo == true ){
		echo dsvy_esc_kses($return);
	} else {
		return dsvy_esc_kses($return);
	}

}
}

/**
 *  Section options
 */
add_action('elementor/element/section/section_layout/before_section_start', 'dsvy_elementor_section_options', 10);
if( !function_exists('dsvy_elementor_section_options') ){
function dsvy_elementor_section_options( $element ){

	$element->start_controls_section(
		'dsvy_element_section_title',
		[
			'label' => __('Lyfpro Special Options', 'lyfpro'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'dsvy-extended-column',
		[
			'label'			=> esc_attr__( 'Extend Column for background image', 'lyfpro' ),
			'description'	=> esc_attr__( 'Select which column will be extended with background image.', 'lyfpro' ),
			'type'			=> 'dsvy_imgselect',
			'label_block'	=> true,
			'hide_in_inner' => true,
			'thumb_width'	=> '110px',
			'default'		=> 'none',
			'prefix_class'	=> 'dsvy-col-stretched-',
			'options' => [
				'none'			=> get_template_directory_uri() . '/includes/images/extended-bg-none.png',
				'left'			=> get_template_directory_uri() . '/includes/images/extended-bg-first.png',
				'right'			=> get_template_directory_uri() . '/includes/images/extended-bg-last.png',
				'both'			=> get_template_directory_uri() . '/includes/images/extended-bg-both.png',
			],
		]
	);

	$element->add_control(
		'dsvy-strech-content-left',
		[
			'label'			=> esc_attr__( 'Also stretch left content too?', 'lyfpro' ),
			'description'	=> esc_attr__( 'Also stretch left content too?', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'dsvy-left-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'lyfpro' ),
			'label_off'		=> esc_attr__( 'No', 'lyfpro' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'dsvy-extended-column' => array('left', 'both'),
			]
		]
	);
	$element->add_control(
		'dsvy-strech-content-right',
		[
			'label'			=> esc_attr__( 'Also stretch right content too?', 'lyfpro' ),
			'description'	=> esc_attr__( 'Also stretch right content too?', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'dsvy-right-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'lyfpro' ),
			'label_off'		=> esc_attr__( 'No', 'lyfpro' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'dsvy-extended-column' => array('right', 'both'),
			]
		]
	);
	$element->add_control(
		'dsvy-left-margin',
		[
			'label'			=> esc_html__( 'Left Content Area Margin', 'lyfpro' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'separator'		=> 'before',
			'selectors' => [
				'{{WRAPPER}} .dsvy-stretched-div.dsvy-stretched-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$element->add_control(
		'dsvy-right-margin',
		[
			'label'			=> esc_html__( 'Right Content Area Margin', 'lyfpro' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .dsvy-stretched-div.dsvy-stretched-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$element->add_control(
		'dsvy_bg_color',
		[
			'label'			=> esc_html__( 'Section Background Color', 'lyfpro' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Section (ROW)', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'separator'		=> 'before',
			'prefix_class'	=> 'dsvy-bg-color-yes dsvy-elementor-bg-color-',
			'options'		=> [
				'' 				=> esc_attr__( 'Transparent', 'lyfpro' ),
				'white'			=> esc_attr__( 'White', 'lyfpro' ),
				'light'			=> esc_attr__( 'Light', 'lyfpro' ),
				'blackish'		=> esc_attr__( 'Blackish', 'lyfpro' ),
				'globalcolor'	=> esc_attr__( 'Global Color', 'lyfpro' ),
				'secondary'		=> esc_attr__( 'Secondary Color', 'lyfpro' ),
				'gradient'		=> esc_attr__( 'Gradient Color', 'lyfpro' ),
			],
		]
	);

	$element->add_control(
		'dsvy_text_color',
		[
			'label'			=> esc_html__( 'Section Text Color', 'lyfpro' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Section (ROW)', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'dsvy-text-color-',
			'options' => [
				'' 			=> __( 'Default', 'lyfpro' ),
				'white'		=> __( 'White', 'lyfpro' ),
				'blackish'	=> __( 'Blackish', 'lyfpro' ),
			],
		]
	);

	$element->add_control(
		'dsvy-bg-image-color-order',
		[
			'label'			=> esc_attr__( 'BG Image - BG Color Order', 'lyfpro' ),
			'description'	=> esc_attr__( 'You can show BG image over BG Color or reverse too.', 'lyfpro' ),
			'type'			=> 'dsvy_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '110px',
			'default'		=> 'none',
			'prefix_class'	=> 'dsvy-bg-',
			'default'		=> 'color-over-image',
			'options'		=> [
				'image-over-color'	=> get_template_directory_uri() . '/includes/images/image-over-color.png',
				'color-over-image'	=> get_template_directory_uri() . '/includes/images/color-over-image.png',
			],
		]
	);

	$element->end_controls_section();
}
}

/**
 * Elementor column options
 */
add_action('elementor/element/column/layout/before_section_start', 'dsvy_elementor_column_options', 10);
if( !function_exists('dsvy_elementor_column_options') ){
function dsvy_elementor_column_options( $element ){

	$element->start_controls_section(
		'dsvy_element_section_title',
		[
			'label' => __('Lyfpro Special Options', 'lyfpro'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'dsvy_bg_color',
		[
			'label'			=> esc_html__( 'Column Background Color', 'lyfpro' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Column', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'dsvy-bg-color-yes dsvy-elementor-bg-color-',
			'options' => [
				'' 			=> esc_attr__( 'Transparent', 'lyfpro' ),
				'white'		=> esc_attr__( 'White', 'lyfpro' ),
				'light'		=> esc_attr__( 'Light', 'lyfpro' ),
				'blackish'	=> esc_attr__( 'Blackish', 'lyfpro' ),
				'globalcolor'	=> esc_attr__( 'Global Color', 'lyfpro' ),
				'secondary'	=> esc_attr__( 'Secondary Color', 'lyfpro' ),
				'gradient'	=> esc_attr__( 'Gradient Color', 'lyfpro' ),
			],
		]
	);

	$element->add_control(
		'dsvy_text_color',
		[
			'label'			=> esc_html__( 'Column Text Color', 'lyfpro' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Column', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'dsvy-text-color-',
			'options' => [
				'' 			=> __( 'Default', 'lyfpro' ),
				'white'		=> __( 'White', 'lyfpro' ),
				'blackish'	=> __( 'Blackish', 'lyfpro' ),
			],
		]
	);

	$element->add_control(
		'dsvy-bg-image-color-order',
		[
			'label'			=> esc_attr__( 'BG Image - BG Color Order', 'lyfpro' ),
			'description'	=> esc_attr__( 'You can show BG image over BG Color or reverse too.', 'lyfpro' ),
			'type'			=> 'dsvy_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '110px',
			'default'		=> 'none',
			'prefix_class'	=> 'dsvy-bg-',
			'default'		=> 'color-over-image',
			'options'		=> [
				'image-over-color'	=> get_template_directory_uri() . '/includes/images/image-over-color.png',
				'color-over-image'	=> get_template_directory_uri() . '/includes/images/color-over-image.png',
			],
		]
	);

	$element->end_controls_section();
}
}

/**
 * Elementor button options
 */
add_action('elementor/element/button/section_button/before_section_start', 'dsvy_elementor_button_options', 10);
if( !function_exists('dsvy_elementor_button_options') ){
function dsvy_elementor_button_options( $element ){

	$element->start_controls_section(
		'dsvy_element_section_title',
		[
			'label' => __('Lyfpro Special Options', 'lyfpro'),
			'tab' => Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	$element->add_control(
		'dsvy-btn-color',
		[
			'label'			=> esc_html__( 'Button Color', 'lyfpro' ),
			'description'	=> esc_html__( 'Pre-defined Color for Button', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'globalcolor',
			'label_block'	=> true,
			'prefix_class'	=> 'dsvy-btn-color-',
			'options' => [
				'white'			=> esc_attr__( 'White', 'lyfpro' ),
				'light'			=> esc_attr__( 'Light', 'lyfpro' ),
				'blackish'		=> esc_attr__( 'Blackish', 'lyfpro' ),
				'globalcolor'	=> esc_attr__( 'Global Color', 'lyfpro' ),
				'secondary'		=> esc_attr__( 'Secondary Color', 'lyfpro' ),
				'gradient'		=> esc_attr__( 'Gradient Color', 'lyfpro' ),
			],
		]
	);
	$element->add_control(
		'dsvy-btn-style',
		[
			'label'			=> esc_html__( 'Select Button Style', 'lyfpro' ),
			'description'	=> esc_html__( 'Button style', 'lyfpro' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'flat',
			'label_block'	=> true,
			'prefix_class'	=> 'dsvy-btn-style-',
			'options' => [
				'flat' 			=> esc_attr__( 'Flat', 'lyfpro' ),
				'outline'		=> esc_attr__( 'Outline', 'lyfpro' ),
				'text'			=> esc_attr__( 'Normal text link', 'lyfpro' ),
			],
		]
	);
	$element->add_control(
		'dsvy-btn-shape-flat',
		[
			'label'			=> esc_attr__( 'Select Flat Button Shape', 'lyfpro' ),
			'description'	=> esc_attr__( 'Slect Button Shape.', 'lyfpro' ),
			'type'			=> 'dsvy_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '220px',
			'default'		=> 'square',
			'prefix_class'	=> 'dsvy-btn-shape-',
			'options' => [
				'square'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-flat-square.jpg' ),
				'round'			=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-flat-round.jpg' ),
				'rounded'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-flat-rounded.jpg' ),
			],
			'condition' => [
				'dsvy-btn-style' => 'flat',
			]
		]
	);
	$element->add_control(
		'dsvy-btn-shape-outline',
		[
			'label'			=> esc_attr__( 'Select Outline Button Style', 'lyfpro' ),
			'description'	=> esc_attr__( 'Slect Button style.', 'lyfpro' ),
			'type'			=> 'dsvy_imgselect',
			'label_block'	=> true,
			'thumb_width'	=> '220px',
			'default'		=> 'square',
			'prefix_class'	=> 'dsvy-btn-shape-',
			'options' => [
				'square'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-outline-square.jpg' ),
				'round'			=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-outline-round.jpg' ),
				'rounded'		=> esc_url( get_template_directory_uri() . '/includes/images/btn-style-outline-rounded.jpg' ),
			],
			'condition' => [
				'dsvy-btn-style' => 'outline',
			]
		]

	);

	$element->end_controls_section();
}
}