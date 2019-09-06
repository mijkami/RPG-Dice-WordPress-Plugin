<?php
/*
Plugin Name: RPG Dice Roller - DG Edition
Description: Plugin de lancer de dés pour WordPress, spécifiquement pour widget sur sidebar.
Version:     0.3.2
Author:      Redesigned by GAILLOT Dimitri with the help of his peers, Original version by : Martin Himmel
Author URI:  http://www.dimitrigaillot.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or die('Plugin file cannot be accessed directly.');

if (!class_exists('MHRPGDiceRoller')) {

	class MHRPGDiceRoller {

		/**
		 * Set up the plugin.
		 */
		function __construct() {
			add_shortcode('mh_rpg_dice_roller', [$this, 'shortcode']);
		}

		/**
		 * Set up the shortcode.
		 *
		 * @param	array	$atts		Attributes
		 * @param	string 	$content	Content passed in to the shortcode
		 * @return	string				Shortcode output
		 */
		function shortcode($atts, $content = null) {
			$this->enqueue_js();
			$this->enqueue_css();
			ob_start();
			require_once('form/form.html');
			$html = ob_get_clean();
			return $html;
		}		

		function enqueue_css() {			
			wp_register_style(
				'style',
				plugin_dir_url(__FILE__) . 'css/style.css'
			);
			wp_enqueue_style('style');
		}

		/**
		 * Register scripts with WordPress.
		 */
		function enqueue_js() {
			if (!wp_script_is('mh_rpg_dice_roller', 'enqueued')) {
				wp_register_script(
					'mh_rpg_dice_roller',
					plugin_dir_url(__FILE__) . 'js/mh-rpg-dice-roller.js'
				);
				wp_enqueue_script('mh_rpg_dice_roller');
			}
		}

	} // End class
	
} // End if(!class_exists)

if (!class_exists('MHRPGDiceRollerWidget')) {

	class MHRPGDiceRollerWidget extends WP_Widget{

		/**
		 * Set up the widget in the menu.
		 */
		function __construct() {
			parent::__construct(
				'mh_rpg_dice_roller',
				'RPG Dice Roller',
				['description' => 'Dice roller for table top RPGs']
			);
		}

		/**
		 * We add the CSS for the widget
		 */
		function enqueue_css() {			
			wp_register_style(
				'style',
				plugin_dir_url(__FILE__) . 'css/style.css'
			);
			wp_enqueue_style('style');
		}

		/**
		 * Register scripts with WordPress.
		 */
		function enqueue_js() {
			if (!wp_script_is('mh_rpg_dice_roller', 'enqueued')) {
				wp_register_script(
					'mh_rpg_dice_roller',
					plugin_dir_url(__FILE__) . 'js/mh-rpg-dice-roller.js'
				);
				wp_enqueue_script('mh_rpg_dice_roller');
			}
		}

		/**
		 * Runs the widget code.
		 */
		function widget($args, $instance) {
			$this->enqueue_js();
			$this->enqueue_css();
			require_once('form/form-widget.html');
		}

	} // End class

} // End if(!class_exists)

if (class_exists('MHRPGDiceRoller')) {
	new MHRPGDiceRoller();
}

if (class_exists('MHRPGDiceRollerWidget')) {
	function mh_register_rpg_dice_roller_widget() {
		register_widget('MHRPGDiceRollerWidget');
	}
	add_action('widgets_init', 'mh_register_rpg_dice_roller_widget');
}
