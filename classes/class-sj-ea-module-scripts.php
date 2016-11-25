<?php 
namespace Elementor;

if ( ! class_exists( 'SJEaModuleScripts' ) ) {
	
	/**
	* Responsible for setting up constants, classes and includes.
	*
	* @since 0.1
	*/
	final class SJEaModuleScripts {

		static public function init() {
			
			add_action( 'wp_enqueue_scripts', __CLASS__ . '::add_editor_Scripts' );

		}

		/**
		 * Add modules scripts in editor.
		 *
		 * @since 0.1 
		 * @return void
		 */
		static public function add_editor_Scripts() {
			if( Plugin::instance()->editor->is_edit_mode() || Plugin::instance()->preview->is_preview_mode() ) {

				self::sjea_row_separator();
			}
		}
		
		/**
		 * Add row separator scripts in editor.
		 *
		 * @since 0.1 
		 * @return void
		 */
		static public function sjea_row_separator( $settings = '' ) {
       		$module_url = SJ_EA_URL . 'modules/sjea-row-separator/';
			$module_dir = SJ_EA_DIR . 'modules/sjea-row-separator/';

			wp_enqueue_style( 'sjea-row-separator-css', $module_url . 'css/sjea-row-separator.css', array(), SJ_EA_VERSION );
			
		} 
	}

	SJEaModuleScripts::init();
}

