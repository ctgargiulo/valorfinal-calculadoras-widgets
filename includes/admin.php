<?php
/**
 * Vitrine dos widgets no painel do WordPress.
 *
 * POR QUE ESTA TELA EXISTE
 * Ate a versao 1.4.1 o plugin nao mostrava nada depois de ativado: quem
 * instalava precisava adivinhar que existe um bloco chamado "ValorFinal: widget"
 * no editor, ou sair do WordPress para ler a documentacao. O gesto que funciona
 * no portal e outro, e ja esta provado na /embed publica: ver o widget rodando,
 * ajustar duas coisas e copiar o codigo. Esta pagina traz esse gesto para dentro
 * do painel.
 *
 * DESENHO
 * Duas colunas. A esquerda tem a busca e a lista completa (widgets ao vivo,
 * cotacoes de moeda e as calculadoras, agrupadas por categoria). A direita tem o
 * palco: preview ao vivo, os controles de aparencia e o codigo pronto para
 * copiar, em shortcode e em iframe.
 *
 * FONTE UNICA DE VERDADE
 * O preview NAO e montado no JavaScript. Ele vem de vfcw_render(), o mesmo
 * builder que serve o shortcode, o bloco e o widget classico. Por isso o que
 * aparece no palco e exatamente o que vai para o ar, incluindo o rel="nofollow"
 * do credito. Duplicar a montagem aqui seria criar uma segunda verdade que
 * envelheceria sozinha.
 *
 * PRIVACIDADE
 * Nenhuma coleta, nenhuma opcao gravada no banco, nenhuma chamada externa a
 * partir do PHP. A unica conexao com valorfinal.com.br e o proprio iframe do
 * preview, que e o produto.
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Slug da pagina no menu do painel. */
const VFCW_ADMIN_SLUG = 'valorfinal-widgets';

/** Capacidade exigida. `edit_posts` cobre autor e editor, nao so administrador. */
const VFCW_ADMIN_CAP = 'edit_posts';

/**
 * Registra a vitrine como item de primeiro nivel do menu lateral.
 */
function vfcw_admin_menu() {
	add_menu_page(
		__( 'Widgets do ValorFinal', 'valorfinal-calculadoras-widgets' ),
		__( 'ValorFinal', 'valorfinal-calculadoras-widgets' ),
		VFCW_ADMIN_CAP,
		VFCW_ADMIN_SLUG,
		'vfcw_admin_page',
		'dashicons-chart-line'
	);
}
add_action( 'admin_menu', 'vfcw_admin_menu' );

/**
 * Rotulos dos grupos de widgets ao vivo (a chave vem do campo `group` do catalogo).
 *
 * @return array<string,string> Chave do grupo => titulo exibido.
 */
function vfcw_admin_grupos() {
	return array(
		'futebol'    => __( 'Futebol ao vivo', 'valorfinal-calculadoras-widgets' ),
		'financeiro' => __( 'Economia e cotações', 'valorfinal-calculadoras-widgets' ),
		'loteria'    => __( 'Resultados das loterias', 'valorfinal-calculadoras-widgets' ),
		'outros'     => __( 'Outros widgets ao vivo', 'valorfinal-calculadoras-widgets' ),
	);
}

/**
 * Monta o catalogo que a vitrine consome, na ordem em que aparece na lista.
 *
 * Cada item traz o `valor` no mesmo formato do bloco (chave pura para o
 * catalogo, `moeda:<PAR>` e `calc:<slug>`), para que as duas telas falem a mesma
 * lingua e um copiar/colar entre elas continue valendo.
 *
 * @return array<int,array<string,mixed>> Lista de grupos com seus itens.
 */
function vfcw_admin_catalogo() {
	$grupos  = vfcw_admin_grupos();
	$por_key = array();

	foreach ( vfcw_catalog() as $chave => $w ) {
		$g = isset( $w['group'] ) ? $w['group'] : 'outros';
		if ( ! isset( $por_key[ $g ] ) ) {
			$por_key[ $g ] = array();
		}
		$por_key[ $g ][] = array(
			'valor'  => $chave,
			'rotulo' => $w['label'],
			'lang'   => ! empty( $w['lang'] ),
			'moeda'  => false,
		);
	}

	$saida = array();
	foreach ( $grupos as $chave => $titulo ) {
		if ( ! empty( $por_key[ $chave ] ) ) {
			$saida[] = array(
				'titulo' => $titulo,
				'itens'  => $por_key[ $chave ],
			);
		}
	}

	// Cotacoes de moeda: um item por par, todos no mesmo widget `moeda`.
	$moedas = array();
	foreach ( vfcw_moedas() as $par => $nome ) {
		$moedas[] = array(
			'valor'  => 'moeda:' . $par,
			'rotulo' => $nome,
			'lang'   => true,
			'moeda'  => true,
		);
	}
	$saida[] = array(
		'titulo' => __( 'Cotações de moedas', 'valorfinal-calculadoras-widgets' ),
		'itens'  => $moedas,
	);

	// Calculadoras, agrupadas pela categoria do portal.
	$por_cat = array();
	foreach ( vfcw_calculadoras() as $c ) {
		$cat = isset( $c['cat'] ) ? $c['cat'] : __( 'Outras', 'valorfinal-calculadoras-widgets' );
		if ( ! isset( $por_cat[ $cat ] ) ) {
			$por_cat[ $cat ] = array();
		}
		$por_cat[ $cat ][] = array(
			'valor'  => 'calc:' . $c['slug'],
			'rotulo' => $c['label'],
			'lang'   => false,
			'moeda'  => false,
		);
	}
	ksort( $por_cat );
	foreach ( $por_cat as $cat => $itens ) {
		$saida[] = array(
			'titulo' => $cat,
			'itens'  => $itens,
		);
	}

	return $saida;
}

/**
 * Traduz o `valor` da lista para os atributos que vfcw_render() entende.
 *
 * @param string $valor Valor do item ('dolar', 'moeda:EUR-BRL', 'calc:slug').
 * @return array<string,string> Atributos widget/slug/par.
 */
function vfcw_admin_alvo( $valor ) {
	$valor = (string) $valor;

	if ( 0 === strpos( $valor, 'calc:' ) ) {
		return array(
			'widget' => 'calculadora',
			'slug'   => substr( $valor, 5 ),
			'par'    => '',
		);
	}
	if ( 0 === strpos( $valor, 'moeda:' ) ) {
		return array(
			'widget' => 'moeda',
			'slug'   => '',
			'par'    => substr( $valor, 6 ),
		);
	}
	return array(
		'widget' => $valor,
		'slug'   => '',
		'par'    => '',
	);
}

/**
 * Monta o shortcode equivalente aos atributos escolhidos.
 *
 * So escreve o que difere do padrao, para o codigo copiado ficar curto e legivel.
 * Os valores ja passaram pela mesma normalizacao de vfcw_render().
 *
 * @param array<string,mixed> $a Atributos normalizados.
 * @return string Shortcode pronto, ex.: [valorfinal widget="dolar" tema="dark"].
 */
function vfcw_admin_shortcode( $a ) {
	$partes = array( 'widget="' . $a['widget'] . '"' );

	if ( 'calculadora' === $a['widget'] && '' !== $a['slug'] ) {
		$partes[] = 'slug="' . $a['slug'] . '"';
	}
	if ( 'moeda' === $a['widget'] && '' !== $a['par'] ) {
		$partes[] = 'par="' . $a['par'] . '"';
	}
	if ( 'dark' === $a['tema'] ) {
		$partes[] = 'tema="dark"';
	}
	if ( '' !== $a['cor'] ) {
		$partes[] = 'cor="' . $a['cor'] . '"';
	}
	if ( 'padrao' !== $a['largura'] ) {
		$partes[] = 'largura="' . $a['largura'] . '"';
	}
	if ( 'en' === $a['idioma'] ) {
		$partes[] = 'idioma="en"';
	}
	if ( ! $a['titulo'] ) {
		$partes[] = 'titulo="0"';
	}
	if ( $a['credito'] ) {
		$partes[] = 'credito="1"';
	}

	return '[valorfinal ' . implode( ' ', $partes ) . ']';
}

/**
 * Le e normaliza os atributos que chegam do palco, sem confiar em nada.
 *
 * A validacao pesada continua dentro de vfcw_render(); aqui garantimos apenas
 * que o shortcode impresso na tela corresponde ao que foi renderizado.
 *
 * @param array<string,mixed> $bruto Dados crus da requisicao.
 * @return array<string,mixed> Atributos normalizados.
 */
function vfcw_admin_normalizar( $bruto ) {
	$alvo     = vfcw_admin_alvo( isset( $bruto['valor'] ) ? $bruto['valor'] : '' );
	$larguras = vfcw_larguras();

	$cor = '';
	if ( ! empty( $bruto['cor'] ) ) {
		$hex = sanitize_hex_color( (string) $bruto['cor'] );
		if ( $hex && strtolower( $hex ) !== VFCW_ACCENT_DEFAULT ) {
			$cor = $hex;
		}
	}

	$largura = isset( $bruto['largura'] ) ? sanitize_key( (string) $bruto['largura'] ) : 'padrao';
	if ( ! isset( $larguras[ $largura ] ) ) {
		$largura = 'padrao';
	}

	return array(
		'widget'  => sanitize_key( $alvo['widget'] ),
		'slug'    => sanitize_key( $alvo['slug'] ),
		'par'     => strtoupper( sanitize_text_field( $alvo['par'] ) ),
		'tema'    => ( isset( $bruto['tema'] ) && 'dark' === $bruto['tema'] ) ? 'dark' : 'light',
		'cor'     => $cor,
		'largura' => $largura,
		'idioma'  => ( isset( $bruto['idioma'] ) && 'en' === $bruto['idioma'] ) ? 'en' : 'pt',
		'titulo'  => ! isset( $bruto['titulo'] ) || vfcw_is_truthy( $bruto['titulo'] ),
		'credito' => isset( $bruto['credito'] ) && vfcw_is_truthy( $bruto['credito'] ),
	);
}

/**
 * Endpoint do preview. Devolve o HTML renderizado pelo builder oficial mais os
 * dois formatos de codigo para copiar.
 */
function vfcw_admin_ajax_preview() {
	check_ajax_referer( 'vfcw_preview', 'nonce' );

	if ( ! current_user_can( VFCW_ADMIN_CAP ) ) {
		wp_send_json_error( array( 'mensagem' => __( 'Sem permissão.', 'valorfinal-calculadoras-widgets' ) ), 403 );
	}

	$bruto = array(
		'valor'   => isset( $_POST['valor'] ) ? sanitize_text_field( wp_unslash( $_POST['valor'] ) ) : '',
		'tema'    => isset( $_POST['tema'] ) ? sanitize_text_field( wp_unslash( $_POST['tema'] ) ) : 'light',
		'cor'     => isset( $_POST['cor'] ) ? sanitize_text_field( wp_unslash( $_POST['cor'] ) ) : '',
		'largura' => isset( $_POST['largura'] ) ? sanitize_text_field( wp_unslash( $_POST['largura'] ) ) : 'padrao',
		'idioma'  => isset( $_POST['idioma'] ) ? sanitize_text_field( wp_unslash( $_POST['idioma'] ) ) : 'pt',
		'titulo'  => isset( $_POST['titulo'] ) ? sanitize_text_field( wp_unslash( $_POST['titulo'] ) ) : '1',
		'credito' => isset( $_POST['credito'] ) ? sanitize_text_field( wp_unslash( $_POST['credito'] ) ) : '0',
	);

	$a    = vfcw_admin_normalizar( $bruto );
	$html = vfcw_render(
		array(
			'widget'  => $a['widget'],
			'slug'    => $a['slug'],
			'par'     => $a['par'],
			'tema'    => $a['tema'],
			'cor'     => $a['cor'],
			'largura' => $a['largura'],
			'idioma'  => $a['idioma'],
			'titulo'  => $a['titulo'] ? '1' : '0',
			'credito' => $a['credito'] ? '1' : '0',
		)
	);

	if ( '' === $html ) {
		wp_send_json_error( array( 'mensagem' => __( 'Widget não encontrado. Escolha outro na lista.', 'valorfinal-calculadoras-widgets' ) ), 404 );
	}

	wp_send_json_success(
		array(
			'html'      => $html,
			'shortcode' => vfcw_admin_shortcode( $a ),
			'iframe'    => $html,
		)
	);
}
add_action( 'wp_ajax_vfcw_preview', 'vfcw_admin_ajax_preview' );

/**
 * Carrega os arquivos da vitrine, e apenas nela.
 *
 * @param string $hook Identificador da tela atual.
 */
function vfcw_admin_enqueue( $hook ) {
	if ( 'toplevel_page_' . VFCW_ADMIN_SLUG !== $hook ) {
		return;
	}

	wp_enqueue_style(
		'vfcw-admin',
		VFCW_URL . 'assets/css/vfcw-admin.css',
		array(),
		VFCW_VERSION
	);

	// O mesmo script de auto-altura do front-end: o preview cresce junto com o
	// conteudo do widget, em vez de ficar cortado numa altura chutada.
	vfcw_enqueue_autoheight();

	wp_enqueue_script(
		'vfcw-admin',
		VFCW_URL . 'assets/js/vfcw-admin.js',
		array(),
		VFCW_VERSION,
		true
	);

	// wp_add_inline_script em vez de wp_localize_script de proposito: o localize
	// converte os escalares do primeiro nivel em string e passa o texto por
	// html_entity_decode. Aqui ha booleano (`lang`) e numero (contagem), e o JSON
	// precisa chegar com os tipos intactos.
	wp_add_inline_script(
		'vfcw-admin',
		'window.VFCW_ADMIN = ' . wp_json_encode(
			array(
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'vfcw_preview' ),
				'accent'   => VFCW_ACCENT_DEFAULT,
				'grupos'   => vfcw_admin_catalogo(),
				'inicial'  => 'dolar',
				'larguras' => array(
					array(
						'valor'  => 'compacto',
						'rotulo' => __( 'Compacta (320 px)', 'valorfinal-calculadoras-widgets' ),
					),
					array(
						'valor'  => 'padrao',
						'rotulo' => __( 'Padrão (420 px)', 'valorfinal-calculadoras-widgets' ),
					),
					array(
						'valor'  => 'largo',
						'rotulo' => __( 'Larga (640 px)', 'valorfinal-calculadoras-widgets' ),
					),
					array(
						'valor'  => 'total',
						'rotulo' => __( 'Ocupa toda a coluna', 'valorfinal-calculadoras-widgets' ),
					),
				),
				'i18n'     => array(
					'carregando'  => __( 'Carregando o preview...', 'valorfinal-calculadoras-widgets' ),
					'erro'        => __( 'Não deu para carregar o preview. Tente de novo.', 'valorfinal-calculadoras-widgets' ),
					'copiado'     => __( 'Copiado!', 'valorfinal-calculadoras-widgets' ),
					'copiarFalha' => __( 'Não deu para copiar. Selecione o texto e use Ctrl+C.', 'valorfinal-calculadoras-widgets' ),
					'vazio'       => __( 'Nenhum widget com esse nome.', 'valorfinal-calculadoras-widgets' ),
					/* translators: %d: quantidade de widgets que casaram com a busca. */
					'resultados'  => __( '%d itens encontrados', 'valorfinal-calculadoras-widgets' ),
				),
			)
		) . ';',
		'before'
	);
}
add_action( 'admin_enqueue_scripts', 'vfcw_admin_enqueue' );

/**
 * Casca da vitrine. A lista e o palco sao preenchidos pelo JavaScript, que fala
 * com vfcw_admin_ajax_preview() para nunca montar HTML por conta propria.
 */
function vfcw_admin_page() {
	if ( ! current_user_can( VFCW_ADMIN_CAP ) ) {
		wp_die( esc_html__( 'Sem permissão para ver esta página.', 'valorfinal-calculadoras-widgets' ) );
	}
	?>
	<div class="wrap vfcw-wrap">
		<h1 class="vfcw-titulo">
			<?php esc_html_e( 'Widgets do ValorFinal', 'valorfinal-calculadoras-widgets' ); ?>
			<a class="vfcw-ajuda" href="https://valorfinal.com.br/embed/wordpress" target="_blank" rel="noopener">
				<?php esc_html_e( 'Como usar', 'valorfinal-calculadoras-widgets' ); ?>
			</a>
		</h1>
		<p class="vfcw-intro">
			<?php esc_html_e( 'Escolha um widget na lista, ajuste a aparência e copie o código. Os dados se atualizam sozinhos no seu site, sem cadastro e sem custo.', 'valorfinal-calculadoras-widgets' ); ?>
		</p>

		<div class="vfcw-colunas">
			<div class="vfcw-lista">
				<label class="screen-reader-text" for="vfcw-busca">
					<?php esc_html_e( 'Buscar widget', 'valorfinal-calculadoras-widgets' ); ?>
				</label>
				<input
					type="search"
					id="vfcw-busca"
					class="vfcw-busca"
					autocomplete="off"
					placeholder="<?php esc_attr_e( 'Buscar: dólar, Brasileirão, rescisão...', 'valorfinal-calculadoras-widgets' ); ?>"
				/>
				<p class="vfcw-contagem" id="vfcw-contagem" aria-live="polite"></p>
				<div class="vfcw-itens" id="vfcw-itens" role="listbox" aria-label="<?php esc_attr_e( 'Widgets disponíveis', 'valorfinal-calculadoras-widgets' ); ?>"></div>
			</div>

			<div class="vfcw-palco">
				<h2 class="vfcw-palco-titulo" id="vfcw-escolhido"></h2>

				<div class="vfcw-preview" id="vfcw-preview" aria-live="polite"></div>

				<div class="vfcw-controles">
					<p class="vfcw-campo">
						<span class="vfcw-rotulo"><?php esc_html_e( 'Tema', 'valorfinal-calculadoras-widgets' ); ?></span>
						<label><input type="radio" name="vfcw-tema" value="light" checked /> <?php esc_html_e( 'Claro', 'valorfinal-calculadoras-widgets' ); ?></label>
						<label><input type="radio" name="vfcw-tema" value="dark" /> <?php esc_html_e( 'Escuro', 'valorfinal-calculadoras-widgets' ); ?></label>
					</p>

					<p class="vfcw-campo">
						<label class="vfcw-rotulo" for="vfcw-cor"><?php esc_html_e( 'Cor de destaque', 'valorfinal-calculadoras-widgets' ); ?></label>
						<input type="color" id="vfcw-cor" value="<?php echo esc_attr( VFCW_ACCENT_DEFAULT ); ?>" />
						<button type="button" class="button-link vfcw-reset-cor"><?php esc_html_e( 'usar a cor padrão', 'valorfinal-calculadoras-widgets' ); ?></button>
					</p>

					<p class="vfcw-campo">
						<label class="vfcw-rotulo" for="vfcw-largura"><?php esc_html_e( 'Largura', 'valorfinal-calculadoras-widgets' ); ?></label>
						<select id="vfcw-largura"></select>
					</p>

					<p class="vfcw-campo vfcw-idioma" id="vfcw-campo-idioma" hidden>
						<label class="vfcw-rotulo" for="vfcw-idioma"><?php esc_html_e( 'Idioma', 'valorfinal-calculadoras-widgets' ); ?></label>
						<select id="vfcw-idioma">
							<option value="pt"><?php esc_html_e( 'Português', 'valorfinal-calculadoras-widgets' ); ?></option>
							<option value="en"><?php esc_html_e( 'Inglês', 'valorfinal-calculadoras-widgets' ); ?></option>
						</select>
					</p>

					<p class="vfcw-campo">
						<label><input type="checkbox" id="vfcw-titulo" checked /> <?php esc_html_e( 'Mostrar o título dentro do widget', 'valorfinal-calculadoras-widgets' ); ?></label>
					</p>

					<p class="vfcw-campo">
						<label><input type="checkbox" id="vfcw-credito" /> <?php esc_html_e( 'Incluir a linha de crédito ao ValorFinal', 'valorfinal-calculadoras-widgets' ); ?></label>
						<span class="vfcw-dica">
							<?php esc_html_e( 'Opcional. O link sai com rel="nofollow", ou seja, não transfere autoridade de busca para a gente.', 'valorfinal-calculadoras-widgets' ); ?>
						</span>
					</p>
				</div>

				<div class="vfcw-codigos">
					<div class="vfcw-codigo">
						<label class="vfcw-rotulo" for="vfcw-shortcode"><?php esc_html_e( 'Shortcode (jeito mais simples)', 'valorfinal-calculadoras-widgets' ); ?></label>
						<textarea id="vfcw-shortcode" rows="2" readonly onfocus="this.select()"></textarea>
						<button type="button" class="button button-primary vfcw-copiar" data-alvo="vfcw-shortcode">
							<?php esc_html_e( 'Copiar shortcode', 'valorfinal-calculadoras-widgets' ); ?>
						</button>
						<span class="vfcw-aviso" data-aviso="vfcw-shortcode" aria-live="polite"></span>
					</div>

					<div class="vfcw-codigo">
						<label class="vfcw-rotulo" for="vfcw-iframe"><?php esc_html_e( 'HTML com iframe (para colar fora do WordPress)', 'valorfinal-calculadoras-widgets' ); ?></label>
						<textarea id="vfcw-iframe" rows="4" readonly onfocus="this.select()"></textarea>
						<button type="button" class="button vfcw-copiar" data-alvo="vfcw-iframe">
							<?php esc_html_e( 'Copiar HTML', 'valorfinal-calculadoras-widgets' ); ?>
						</button>
						<span class="vfcw-aviso" data-aviso="vfcw-iframe" aria-live="polite"></span>
					</div>
				</div>

				<p class="vfcw-onde">
					<?php esc_html_e( 'Onde colar o shortcode: em qualquer post ou página, num bloco de shortcode. No editor de blocos você também pode procurar pelo bloco "ValorFinal: widget", que tem os mesmos ajustes desta tela.', 'valorfinal-calculadoras-widgets' ); ?>
				</p>
			</div>
		</div>
	</div>
	<?php
}
