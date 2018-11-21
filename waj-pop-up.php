<?php
	/*
	Plugin Name:  WAJ Pop Up
	Plugin URI:   https://github.com/waughjai/copyright-year
	Description:  Create pop-up windows that appear on the front page during certain times.
	Version:      1.0.0
	Author:       Jaimeson Waugh
	Author URI:   https://www.jaimeson-waugh.com
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	Text Domain:  waj-pop-up
	*/

	namespace WaughJ\PopUp
	{
		new PopUp();

		class PopUp
		{
			public function __construct()
			{
				$this->loadScript();
				$this->loadStyle();
			}

			private function loadScript() : void
			{
				add_action
				(
					'the_post',
					function()
					{
						if ( is_front_page() )
						{
							add_action
							(
								'wp_footer',
								function()
								{
									wp_register_script( 'waj-pop-up', $this->getScriptURI(), [], $this->getScriptVersion() );
									wp_enqueue_script( 'waj-pop-up' );
								}
							);
						}
					}
				);
			}

			private function loadStyle() : void
			{
			}

			private function getScriptURI() : string
			{
				return plugins_url( 'js/main.js', __FILE__ );
			}

			private function getScriptVersion() : string
			{
				return ( string )( filemtime( $this->getScriptFileLocation() ) );
			}

			private function getScriptFileLocation() : string
			{
				return plugin_dir_path( __FILE__ ) . 'js/main.js';
			}
		}
	}
