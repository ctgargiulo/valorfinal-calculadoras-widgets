/**
 * Editor do bloco "ValorFinal: widget" - buildless (sem JSX, sem bundler).
 *
 * Usa as libs do proprio WordPress (wp.element, wp.blockEditor, wp.components,
 * wp.serverSideRender). O preview e renderizado pelo SERVIDOR (mesmo builder
 * seguro do front-end), entao o editor mostra exatamente o que sai publicado.
 *
 * O seletor de widget e PESQUISAVEL (ComboboxControl): lista os widgets ao vivo
 * e todas as calculadoras embedaveis. Sem coleta de dados, sem chamadas externas.
 */
( function ( wp ) {
	'use strict';

	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var registerBlockType = wp.blocks.registerBlockType;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var c = wp.components;
	var ServerSideRender = wp.serverSideRender;

	var DADOS = window.VFCW_DATA || { live: [], calcs: [] };
	// Opcoes do seletor: widgets ao vivo primeiro, depois as calculadoras.
	var OPCOES = ( DADOS.live || [] ).concat( DADOS.calcs || [] );

	// Valor atual do combobox a partir dos atributos.
	function valorAtual( a ) {
		return 'calculadora' === a.widget ? 'calc:' + ( a.slug || '' ) : a.widget;
	}

	registerBlockType( 'valorfinal/widget', {
		edit: function ( props ) {
			var a = props.attributes;
			var set = props.setAttributes;

			function aoEscolherWidget( v ) {
				if ( v && 0 === v.indexOf( 'calc:' ) ) {
					set( { widget: 'calculadora', slug: v.slice( 5 ) } );
				} else {
					set( { widget: v || '', slug: '' } );
				}
			}

			var controls = [
				el( c.ComboboxControl, {
					key: 'widget',
					label: __( 'Widget', 'valorfinal-calculadoras-widgets' ),
					help: __( 'Digite para buscar: tabela do Brasileirao, dolar, ou uma calculadora.', 'valorfinal-calculadoras-widgets' ),
					value: valorAtual( a ),
					options: OPCOES,
					onChange: aoEscolherWidget,
				} ),
				el( c.SelectControl, {
					key: 'tema',
					label: __( 'Tema', 'valorfinal-calculadoras-widgets' ),
					value: a.tema,
					options: [
						{ value: 'light', label: __( 'Claro', 'valorfinal-calculadoras-widgets' ) },
						{ value: 'dark', label: __( 'Escuro', 'valorfinal-calculadoras-widgets' ) },
					],
					onChange: function ( v ) {
						set( { tema: v } );
					},
				} ),
				el( c.TextControl, {
					key: 'cor',
					label: __( 'Cor de destaque (hex)', 'valorfinal-calculadoras-widgets' ),
					value: a.cor,
					placeholder: '#2563eb',
					onChange: function ( v ) {
						set( { cor: v } );
					},
				} ),
				el( c.SelectControl, {
					key: 'largura',
					label: __( 'Largura', 'valorfinal-calculadoras-widgets' ),
					value: a.largura,
					options: [
						{ value: 'compacto', label: __( 'Compacto', 'valorfinal-calculadoras-widgets' ) },
						{ value: 'padrao', label: __( 'Padrao', 'valorfinal-calculadoras-widgets' ) },
						{ value: 'largo', label: __( 'Largo', 'valorfinal-calculadoras-widgets' ) },
						{ value: 'total', label: __( 'Total (100%)', 'valorfinal-calculadoras-widgets' ) },
					],
					onChange: function ( v ) {
						set( { largura: v } );
					},
				} ),
				el( c.ToggleControl, {
					key: 'titulo',
					label: __( 'Mostrar titulo', 'valorfinal-calculadoras-widgets' ),
					checked: a.titulo,
					onChange: function ( v ) {
						set( { titulo: v } );
					},
				} ),
				el( c.ToggleControl, {
					key: 'credito',
					label: __( 'Exibir um credito ao ValorFinal (opcional)', 'valorfinal-calculadoras-widgets' ),
					help: __( 'Ajuda muito o ValorFinal a continuar distribuindo os widgets de graca. Fica um link discreto abaixo do widget.', 'valorfinal-calculadoras-widgets' ),
					checked: a.credito,
					onChange: function ( v ) {
						set( { credito: v } );
					},
				} ),
			];

			return el(
				'div',
				wp.blockEditor.useBlockProps ? wp.blockEditor.useBlockProps() : {},
				el(
					InspectorControls,
					{ key: 'inspector' },
					el(
						c.PanelBody,
						{ title: __( 'Configuracoes do widget', 'valorfinal-calculadoras-widgets' ), initialOpen: true },
						controls
					)
				),
				el( ServerSideRender, {
					key: 'preview',
					block: 'valorfinal/widget',
					attributes: a,
				} )
			);
		},

		// Render no front-end vem do PHP (render_callback). Nada salvo no conteudo.
		save: function () {
			return null;
		},
	} );
} )( window.wp );
