<?php
/**
 * Bloco do editor (Gutenberg) do ValorFinal.
 *
 * O bloco e renderizado NO SERVIDOR (render_callback => vfcw_render), entao a
 * saida no front-end usa exatamente o mesmo builder seguro do shortcode e do
 * widget. Os atributos vindos do editor sao tratados como nao confiaveis e
 * passam pela mesma sanitizacao. O preview no editor usa ServerSideRender, que
 * chama esse mesmo render_callback.
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render do bloco (server-side).
 *
 * @param array $attributes Atributos do bloco (nao confiaveis).
 * @return string HTML seguro.
 */
function vfcw_block_render( $attributes ) {
	$a = is_array( $attributes ) ? $attributes : array();
	return vfcw_render(
		array(
			'widget'  => isset( $a['widget'] ) ? $a['widget'] : '',
			'slug'    => isset( $a['slug'] ) ? $a['slug'] : '',
			'tema'    => isset( $a['tema'] ) ? $a['tema'] : 'light',
			'cor'     => isset( $a['cor'] ) ? $a['cor'] : '',
			'largura' => isset( $a['largura'] ) ? $a['largura'] : 'padrao',
			'titulo'  => ( isset( $a['titulo'] ) && false === $a['titulo'] ) ? '0' : '1',
			'credito' => ( isset( $a['credito'] ) && false === $a['credito'] ) ? '0' : '1',
		)
	);
}

/**
 * Registra o bloco a partir do block.json e passa o catalogo para o editor.
 */
function vfcw_register_block() {
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	// Script do editor (buildless: usa wp.element/wp.components, sem JSX/bundler).
	wp_register_script(
		'valorfinal-calculadoras-widgets-editor-script',
		VFCW_URL . 'blocks/valorfinal/edit.js',
		array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n', 'wp-server-side-render' ),
		VFCW_VERSION,
		true
	);

	register_block_type(
		VFCW_DIR . 'blocks/valorfinal',
		array(
			'render_callback' => 'vfcw_block_render',
		)
	);

	// Catalogo para o seletor do editor (rotulos traduzidos), exposto ao script.
	if ( wp_script_is( 'valorfinal-calculadoras-widgets-editor-script', 'registered' ) ) {
		$opcoes = array();
		foreach ( vfcw_catalog() as $key => $w ) {
			$opcoes[] = array(
				'value' => $key,
				'label' => $w['label'],
			);
		}
		$opcoes[] = array(
			'value' => 'calculadora',
			'label' => __( 'Calculadora (informe o slug)', 'valorfinal-calculadoras-widgets' ),
		);
		wp_localize_script(
			'valorfinal-calculadoras-widgets-editor-script',
			'VFCW_DATA',
			array( 'widgets' => $opcoes )
		);
	}
}
add_action( 'init', 'vfcw_register_block' );
