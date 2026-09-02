<?php
/**
 * Nucleo do plugin: catalogo (whitelist) de widgets + builder seguro do <iframe>.
 *
 * SEGURANCA (fonte unica usada por shortcode, bloco e widget):
 *  - O usuario NUNCA fornece uma URL livre: escolhe uma CHAVE de uma lista fechada
 *    (vfcw_catalog). Chave desconhecida -> nao renderiza nada (sem iframe arbitrario,
 *    sem SSRF/open-redirect).
 *  - Toda opcao e sanitizada: tema (enum), cor (sanitize_hex_color), idioma (enum),
 *    largura (enum), altura (absint com teto), titulo/credito (booleanos).
 *  - Toda saida e escapada: esc_url no src, esc_attr nos atributos, esc_html no texto.
 *  - Nenhum dado do usuario chega ao CSS sem validacao.
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Azul da marca (default da cor de destaque; igual ao portal). */
const VFCW_ACCENT_DEFAULT = '#2563eb';

/**
 * Catalogo de widgets disponiveis (whitelist). Cada item:
 *  - label  : nome exibido / atribuicao.
 *  - path   : caminho do widget no portal (/embed/<...>).
 *  - tool   : caminho da ferramenta completa (atribuicao/backlink).
 *  - height : altura inicial sugerida (px) antes do auto-ajuste.
 *  - lang   : se aceita o seletor PT/EN (so widgets universais).
 *  - group  : agrupamento para a UI.
 *
 * @return array<string,array<string,mixed>>
 */
function vfcw_catalog() {
	return array(
		// Futebol ao vivo (motor de incorporacao recorrente).
		'tabela-brasileirao'       => array(
			'label'  => 'Tabela do Brasileirão Série A',
			'path'   => '/embed/tabela-brasileirao',
			'tool'   => '/tabela-brasileirao-serie-a',
			'height' => 620,
			'lang'   => false,
			'group'  => 'futebol',
		),
		'jogos-brasileirao-hoje'   => array(
			'label'  => 'Jogos do Brasileirão hoje',
			'path'   => '/embed/jogos-brasileirao-hoje',
			'tool'   => '/jogos-do-brasileirao-hoje',
			'height' => 300,
			'lang'   => false,
			'group'  => 'futebol',
		),
		'jogos-copa'               => array(
			'label'  => 'Jogos da Copa do Mundo hoje',
			'path'   => '/embed/jogos-copa',
			'tool'   => '/jogos-da-copa-hoje',
			'height' => 420,
			'lang'   => false,
			'group'  => 'futebol',
		),
		// Financeiro ao vivo.
		'dolar'                    => array(
			'label'  => 'Cotação do dólar e euro hoje',
			'path'   => '/embed/dolar',
			'tool'   => '/cotacao-dolar-hoje',
			'height' => 170,
			'lang'   => true,
			'group'  => 'financeiro',
		),
		'selic-cdi'                => array(
			'label'  => 'Selic e CDI hoje',
			'path'   => '/embed/selic-cdi',
			'tool'   => '/selic-hoje',
			'height' => 170,
			'lang'   => false,
			'group'  => 'financeiro',
		),
		'ipca'                     => array(
			'label'  => 'IPCA acumulado',
			'path'   => '/embed/ipca',
			'tool'   => '/ipca-acumulado',
			'height' => 160,
			'lang'   => false,
			'group'  => 'financeiro',
		),
		'poupanca'                 => array(
			'label'  => 'Rendimento da poupança hoje',
			'path'   => '/embed/poupanca',
			'tool'   => '/poupanca-hoje',
			'height' => 180,
			'lang'   => false,
			'group'  => 'financeiro',
		),
		'bitcoin'                  => array(
			'label'  => 'Cotação do Bitcoin hoje',
			'path'   => '/embed/bitcoin',
			'tool'   => '/cotacao-bitcoin-hoje',
			'height' => 200,
			'lang'   => true,
			'group'  => 'financeiro',
		),
		'conversor-moedas'         => array(
			'label'  => 'Conversor de moedas',
			'path'   => '/embed/conversor-moedas',
			'tool'   => '/cambio',
			'height' => 280,
			'lang'   => true,
			'group'  => 'financeiro',
		),
		'indicadores'              => array(
			'label'  => 'Indicadores econômicos hoje',
			'path'   => '/embed/indicadores',
			'tool'   => '/indicadores-economicos-hoje',
			'height' => 210,
			'lang'   => false,
			'group'  => 'financeiro',
		),
		// Loterias (ultimo resultado).
		'resultado-megasena'       => array(
			'label'  => 'Resultado da Mega-Sena',
			'path'   => '/embed/resultado-megasena',
			'tool'   => '/loterias/megasena/resultado',
			'height' => 200,
			'lang'   => false,
			'group'  => 'loteria',
		),
		'resultado-quina'          => array(
			'label'  => 'Resultado da Quina',
			'path'   => '/embed/resultado-quina',
			'tool'   => '/loterias/quina/resultado',
			'height' => 200,
			'lang'   => false,
			'group'  => 'loteria',
		),
		'resultado-lotofacil'      => array(
			'label'  => 'Resultado da Lotofácil',
			'path'   => '/embed/resultado-lotofacil',
			'tool'   => '/loterias/lotofacil/resultado',
			'height' => 200,
			'lang'   => false,
			'group'  => 'loteria',
		),
		'resultado-lotomania'      => array(
			'label'  => 'Resultado da Lotomania',
			'path'   => '/embed/resultado-lotomania',
			'tool'   => '/loterias/lotomania/resultado',
			'height' => 220,
			'lang'   => false,
			'group'  => 'loteria',
		),
		'resultado-maismilionaria' => array(
			'label'  => 'Resultado da +Milionária',
			'path'   => '/embed/resultado-maismilionaria',
			'tool'   => '/loterias/maismilionaria/resultado',
			'height' => 210,
			'lang'   => false,
			'group'  => 'loteria',
		),
	);
}

/**
 * Moedas do widget generico de cotacao (whitelist par => rotulo). Espelha o
 * catalogo do portal (/embed/moeda). Par fora da lista nao renderiza.
 *
 * @return array<string,string>
 */
function vfcw_moedas() {
	return array(
		'USD-BRL'  => 'Dólar americano (USD)',
		'USD-BRLT' => 'Dólar turismo',
		'EUR-BRL'  => 'Euro (EUR)',
		'EUR-BRLT' => 'Euro turismo',
		'GBP-BRL'  => 'Libra esterlina (GBP)',
		'CHF-BRL'  => 'Franco suíço (CHF)',
		'JPY-BRL'  => 'Iene japonês (JPY)',
		'CNY-BRL'  => 'Yuan chinês (CNY)',
		'CAD-BRL'  => 'Dólar canadense (CAD)',
		'AUD-BRL'  => 'Dólar australiano (AUD)',
		'NZD-BRL'  => 'Dólar neozelandês (NZD)',
		'ARS-BRL'  => 'Peso argentino (ARS)',
		'CLP-BRL'  => 'Peso chileno (CLP)',
		'UYU-BRL'  => 'Peso uruguaio (UYU)',
		'PYG-BRL'  => 'Guarani paraguaio (PYG)',
		'BOB-BRL'  => 'Boliviano (BOB)',
		'PEN-BRL'  => 'Sol peruano (PEN)',
		'COP-BRL'  => 'Peso colombiano (COP)',
		'CRC-BRL'  => 'Colón costarriquenho (CRC)',
		'MXN-BRL'  => 'Peso mexicano (MXN)',
		'NOK-BRL'  => 'Coroa norueguesa (NOK)',
		'SEK-BRL'  => 'Coroa sueca (SEK)',
		'DKK-BRL'  => 'Coroa dinamarquesa (DKK)',
		'PLN-BRL'  => 'Zloty polonês (PLN)',
		'CZK-BRL'  => 'Coroa tcheca (CZK)',
		'HUF-BRL'  => 'Florim húngaro (HUF)',
		'RON-BRL'  => 'Leu romeno (RON)',
		'RSD-BRL'  => 'Dinar sérvio (RSD)',
		'RUB-BRL'  => 'Rublo russo (RUB)',
		'TRY-BRL'  => 'Lira turca (TRY)',
		'HKD-BRL'  => 'Dólar de Hong Kong (HKD)',
		'TWD-BRL'  => 'Novo dólar taiwanês (TWD)',
		'KRW-BRL'  => 'Won sul-coreano (KRW)',
		'SGD-BRL'  => 'Dólar de Singapura (SGD)',
		'THB-BRL'  => 'Baht tailandês (THB)',
		'PHP-BRL'  => 'Peso filipino (PHP)',
		'INR-BRL'  => 'Rupia indiana (INR)',
		'AED-BRL'  => 'Dirham dos Emirados (AED)',
		'SAR-BRL'  => 'Riyal saudita (SAR)',
		'ILS-BRL'  => 'Novo shekel israelense (ILS)',
		'EGP-BRL'  => 'Libra egípcia (EGP)',
		'ZAR-BRL'  => 'Rand sul-africano (ZAR)',
		'KES-BRL'  => 'Xelim queniano (KES)',
		'XAU-BRL'  => 'Ouro, onça troy (XAU)',
		'XAG-BRL'  => 'Prata, onça troy (XAG)',
		'BTC-BRL'  => 'Bitcoin (BTC)',
		'ETH-BRL'  => 'Ethereum (ETH)',
		'BNB-BRL'  => 'BNB (BNB)',
		'SOL-BRL'  => 'Solana (SOL)',
		'XRP-BRL'  => 'XRP (XRP)',
		'ADA-BRL'  => 'Cardano (ADA)',
		'DOGE-BRL' => 'Dogecoin (DOGE)',
		'TRX-BRL'  => 'TRON (TRX)',
		'LINK-BRL' => 'Chainlink (LINK)',
		'DOT-BRL'  => 'Polkadot (DOT)',
		'LTC-BRL'  => 'Litecoin (LTC)',
	);
}

/** Larguras suportadas (id => max-width px; 0 = 100%). */
function vfcw_larguras() {
	return array(
		'compacto' => 320,
		'padrao'   => 420,
		'largo'    => 640,
		'total'    => 0,
	);
}

/**
 * Resolve a definicao do widget a partir dos atributos (whitelist + tipo
 * "calculadora" com slug sanitizado). Retorna null se invalido.
 *
 * @param array $a Atributos ja recebidos.
 * @return array{label:string,path:string,tool:string,height:int,lang:bool}|null
 */
function vfcw_resolver( $a ) {
	$key = isset( $a['widget'] ) ? sanitize_key( (string) $a['widget'] ) : '';

	if ( 'calculadora' === $key ) {
		$slug = isset( $a['slug'] ) ? sanitize_key( (string) $a['slug'] ) : '';
		if ( '' === $slug ) {
			return null;
		}
		$rotulo = isset( $a['titulo_texto'] ) && '' !== $a['titulo_texto']
			? sanitize_text_field( (string) $a['titulo_texto'] )
			: __( 'Calculadora ValorFinal', 'valorfinal-calculadoras-widgets' );
		return array(
			'label'  => $rotulo,
			'path'   => '/embed/calculadora/' . $slug,
			'tool'   => '/' . $slug,
			'height' => 420,
			'lang'   => false,
		);
	}

	if ( 'moeda' === $key ) {
		$par    = isset( $a['par'] ) ? strtoupper( sanitize_text_field( (string) $a['par'] ) ) : '';
		$moedas = vfcw_moedas();
		if ( ! isset( $moedas[ $par ] ) ) {
			$par = 'USD-BRL'; // par invalido/ausente cai no dolar (mesmo default do portal).
		}
		return array(
			'label'  => sprintf(
				/* translators: %s: nome da moeda (ex.: Euro). */
				__( 'Cotação de hoje: %s', 'valorfinal-calculadoras-widgets' ),
				$moedas[ $par ]
			),
			'path'   => '/embed/moeda',
			'tool'   => '/cambio',
			'height' => 170,
			'lang'   => true,
			'extra'  => array( 'par' => $par ),
		);
	}

	$catalog = vfcw_catalog();
	if ( isset( $catalog[ $key ] ) ) {
		$w = $catalog[ $key ];
		return array(
			'label'  => $w['label'],
			'path'   => $w['path'],
			'tool'   => $w['tool'],
			'height' => (int) $w['height'],
			'lang'   => (bool) $w['lang'],
		);
	}

	return null;
}

/**
 * BUILDER SEGURO: devolve o HTML do widget (iframe + atribuicao opcional) a partir
 * de atributos nao confiaveis. Tudo sanitizado/escapado. Fonte unica de verdade.
 *
 * @param array $a Atributos (widget, slug, tema, cor, largura, altura, idioma, titulo, credito, titulo_texto).
 * @return string HTML seguro (ou string vazia se o widget for invalido).
 */
function vfcw_render( $a ) {
	$def = vfcw_resolver( is_array( $a ) ? $a : array() );
	if ( null === $def ) {
		return '';
	}

	// Tema (enum).
	$tema = ( isset( $a['tema'] ) && 'dark' === $a['tema'] ) ? 'dark' : 'light';

	// Cor de destaque: hex validado pelo WP; vazio se invalido; ignora se = default.
	$accent = '';
	if ( ! empty( $a['cor'] ) ) {
		$hex = sanitize_hex_color( (string) $a['cor'] );
		if ( $hex && strtolower( $hex ) !== VFCW_ACCENT_DEFAULT ) {
			$accent = $hex;
		}
	}

	// Titulo: ligado por padrao (faz parte do conteudo do widget).
	$mostrar_titulo = ! vfcw_is_falsy( isset( $a['titulo'] ) ? $a['titulo'] : true );
	// Credito/atribuicao: OPT-IN (DESLIGADO por padrao) - Diretriz 10 do WordPress.org
	// exige que links de credito nao apareçam por padrao no site do usuario.
	$mostrar_credito = isset( $a['credito'] ) ? ! vfcw_is_falsy( $a['credito'] ) : false;

	// Idioma (so widgets universais; enum).
	$lang = ( $def['lang'] && isset( $a['idioma'] ) && 'en' === $a['idioma'] ) ? 'en' : 'pt';

	// Altura: usa o default do catalogo; override numerico com teto de seguranca.
	$altura = $def['height'];
	if ( isset( $a['altura'] ) ) {
		$h = absint( $a['altura'] );
		if ( $h >= 80 && $h <= 2000 ) {
			$altura = $h;
		}
	}

	// Largura (enum -> max-width).
	$larguras   = vfcw_larguras();
	$largura_id = ( isset( $a['largura'] ) && isset( $larguras[ $a['largura'] ] ) ) ? $a['largura'] : 'padrao';
	$maxw       = (int) $larguras[ $largura_id ];

	// Query string (so o que difere do default; espelha o buildEmbedQuery do portal).
	// Parametros proprios do widget (ex.: par da moeda) entram sempre, ja validados
	// pelo resolver contra a whitelist.
	$q = array();
	if ( ! empty( $def['extra'] ) && is_array( $def['extra'] ) ) {
		$q = $def['extra'];
	}
	if ( 'dark' === $tema ) {
		$q['theme'] = 'dark';
	}
	if ( '' !== $accent ) {
		$q['accent'] = $accent;
	}
	if ( ! $mostrar_titulo ) {
		$q['titulo'] = '0';
	}
	if ( 'en' === $lang ) {
		$q['lang'] = 'en';
	}
	$qs = empty( $q ) ? '' : '?' . http_build_query( $q );

	$src      = VFCW_BASE . $def['path'] . $qs;
	$tool_url = add_query_arg(
		array(
			'utm_source'   => 'embed',
			'utm_medium'   => 'widget',
			'utm_campaign' => ltrim( $def['path'], '/' ),
		),
		VFCW_BASE . $def['tool']
	);

	$style = $maxw > 0
		? 'border:0;max-width:' . $maxw . 'px;width:100%'
		: 'border:0;width:100%';

	// Garante o script de auto-altura na pagina (uma vez).
	vfcw_enqueue_autoheight();

	$html  = '<iframe src="' . esc_url( $src ) . '"';
	$html .= ' title="' . esc_attr( $def['label'] . ' - ValorFinal' ) . '"';
	$html .= ' data-valorfinal-embed loading="lazy" width="100%" height="' . absint( $altura ) . '"';
	$html .= ' style="' . esc_attr( $style ) . '"></iframe>';

	// Credito OPCIONAL (opt-in: `credito="1"`). O link sai com rel="nofollow"
	// porque este `<a>` fica hospedado no site de quem instala o plugin: link
	// embutido em widget distribuido nao pode transmitir autoridade de busca,
	// senao vira esquema de links aos olhos do Google. `noopener` continua por
	// seguranca (o link abre em nova aba). Ver lib/embed/atribuicao.ts no site.
	if ( $mostrar_credito ) {
		$html .= '<p style="font:13px sans-serif;margin:6px 0 0">'
			. esc_html( $def['label'] ) . ' '
			. esc_html__( 'por', 'valorfinal-calculadoras-widgets' ) . ' '
			. '<a href="' . esc_url( $tool_url ) . '" target="_blank" rel="nofollow noopener">ValorFinal</a></p>';
	}

	return $html;
}

/**
 * Interpreta "0"/false/"nao"/"no"/"off" como falso (para atributos de texto).
 *
 * @param mixed $v Valor a interpretar.
 * @return bool Verdadeiro se o valor representa "desligado".
 */
function vfcw_is_falsy( $v ) {
	if ( is_bool( $v ) ) {
		return ! $v;
	}
	$s = strtolower( trim( (string) $v ) );
	return in_array( $s, array( '0', 'false', 'nao', 'não', 'no', 'off', '' ), true );
}

/**
 * "1"/true/"sim"/"on"/"yes" => verdadeiro (para atributos de texto).
 *
 * @param mixed $v Valor a interpretar.
 * @return bool Verdadeiro se o valor representa "ligado".
 */
function vfcw_is_truthy( $v ) {
	if ( is_bool( $v ) ) {
		return $v;
	}
	return in_array( strtolower( trim( (string) $v ) ), array( '1', 'true', 'sim', 'on', 'yes' ), true );
}

/** Enfileira o script de auto-altura (registrado no bootstrap). */
function vfcw_enqueue_autoheight() {
	if ( wp_script_is( 'valorfinal-embed', 'registered' ) ) {
		wp_enqueue_script( 'valorfinal-embed' );
	}
}
