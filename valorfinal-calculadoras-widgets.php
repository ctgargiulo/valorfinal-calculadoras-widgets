<?php
/**
 * Plugin Name:       ValorFinal: Calculadoras e Widgets
 * Plugin URI:        https://valorfinal.com.br/embed/wordpress
 * Description:        Adicione widgets ao vivo do ValorFinal ao seu site: tabela e jogos do Brasileirão, cotação do dólar, Selic, CDI, Bitcoin, resultados das loterias e mais de 390 calculadoras. Bloco, shortcode e widget. Atualiza sozinho, de graça.
 * Version:           1.3.0
 * Requires at least: 5.8
 * Requires PHP:      7.2
 * Author:            ValorFinal
 * Author URI:        https://valorfinal.com.br
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       valorfinal-calculadoras-widgets
 *
 * ValorFinal: Calculadoras e Widgets - https://valorfinal.com.br
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

define( 'VFCW_VERSION', '1.3.0' );
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

/**
 * Atalho "Como usar" na lista de plugins (leva a documentacao oficial, com o
 * passo a passo do bloco, do shortcode e do widget classico).
 *
 * @param array<int,string> $links Links de acao existentes.
 * @return array<int,string> Links com o atalho no inicio.
 */
function vfcw_action_links( $links ) {
	$doc = '<a href="https://valorfinal.com.br/embed/wordpress" target="_blank" rel="noopener">'
		. esc_html__( 'Como usar', 'valorfinal-calculadoras-widgets' )
		. '</a>';
	array_unshift( $links, $doc );
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'vfcw_action_links' );
