<?php
/**
 * Shortcode [valorfinal] - incorpora um widget do ValorFinal.
 *
 * Exemplos:
 *   [valorfinal widget="tabela-brasileirao"]
 *   [valorfinal widget="jogos-brasileirao-hoje" tema="dark" cor="#1e88e5"]
 *   [valorfinal widget="dolar" idioma="en" largura="compacto"]
 *   [valorfinal widget="calculadora" slug="calculadora-rescisao-clt" titulo_texto="Rescisao CLT"]
 *
 * Todos os atributos sao sanitizados em vfcw_render() (fonte unica). A saida ja
 * vem escapada, entao retornamos direto (shortcodes devem RETORNAR, nunca ecoar).
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handler do shortcode.
 *
 * @param array|string $atts Atributos do shortcode.
 * @return string HTML seguro do widget.
 */
function vfcw_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'widget'       => '',
			'slug'         => '',
			'tema'         => 'light',
			'cor'          => '',
			'largura'      => 'padrao',
			'altura'       => '',
			'idioma'       => 'pt',
			'titulo'       => '1',
			'credito'      => '1',
			'titulo_texto' => '',
		),
		is_array( $atts ) ? $atts : array(),
		'valorfinal'
	);

	return vfcw_render( $atts );
}
add_shortcode( 'valorfinal', 'vfcw_shortcode' );
