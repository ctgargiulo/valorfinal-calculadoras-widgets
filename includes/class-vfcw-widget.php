<?php
/**
 * Widget classico (Aparencia > Widgets / blocos legados) do ValorFinal.
 *
 * O formulario do admin usa o nonce nativo dos widgets do WordPress; update()
 * sanitiza cada campo e widget() ecoa a saida JA escapada por vfcw_render().
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Widget "ValorFinal".
 */
class VFCW_Widget extends WP_Widget {

	/**
	 * Registra o widget (id, nome e descricao).
	 */
	public function __construct() {
		parent::__construct(
			'vfcw_widget',
			__( 'ValorFinal: widget', 'valorfinal-calculadoras-widgets' ),
			array(
				'description' => __( 'Tabela do Brasileirao, cotacao do dolar, Selic e mais widgets ao vivo do ValorFinal.', 'valorfinal-calculadoras-widgets' ),
				'classname'   => 'vfcw-widget',
			)
		);
	}

	/**
	 * Saida do widget no front-end.
	 *
	 * @param array $args     Argumentos do tema (before/after widget e title).
	 * @param array $instance Configuracao salva.
	 */
	public function widget( $args, $instance ) {
		$html = vfcw_render(
			array(
				'widget'  => isset( $instance['widget'] ) ? $instance['widget'] : '',
				'slug'    => isset( $instance['slug'] ) ? $instance['slug'] : '',
				'tema'    => isset( $instance['tema'] ) ? $instance['tema'] : 'light',
				'cor'     => isset( $instance['cor'] ) ? $instance['cor'] : '',
				'largura' => isset( $instance['largura'] ) ? $instance['largura'] : 'padrao',
				'titulo'  => isset( $instance['titulo'] ) ? $instance['titulo'] : '1',
				'credito' => isset( $instance['credito'] ) ? $instance['credito'] : '0',
			)
		);

		if ( '' === $html ) {
			return;
		}

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- markup do tema.
		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- vfcw_render() ja escapa toda a saida.
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- markup do tema.
	}

	/**
	 * Formulario de configuracao no admin.
	 *
	 * @param array $instance Configuracao atual.
	 */
	public function form( $instance ) {
		$widget  = isset( $instance['widget'] ) ? sanitize_key( $instance['widget'] ) : 'tabela-brasileirao';
		$slug    = isset( $instance['slug'] ) ? sanitize_key( $instance['slug'] ) : '';
		$tema    = isset( $instance['tema'] ) && 'dark' === $instance['tema'] ? 'dark' : 'light';
		$cor     = isset( $instance['cor'] ) ? sanitize_hex_color( $instance['cor'] ) : '';
		$largura = isset( $instance['largura'] ) ? sanitize_key( $instance['largura'] ) : 'padrao';
		$titulo  = ! isset( $instance['titulo'] ) || vfcw_is_truthy( $instance['titulo'] );
		$credito = isset( $instance['credito'] ) && vfcw_is_truthy( $instance['credito'] );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'widget' ) ); ?>"><?php esc_html_e( 'Widget', 'valorfinal-calculadoras-widgets' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'widget' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget' ) ); ?>">
				<?php foreach ( vfcw_catalog() as $key => $w ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $widget, $key ); ?>><?php echo esc_html( $w['label'] ); ?></option>
				<?php endforeach; ?>
				<option value="calculadora" <?php selected( $widget, 'calculadora' ); ?>><?php esc_html_e( 'Calculadora (informe o slug abaixo)', 'valorfinal-calculadoras-widgets' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'slug' ) ); ?>"><?php esc_html_e( 'Slug da calculadora (so para o item "Calculadora")', 'valorfinal-calculadoras-widgets' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'slug' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slug' ) ); ?>" value="<?php echo esc_attr( $slug ); ?>" placeholder="calculadora-rescisao-clt" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tema' ) ); ?>"><?php esc_html_e( 'Tema', 'valorfinal-calculadoras-widgets' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tema' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tema' ) ); ?>">
				<option value="light" <?php selected( $tema, 'light' ); ?>><?php esc_html_e( 'Claro', 'valorfinal-calculadoras-widgets' ); ?></option>
				<option value="dark" <?php selected( $tema, 'dark' ); ?>><?php esc_html_e( 'Escuro', 'valorfinal-calculadoras-widgets' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cor' ) ); ?>"><?php esc_html_e( 'Cor de destaque', 'valorfinal-calculadoras-widgets' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'cor' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cor' ) ); ?>" value="<?php echo esc_attr( $cor ? $cor : '' ); ?>" placeholder="#2563eb" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'largura' ) ); ?>"><?php esc_html_e( 'Largura', 'valorfinal-calculadoras-widgets' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'largura' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'largura' ) ); ?>">
				<?php
				$rotulos = array(
					'compacto' => __( 'Compacto', 'valorfinal-calculadoras-widgets' ),
					'padrao'   => __( 'Padrao', 'valorfinal-calculadoras-widgets' ),
					'largo'    => __( 'Largo', 'valorfinal-calculadoras-widgets' ),
					'total'    => __( 'Total (100%)', 'valorfinal-calculadoras-widgets' ),
				);
				foreach ( $rotulos as $id => $rot ) :
					?>
					<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $largura, $id ); ?>><?php echo esc_html( $rot ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'titulo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'titulo' ) ); ?>" value="1" <?php checked( $titulo ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'titulo' ) ); ?>"><?php esc_html_e( 'Mostrar titulo', 'valorfinal-calculadoras-widgets' ); ?></label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'credito' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'credito' ) ); ?>" value="1" <?php checked( $credito ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'credito' ) ); ?>"><?php esc_html_e( 'Exibir um credito ao ValorFinal (opcional). Ajuda muito o ValorFinal a continuar distribuindo os widgets de graca.', 'valorfinal-calculadoras-widgets' ); ?></label>
		</p>
		<?php
	}

	/**
	 * Sanitiza e salva a configuracao.
	 *
	 * @param array $new_instance Novo input (nao confiavel).
	 * @param array $old_instance Configuracao anterior.
	 * @return array Configuracao saneada.
	 */
	public function update( $new_instance, $old_instance ) {
		$out            = array();
		$out['widget']  = isset( $new_instance['widget'] ) ? sanitize_key( $new_instance['widget'] ) : '';
		$out['slug']    = isset( $new_instance['slug'] ) ? sanitize_key( $new_instance['slug'] ) : '';
		$out['tema']    = ( isset( $new_instance['tema'] ) && 'dark' === $new_instance['tema'] ) ? 'dark' : 'light';
		$cor            = isset( $new_instance['cor'] ) ? sanitize_hex_color( $new_instance['cor'] ) : '';
		$out['cor']     = $cor ? $cor : '';
		$larguras       = vfcw_larguras();
		$out['largura'] = ( isset( $new_instance['largura'] ) && isset( $larguras[ $new_instance['largura'] ] ) ) ? $new_instance['largura'] : 'padrao';
		$out['titulo']  = empty( $new_instance['titulo'] ) ? '0' : '1';
		$out['credito'] = empty( $new_instance['credito'] ) ? '0' : '1';
		return $out;
	}
}
