<?php
/**
 * Plugin Name:       ValorFinal: Calculators and Widgets
 * Plugin URI:        https://valorfinal.com.br/embed/wordpress
 * Description:        Add live ValorFinal widgets to your site: Brazilian league table and fixtures, dollar rate, Selic, CDI, Bitcoin, lottery results and 200+ calculators. Block, shortcode and widget. Refreshes on its own, at no cost.
 * Version:           1.1.0
 * Requires at least: 5.8
 * Requires PHP:      7.2
 * Author:            ValorFinal
 * Author URI:        https://valorfinal.com.br
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       valorfinal-calculadoras-widgets
 * Domain Path:       /languages
 *
 * ValorFinal: Calculators and Widgets - https://valorfinal.com.br
 *
 * This plugin does NOT collect or send personal data. It only generates an
 * <iframe> for the public widgets at https://valorfinal.com.br, which refresh
 * on their own.
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

// Bloqueia acesso direto ao arquivo (sem ABSPATH = nao foi carregado pelo WP).
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'VFCW_VERSION', '1.1.0' );
define( 'VFCW_FILE', __FILE__ );
define( 'VFCW_DIR', plugin_dir_path( __FILE__ ) );
define( 'VFCW_URL', plugin_dir_url( __FILE__ ) );

/** Dominio canonico unico do ValorFinal. Toda URL gerada parte daqui. */
define( 'VFCW_BASE', 'https://valorfinal.com.br' );

require_once VFCW_DIR . 'includes/render.php';
require_once VFCW_DIR . 'includes/shortcode.php';
require_once VFCW_DIR . 'includes/block.php';
require_once VFCW_DIR . 'includes/class-vfcw-widget.php';

/** Registra o widget classico. */
function vfcw_register_widget() {
	register_widget( 'VFCW_Widget' );
}
add_action( 'widgets_init', 'vfcw_register_widget' );

/**
 * Registra o script de auto-altura (carregado SO quando ha um widget na pagina,
 * via vfcw_enqueue_autoheight()). O script valida a origem das mensagens
 * (so https://valorfinal.com.br) antes de ajustar a altura - sem isso seria um
 * vetor de XSS via postMessage.
 */
function vfcw_register_assets() {
	wp_register_script(
		'valorfinal-embed',
		VFCW_URL . 'assets/js/valorfinal-embed.js',
		array(),
		VFCW_VERSION,
		true
	);
}
add_action( 'init', 'vfcw_register_assets' );

/** Carrega as traducoes (pt_BR, en_US...). */
function vfcw_load_textdomain() {
	load_plugin_textdomain( 'valorfinal-calculadoras-widgets', false, dirname( plugin_basename( VFCW_FILE ) ) . '/languages' );
}
add_action( 'init', 'vfcw_load_textdomain' );
