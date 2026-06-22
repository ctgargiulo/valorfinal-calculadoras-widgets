<?php
/**
 * Limpeza ao desinstalar o plugin.
 *
 * O plugin nao cria tabelas nem opcoes proprias (so gera iframes). A unica
 * persistencia possivel sao as instancias do widget classico, guardadas pelo
 * core do WordPress na opcao `widget_vfcw_widget`; removemos por higiene.
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

// So roda no fluxo oficial de desinstalacao do WordPress.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'widget_vfcw_widget' );
