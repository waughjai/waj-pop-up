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
				add_action
				(
					'the_post',
					function()
					{
						if ( is_front_page() )
						{
							$this->loadScript();
							$this->loadStyle();
						}
					}
				);
			}

			private function loadScript() : void
			{
				add_action
				(
					'wp_footer',
					function()
					{
						wp_register_script( 'waj-pop-up', $this->getFileURI( self::SCRIPT_LOCAL ), [], $this->getFileVersion( self::SCRIPT_LOCAL ) );
						wp_enqueue_script( 'waj-pop-up' );
					}
				);
			}

			private function loadStyle() : void
			{
				add_action
				(
					'wp_footer',
					function()
					{
						wp_enqueue_style( 'waj-pop-up', $this->getFileURI( self::STYLE_LOCAL ), [], $this->getFileVersion( self::STYLE_LOCAL ) );
					}
				);
			}

			private function getFileURI( string $local ) : string
			{
				return plugins_url( $local, __FILE__ );
			}

			private function getFileVersion( string $local ) : string
			{
				return ( string )( filemtime( $this->getFileLocation( $local ) ) );
			}

			private function getFileLocation( string $local ) : string
			{
				return plugin_dir_path( __FILE__ ) . $local;
			}

			const SCRIPT_LOCAL = 'js/main.js';
			const STYLE_LOCAL  = 'css/main.css';
		}
	}
