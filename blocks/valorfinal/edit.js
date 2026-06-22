/**
 * Editor do bloco "ValorFinal: widget" - buildless (sem JSX, sem bundler).
 *
 * Usa as libs do proprio WordPress (wp.element, wp.blockEditor, wp.components,
 * wp.serverSideRender). O preview e renderizado pelo SERVIDOR (mesmo builder
 * seguro do front-end), entao o editor mostra exatamente o que sai publicado.
 *
 * Sem coleta de dados, sem chamadas externas: o preview vem do proprio WordPress.
 */
( function ( wp ) {
	'use strict';

	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var registerBlockType = wp.blocks.registerBlockType;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var PanelBody = wp.components.PanelBody;
	var SelectControl = wp.components.SelectControl;
	var ToggleControl = wp.components.ToggleControl;
	var TextControl = wp.components.TextControl;
	var ServerSideRender = wp.serverSideRender;

	var DADOS = window.VFCW_DATA || { widgets: [] };

	registerBlockType( 'valorfinal/widget', {
		edit: function ( props ) {
			var a = props.attributes;
			var set = props.setAttributes;

			var controls = [
				el( SelectControl, {
					key: 'widget',
					label: __( 'Widget', 'valorfinal-calculadoras-widgets' ),
					value: a.widget,
					options: DADOS.widgets,
					onChange: function ( v ) {
						set( { widget: v } );
					},
				} ),
			];

			if ( 'calculadora' === a.widget ) {
				controls.push(
					el( TextControl, {
						key: 'slug',
						label: __( 'Slug da calculadora', 'valorfinal-calculadoras-widgets' ),
						help: __( 'Ex.: calculadora-rescisao-clt', 'valorfinal-calculadoras-widgets' ),
						value: a.slug,
						onChange: function ( v ) {
							set( { slug: v } );
						},
					} )
				);
			}

			controls.push(
				el( SelectControl, {
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
				el( TextControl, {
					key: 'cor',
					label: __( 'Cor de destaque (hex)', 'valorfinal-calculadoras-widgets' ),
					value: a.cor,
					placeholder: '#2563eb',
					onChange: function ( v ) {
						set( { cor: v } );
					},
				} ),
				el( SelectControl, {
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
				el( ToggleControl, {
					key: 'titulo',
					label: __( 'Mostrar titulo', 'valorfinal-calculadoras-widgets' ),
					checked: a.titulo,
					onChange: function ( v ) {
						set( { titulo: v } );
					},
				} ),
				el( ToggleControl, {
					key: 'credito',
					label: __( 'Mostrar credito ao ValorFinal', 'valorfinal-calculadoras-widgets' ),
					checked: a.credito,
					onChange: function ( v ) {
						set( { credito: v } );
					},
				} )
			);

			return el(
				'div',
				wp.blockEditor.useBlockProps ? wp.blockEditor.useBlockProps() : {},
				el(
					InspectorControls,
					{ key: 'inspector' },
					el(
						PanelBody,
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
