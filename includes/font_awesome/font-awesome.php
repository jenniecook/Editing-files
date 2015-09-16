<?php

if (!function_exists('getFontAwesomeIconArray')){
    /**
     * Defines array of icons from Font Awesome
     * @return array array of icons from Font Awesome
     */
    function getFontAwesomeIconArray() {


		$icons = array (
			    'fa-adjust' => '\f042',
			    'fa-adn' => '\f170',
			    'fa-align-center' => '\f037',
			    'fa-align-justify' => '\f039',
			    'fa-align-left' => '\f036',
			    'fa-align-right' => '\f038',
			    'fa-ambulance' => '\f0f9',
			    'fa-anchor' => '\f13d',
			    'fa-android' => '\f17b',
			    'fa-angellist' => '\f209',
			    'fa-angle-double-down' => '\f103',
			    'fa-angle-double-left' => '\f100',
			    'fa-angle-double-right' => '\f101',
			    'fa-angle-double-up' => '\f102',
			    'fa-angle-down' => '\f107',
			    'fa-angle-left' => '\f104',
			    'fa-angle-right' => '\f105',
			    'fa-angle-up' => '\f106',
			    'fa-apple' => '\f179',
			    'fa-archive' => '\f187',
			    'fa-area-chart' => '\f1fe',
			    'fa-arrow-circle-down' => '\f0ab',
			    'fa-arrow-circle-left' => '\f0a8',
			    'fa-arrow-circle-o-down' => '\f01a',
			    'fa-arrow-circle-o-left' => '\f190',
			    'fa-arrow-circle-o-right' => '\f18e',
			    'fa-arrow-circle-o-up' => '\f01b',
			    'fa-arrow-circle-right' => '\f0a9',
			    'fa-arrow-circle-up' => '\f0aa',
			    'fa-arrow-down' => '\f063',
			    'fa-arrow-left' => '\f060',
			    'fa-arrow-right' => '\f061',
			    'fa-arrow-up' => '\f062',
			    'fa-arrows' => '\f047',
			    'fa-arrows-alt' => '\f0b2',
			    'fa-arrows-h' => '\f07e',
			    'fa-arrows-v' => '\f07d',
			    'fa-asterisk' => '\f069',
			    'fa-at' => '\f1fa',
			    'fa-backward' => '\f04a',
			    'fa-ban' => '\f05e',
			    'fa-bar-chart' => '\f080',
			    'fa-barcode' => '\f02a',
			    'fa-bars' => '\f0c9',
			    'fa-beer' => '\f0fc',
			    'fa-behance' => '\f1b4',
			    'fa-behance-square' => '\f1b5',
			    'fa-bell' => '\f0f3',
			    'fa-bell-o' => '\f0a2',
			    'fa-bell-slash' => '\f1f6',
			    'fa-bell-slash-o' => '\f1f7',
			    'fa-bicycle' => '\f206',
			    'fa-binoculars' => '\f1e5',
			    'fa-birthday-cake' => '\f1fd',
			    'fa-bitbucket' => '\f171',
			    'fa-bitbucket-square' => '\f172',
			    'fa-bold' => '\f032',
			    'fa-bolt' => '\f0e7',
			    'fa-bomb' => '\f1e2',
			    'fa-book' => '\f02d',
			    'fa-bookmark' => '\f02e',
			    'fa-bookmark-o' => '\f097',
			    'fa-briefcase' => '\f0b1',
			    'fa-btc' => '\f15a',
			    'fa-bug' => '\f188',
			    'fa-building' => '\f1ad',
			    'fa-building-o' => '\f0f7',
			    'fa-bullhorn' => '\f0a1',
			    'fa-bullseye' => '\f140',
			    'fa-bus' => '\f207',
			    'fa-calculator' => '\f1ec',
			    'fa-calendar' => '\f073',
			    'fa-calendar-o' => '\f133',
			    'fa-camera' => '\f030',
			    'fa-camera-retro' => '\f083',
			    'fa-car' => '\f1b9',
			    'fa-caret-down' => '\f0d7',
			    'fa-caret-left' => '\f0d9',
			    'fa-caret-right' => '\f0da',
			    'fa-caret-square-o-down' => '\f150',
			    'fa-caret-square-o-left' => '\f191',
			    'fa-caret-square-o-right' => '\f152',
			    'fa-caret-square-o-up' => '\f151',
			    'fa-caret-up' => '\f0d8',
			    'fa-cc' => '\f20a',
			    'fa-cc-amex' => '\f1f3',
			    'fa-cc-discover' => '\f1f2',
			    'fa-cc-mastercard' => '\f1f1',
			    'fa-cc-paypal' => '\f1f4',
			    'fa-cc-stripe' => '\f1f5',
			    'fa-cc-visa' => '\f1f0',
			    'fa-certificate' => '\f0a3',
			    'fa-chain-broken' => '\f127',
			    'fa-check' => '\f00c',
			    'fa-check-circle' => '\f058',
			    'fa-check-circle-o' => '\f05d',
			    'fa-check-square' => '\f14a',
			    'fa-check-square-o' => '\f046',
			    'fa-chevron-circle-down' => '\f13a',
			    'fa-chevron-circle-left' => '\f137',
			    'fa-chevron-circle-right' => '\f138',
			    'fa-chevron-circle-up' => '\f139',
			    'fa-chevron-down' => '\f078',
			    'fa-chevron-left' => '\f053',
			    'fa-chevron-right' => '\f054',
			    'fa-chevron-up' => '\f077',
			    'fa-child' => '\f1ae',
			    'fa-circle' => '\f111',
			    'fa-circle-o' => '\f10c',
			    'fa-circle-o-notch' => '\f1ce',
			    'fa-circle-thin' => '\f1db',
			    'fa-clipboard' => '\f0ea',
			    'fa-clock-o' => '\f017',
			    'fa-cloud' => '\f0c2',
			    'fa-cloud-download' => '\f0ed',
			    'fa-cloud-upload' => '\f0ee',
			    'fa-code' => '\f121',
			    'fa-code-fork' => '\f126',
			    'fa-codepen' => '\f1cb',
			    'fa-coffee' => '\f0f4',
			    'fa-cog' => '\f013',
			    'fa-cogs' => '\f085',
			    'fa-columns' => '\f0db',
			    'fa-comment' => '\f075',
			    'fa-comment-o' => '\f0e5',
			    'fa-comments' => '\f086',
			    'fa-comments-o' => '\f0e6',
			    'fa-compass' => '\f14e',
			    'fa-compress' => '\f066',
			    'fa-copyright' => '\f1f9',
			    'fa-credit-card' => '\f09d',
			    'fa-crop' => '\f125',
			    'fa-crosshairs' => '\f05b',
			    'fa-css3' => '\f13c',
			    'fa-cube' => '\f1b2',
			    'fa-cubes' => '\f1b3',
			    'fa-cutlery' => '\f0f5',
			    'fa-database' => '\f1c0',
			    'fa-delicious' => '\f1a5',
			    'fa-desktop' => '\f108',
			    'fa-deviantart' => '\f1bd',
			    'fa-digg' => '\f1a6',
			    'fa-dot-circle-o' => '\f192',
			    'fa-download' => '\f019',
			    'fa-dribbble' => '\f17d',
			    'fa-dropbox' => '\f16b',
			    'fa-drupal' => '\f1a9',
			    'fa-eject' => '\f052',
			    'fa-ellipsis-h' => '\f141',
			    'fa-ellipsis-v' => '\f142',
			    'fa-empire' => '\f1d1',
			    'fa-envelope' => '\f0e0',
			    'fa-envelope-o' => '\f003',
			    'fa-envelope-square' => '\f199',
			    'fa-eraser' => '\f12d',
			    'fa-eur' => '\f153',
			    'fa-exchange' => '\f0ec',
			    'fa-exclamation' => '\f12a',
			    'fa-exclamation-circle' => '\f06a',
			    'fa-exclamation-triangle' => '\f071',
			    'fa-expand' => '\f065',
			    'fa-external-link' => '\f08e',
			    'fa-external-link-square' => '\f14c',
			    'fa-eye' => '\f06e',
			    'fa-eye-slash' => '\f070',
			    'fa-eyedropper' => '\f1fb',
			    'fa-facebook' => '\f09a',
			    'fa-facebook-square' => '\f082',
			    'fa-fast-backward' => '\f049',
			    'fa-fast-forward' => '\f050',
			    'fa-fax' => '\f1ac',
			    'fa-female' => '\f182',
			    'fa-fighter-jet' => '\f0fb',
			    'fa-file' => '\f15b',
			    'fa-file-archive-o' => '\f1c6',
			    'fa-file-audio-o' => '\f1c7',
			    'fa-file-code-o' => '\f1c9',
			    'fa-file-excel-o' => '\f1c3',
			    'fa-file-image-o' => '\f1c5',
			    'fa-file-o' => '\f016',
			    'fa-file-pdf-o' => '\f1c1',
			    'fa-file-powerpoint-o' => '\f1c4',
			    'fa-file-text' => '\f15c',
			    'fa-file-text-o' => '\f0f6',
			    'fa-file-video-o' => '\f1c8',
			    'fa-file-word-o' => '\f1c2',
			    'fa-files-o' => '\f0c5',
			    'fa-film' => '\f008',
			    'fa-filter' => '\f0b0',
			    'fa-fire' => '\f06d',
			    'fa-fire-extinguisher' => '\f134',
			    'fa-flag' => '\f024',
			    'fa-flag-checkered' => '\f11e',
			    'fa-flag-o' => '\f11d',
			    'fa-flask' => '\f0c3',
			    'fa-flickr' => '\f16e',
			    'fa-floppy-o' => '\f0c7',
			    'fa-folder' => '\f07b',
			    'fa-folder-o' => '\f114',
			    'fa-folder-open' => '\f07c',
			    'fa-folder-open-o' => '\f115',
			    'fa-font' => '\f031',
			    'fa-forward' => '\f04e',
			    'fa-foursquare' => '\f180',
			    'fa-frown-o' => '\f119',
			    'fa-futbol-o' => '\f1e3',
			    'fa-gamepad' => '\f11b',
			    'fa-gavel' => '\f0e3',
			    'fa-gbp' => '\f154',
			    'fa-gift' => '\f06b',
			    'fa-git' => '\f1d3',
			    'fa-git-square' => '\f1d2',
			    'fa-github' => '\f09b',
			    'fa-github-alt' => '\f113',
			    'fa-github-square' => '\f092',
			    'fa-gittip' => '\f184',
			    'fa-glass' => '\f000',
			    'fa-globe' => '\f0ac',
			    'fa-google' => '\f1a0',
			    'fa-google-plus' => '\f0d5',
			    'fa-google-plus-square' => '\f0d4',
			    'fa-google-wallet' => '\f1ee',
			    'fa-graduation-cap' => '\f19d',
			    'fa-h-square' => '\f0fd',
			    'fa-hacker-news' => '\f1d4',
			    'fa-hand-o-down' => '\f0a7',
			    'fa-hand-o-left' => '\f0a5',
			    'fa-hand-o-right' => '\f0a4',
			    'fa-hand-o-up' => '\f0a6',
			    'fa-hdd-o' => '\f0a0',
			    'fa-header' => '\f1dc',
			    'fa-headphones' => '\f025',
			    'fa-heart' => '\f004',
			    'fa-heart-o' => '\f08a',
			    'fa-history' => '\f1da',
			    'fa-home' => '\f015',
			    'fa-hospital-o' => '\f0f8',
			    'fa-html5' => '\f13b',
			    'fa-ils' => '\f20b',
			    'fa-inbox' => '\f01c',
			    'fa-indent' => '\f03c',
			    'fa-info' => '\f129',
			    'fa-info-circle' => '\f05a',
			    'fa-inr' => '\f156',
			    'fa-instagram' => '\f16d',
			    'fa-ioxhost' => '\f208',
			    'fa-italic' => '\f033',
			    'fa-joomla' => '\f1aa',
			    'fa-jpy' => '\f157',
			    'fa-jsfiddle' => '\f1cc',
			    'fa-key' => '\f084',
			    'fa-keyboard-o' => '\f11c',
			    'fa-krw' => '\f159',
			    'fa-language' => '\f1ab',
			    'fa-laptop' => '\f109',
			    'fa-lastfm' => '\f202',
			    'fa-lastfm-square' => '\f203',
			    'fa-leaf' => '\f06c',
			    'fa-lemon-o' => '\f094',
			    'fa-level-down' => '\f149',
			    'fa-level-up' => '\f148',
			    'fa-life-ring' => '\f1cd',
			    'fa-lightbulb-o' => '\f0eb',
			    'fa-line-chart' => '\f201',
			    'fa-link' => '\f0c1',
			    'fa-linkedin' => '\f0e1',
			    'fa-linkedin-square' => '\f08c',
			    'fa-linux' => '\f17c',
			    'fa-list' => '\f03a',
			    'fa-list-alt' => '\f022',
			    'fa-list-ol' => '\f0cb',
			    'fa-list-ul' => '\f0ca',
			    'fa-location-arrow' => '\f124',
			    'fa-lock' => '\f023',
			    'fa-long-arrow-down' => '\f175',
			    'fa-long-arrow-left' => '\f177',
			    'fa-long-arrow-right' => '\f178',
			    'fa-long-arrow-up' => '\f176',
			    'fa-magic' => '\f0d0',
			    'fa-magnet' => '\f076',
			    'fa-male' => '\f183',
			    'fa-map-marker' => '\f041',
			    'fa-maxcdn' => '\f136',
			    'fa-meanpath' => '\f20c',
			    'fa-medkit' => '\f0fa',
			    'fa-meh-o' => '\f11a',
			    'fa-microphone' => '\f130',
			    'fa-microphone-slash' => '\f131',
			    'fa-minus' => '\f068',
			    'fa-minus-circle' => '\f056',
			    'fa-minus-square' => '\f146',
			    'fa-minus-square-o' => '\f147',
			    'fa-mobile' => '\f10b',
			    'fa-money' => '\f0d6',
			    'fa-moon-o' => '\f186',
			    'fa-music' => '\f001',
			    'fa-newspaper-o' => '\f1ea',
			    'fa-openid' => '\f19b',
			    'fa-outdent' => '\f03b',
			    'fa-pagelines' => '\f18c',
			    'fa-paint-brush' => '\f1fc',
			    'fa-paper-plane' => '\f1d8',
			    'fa-paper-plane-o' => '\f1d9',
			    'fa-paperclip' => '\f0c6',
			    'fa-paragraph' => '\f1dd',
			    'fa-pause' => '\f04c',
			    'fa-paw' => '\f1b0',
			    'fa-paypal' => '\f1ed',
			    'fa-pencil' => '\f040',
			    'fa-pencil-square' => '\f14b',
			    'fa-pencil-square-o' => '\f044',
			    'fa-phone' => '\f095',
			    'fa-phone-square' => '\f098',
			    'fa-picture-o' => '\f03e',
			    'fa-pie-chart' => '\f200',
			    'fa-pied-piper' => '\f1a7',
			    'fa-pied-piper-alt' => '\f1a8',
			    'fa-pinterest' => '\f0d2',
			    'fa-pinterest-square' => '\f0d3',
			    'fa-plane' => '\f072',
			    'fa-play' => '\f04b',
			    'fa-play-circle' => '\f144',
			    'fa-play-circle-o' => '\f01d',
			    'fa-plug' => '\f1e6',
			    'fa-plus' => '\f067',
			    'fa-plus-circle' => '\f055',
			    'fa-plus-square' => '\f0fe',
			    'fa-plus-square-o' => '\f196',
			    'fa-power-off' => '\f011',
			    'fa-print' => '\f02f',
			    'fa-puzzle-piece' => '\f12e',
			    'fa-qq' => '\f1d6',
			    'fa-qrcode' => '\f029',
			    'fa-question' => '\f128',
			    'fa-question-circle' => '\f059',
			    'fa-quote-left' => '\f10d',
			    'fa-quote-right' => '\f10e',
			    'fa-random' => '\f074',
			    'fa-rebel' => '\f1d0',
			    'fa-recycle' => '\f1b8',
			    'fa-reddit' => '\f1a1',
			    'fa-reddit-square' => '\f1a2',
			    'fa-refresh' => '\f021',
			    'fa-renren' => '\f18b',
			    'fa-repeat' => '\f01e',
			    'fa-reply' => '\f112',
			    'fa-reply-all' => '\f122',
			    'fa-retweet' => '\f079',
			    'fa-road' => '\f018',
			    'fa-rocket' => '\f135',
			    'fa-rss' => '\f09e',
			    'fa-rss-square' => '\f143',
			    'fa-rub' => '\f158',
			    'fa-scissors' => '\f0c4',
			    'fa-search' => '\f002',
			    'fa-search-minus' => '\f010',
			    'fa-search-plus' => '\f00e',
			    'fa-share' => '\f064',
			    'fa-share-alt' => '\f1e0',
			    'fa-share-alt-square' => '\f1e1',
			    'fa-share-square' => '\f14d',
			    'fa-share-square-o' => '\f045',
			    'fa-shield' => '\f132',
			    'fa-shopping-cart' => '\f07a',
			    'fa-sign-in' => '\f090',
			    'fa-sign-out' => '\f08b',
			    'fa-signal' => '\f012',
			    'fa-sitemap' => '\f0e8',
			    'fa-skype' => '\f17e',
			    'fa-slack' => '\f198',
			    'fa-sliders' => '\f1de',
			    'fa-slideshare' => '\f1e7',
			    'fa-smile-o' => '\f118',
			    'fa-sort' => '\f0dc',
			    'fa-sort-alpha-asc' => '\f15d',
			    'fa-sort-alpha-desc' => '\f15e',
			    'fa-sort-amount-asc' => '\f160',
			    'fa-sort-amount-desc' => '\f161',
			    'fa-sort-asc' => '\f0de',
			    'fa-sort-desc' => '\f0dd',
			    'fa-sort-numeric-asc' => '\f162',
			    'fa-sort-numeric-desc' => '\f163',
			    'fa-soundcloud' => '\f1be',
			    'fa-space-shuttle' => '\f197',
			    'fa-spinner' => '\f110',
			    'fa-spoon' => '\f1b1',
			    'fa-spotify' => '\f1bc',
			    'fa-square' => '\f0c8',
			    'fa-square-o' => '\f096',
			    'fa-stack-exchange' => '\f18d',
			    'fa-stack-overflow' => '\f16c',
			    'fa-star' => '\f005',
			    'fa-star-half' => '\f089',
			    'fa-star-half-o' => '\f123',
			    'fa-star-o' => '\f006',
			    'fa-steam' => '\f1b6',
			    'fa-steam-square' => '\f1b7',
			    'fa-step-backward' => '\f048',
			    'fa-step-forward' => '\f051',
			    'fa-stethoscope' => '\f0f1',
			    'fa-stop' => '\f04d',
			    'fa-strikethrough' => '\f0cc',
			    'fa-stumbleupon' => '\f1a4',
			    'fa-stumbleupon-circle' => '\f1a3',
			    'fa-subscript' => '\f12c',
			    'fa-suitcase' => '\f0f2',
			    'fa-sun-o' => '\f185',
			    'fa-superscript' => '\f12b',
			    'fa-table' => '\f0ce',
			    'fa-tablet' => '\f10a',
			    'fa-tachometer' => '\f0e4',
			    'fa-tag' => '\f02b',
			    'fa-tags' => '\f02c',
			    'fa-tasks' => '\f0ae',
			    'fa-taxi' => '\f1ba',
			    'fa-tencent-weibo' => '\f1d5',
			    'fa-terminal' => '\f120',
			    'fa-text-height' => '\f034',
			    'fa-text-width' => '\f035',
			    'fa-th' => '\f00a',
			    'fa-th-large' => '\f009',
			    'fa-th-list' => '\f00b',
			    'fa-thumb-tack' => '\f08d',
			    'fa-thumbs-down' => '\f165',
			    'fa-thumbs-o-down' => '\f088',
			    'fa-thumbs-o-up' => '\f087',
			    'fa-thumbs-up' => '\f164',
			    'fa-ticket' => '\f145',
			    'fa-times' => '\f00d',
			    'fa-times-circle' => '\f057',
			    'fa-times-circle-o' => '\f05c',
			    'fa-tint' => '\f043',
			    'fa-toggle-off' => '\f204',
			    'fa-toggle-on' => '\f205',
			    'fa-trash' => '\f1f8',
			    'fa-trash-o' => '\f014',
			    'fa-tree' => '\f1bb',
			    'fa-trello' => '\f181',
			    'fa-trophy' => '\f091',
			    'fa-truck' => '\f0d1',
			    'fa-try' => '\f195',
			    'fa-tty' => '\f1e4',
			    'fa-tumblr' => '\f173',
			    'fa-tumblr-square' => '\f174',
			    'fa-twitch' => '\f1e8',
			    'fa-twitter' => '\f099',
			    'fa-twitter-square' => '\f081',
			    'fa-umbrella' => '\f0e9',
			    'fa-underline' => '\f0cd',
			    'fa-undo' => '\f0e2',
			    'fa-university' => '\f19c',
			    'fa-unlock' => '\f09c',
			    'fa-unlock-alt' => '\f13e',
			    'fa-upload' => '\f093',
			    'fa-usd' => '\f155',
			    'fa-user' => '\f007',
			    'fa-user-md' => '\f0f0',
			    'fa-users' => '\f0c0',
			    'fa-video-camera' => '\f03d',
			    'fa-vimeo-square' => '\f194',
			    'fa-vine' => '\f1ca',
			    'fa-vk' => '\f189',
			    'fa-volume-down' => '\f027',
			    'fa-volume-off' => '\f026',
			    'fa-volume-up' => '\f028',
			    'fa-weibo' => '\f18a',
			    'fa-weixin' => '\f1d7',
			    'fa-wheelchair' => '\f193',
			    'fa-wifi' => '\f1eb',
			    'fa-windows' => '\f17a',
			    'fa-wordpress' => '\f19a',
			    'fa-wrench' => '\f0ad',
			    'fa-xing' => '\f168',
			    'fa-xing-square' => '\f169',
			    'fa-yahoo' => '\f19e',
			    'fa-yelp' => '\f1e9',
			    'fa-youtube' => '\f167',
			    'fa-youtube-play' => '\f16a',
			    'fa-youtube-square' => '\f166'
		);

		return $icons;
	}
}

if(!function_exists('fontAwesomeSocialIcons')) {
	/**
	 * Defines social icons array from Font Awesome
	 * @return array array of social icons
	 */
	function fontAwesomeSocialIcons() {
		$icons = array(
			"fa-adn"                => "ADN",
			"fa-android"            => "Android",
			"fa-apple"              => "Apple",
			"fa-behance"            => "Behance",
			"fa-bitbucket"          => "Bitbucket",
			"fa-bitbucket-sign"     => "Bitbucket-Sign",
			"fa-bitcoin"            => "Bitcoin",
			"fa-btc"                => "BTC",
			"fa-css3"               => "CSS3",
			"fa-codepen"            => "Codepen",
			"fa-digg"            	=> "Digg",
			"fa-drupal"            	=> "Drupal",
			"fa-dribbble"           => "Dribbble",
			"fa-dropbox"            => "Dropbox",
			"fa-envelope"           => "E-mail",
			"fa-facebook"           => "Facebook",
			"fa-facebook-sign"      => "Facebook-Sign",
			"fa-flickr"             => "Flickr",
			"fa-foursquare"         => "Foursquare",
			"fa-github"             => "GitHub",
			"fa-github-alt"         => "GitHub-Alt",
			"fa-github-sign"        => "GitHub-Sign",
			"fa-gittip"             => "Gittip",
			"fa-google"             => "Google",
			"fa-google-plus"        => "Google Plus",
			"fa-google-plus-sign"   => "Google Plus-Sign",
			"fa-html5"              => "HTML5",
			"fa-instagram"          => "Instagram",
			"fa-linkedin"           => "LinkedIn",
			"fa-linkedin-sign"      => "LinkedIn-Sign",
			"fa-linux"              => "Linux",
			"fa-maxcdn"             => "MaxCDN",
			"fa-paypal"             => "Paypal",
			"fa-pinterest"          => "Pinterest",
			"fa-pinterest-sign"     => "Pinterest-Sign",
			"fa-reddit"     		=> "Reddit",
			"fa-renren"             => "Renren",
			"fa-skype"              => "Skype",
			"fa-stackexchange"      => "StackExchange",
			"fa-soundcloud"      	=> "Soundcloud",
			"fa-spotify"      		=> "Spotify",
			"fa-trello"             => "Trello",
			"fa-tumblr"             => "Tumblr",
			"fa-tumblr-sign"        => "Tumblr-Sign",
			"fa-twitter"            => "Twitter",
			"fa-twitter-sign"       => "Twitter-Sign",
			"fa-vimeo-square"       => "Vimeo-Square",
			"fa-vk"                 => "VK",
			"fa-weibo"              => "Weibo",
			"fa-windows"            => "Windows",
			"fa-xing"               => "Xing",
			"fa-xing-sign"          => "Xing-Sign",
			"fa-yahoo"          	=> "Yahoo",
			"fa-youtube"            => "YouTube",
			"fa-youtube-play"       => "YouTube Play",
			"fa-youtube-sign"       => "YouTube-Sign"
		);

		ksort($icons);
		return $icons;
	}
}

if(!function_exists('fontAwesomeSocialIconsVC')) {
    /**
     * Returns flipped array of social icons that is used for Visual Composer
     * @return array flipped array of social icons
     */
    function fontAwesomeSocialIconsVC() {
        return array_flip(fontAwesomeSocialIcons());
    }
}