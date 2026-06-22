<?php
/**
 * Plugin Name:       ValorFinal: Calculadoras e Widgets
 * Plugin URI:        https://valorfinal.com.br/embed/wordpress
 * Description:        Adicione widgets ao vivo do ValorFinal no seu site: tabela e jogos do Brasileirao, cotacao do dolar, Selic, CDI, Bitcoin, resultados de loteria e mais de 200 calculadoras. Bloco, shortcode e widget. Atualiza sozinho, sem custo.
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
 * ValorFinal: Calculadoras e Widgets - https://valorfinal.com.br
 *
 * Este plugin NAO coleta nem envia dados pessoais. Ele apenas gera um <iframe>
 * para os widgets publicos de https://valorfinal.com.br, que se atualizam sozinhos.
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
