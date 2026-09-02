/**
 * Vitrine dos widgets no painel do WordPress.
 *
 * Sem jQuery, sem bundler, sem dependencia externa. ES5 de proposito: o admin
 * do WordPress roda em navegador de todo tipo, e este arquivo e servido cru.
 *
 * O QUE ESTE ARQUIVO NAO FAZ: montar o iframe. O HTML do preview e do codigo
 * copiavel vem do servidor (vfcw_render), pelo admin-ajax. Assim a vitrine
 * mostra exatamente o que vai ao ar, e nao uma segunda versao da verdade que
 * envelhece sozinha.
 */
( function () {
	'use strict';

	var CFG = window.VFCW_ADMIN;
	if ( ! CFG ) {
		return;
	}

	var elBusca     = document.getElementById( 'vfcw-busca' );
	var elItens     = document.getElementById( 'vfcw-itens' );
	var elContagem  = document.getElementById( 'vfcw-contagem' );
	var elEscolhido = document.getElementById( 'vfcw-escolhido' );
	var elPreview   = document.getElementById( 'vfcw-preview' );
	var elLargura   = document.getElementById( 'vfcw-largura' );
	var elIdioma    = document.getElementById( 'vfcw-idioma' );
	var elCampoIdi  = document.getElementById( 'vfcw-campo-idioma' );
	var elCor       = document.getElementById( 'vfcw-cor' );
	var elTitulo    = document.getElementById( 'vfcw-titulo' );
	var elCredito   = document.getElementById( 'vfcw-credito' );
	var elShortcode = document.getElementById( 'vfcw-shortcode' );
	var elIframe    = document.getElementById( 'vfcw-iframe' );

	if ( ! elBusca || ! elItens || ! elPreview ) {
		return;
	}

	/** Item selecionado no momento. */
	var atual = null;
	/** Timer do debounce do preview. */
	var timer = null;

	/** Tira acento e caixa para a busca casar "matematica" com "Matemática". */
	var DIACRITICOS = new RegExp( '[\u0300-\u036f]', 'g' );

	function chave( texto ) {
		var s = String( texto ).toLowerCase();
		if ( s.normalize ) {
			s = s.normalize( 'NFD' ).replace( DIACRITICOS, '' );
		}
		return s;
	}

	/** Lista plana com a chave de busca ja calculada, para filtrar rapido. */
	var TODOS = [];
	( CFG.grupos || [] ).forEach( function ( g ) {
		( g.itens || [] ).forEach( function ( item ) {
			TODOS.push( {
				valor:  item.valor,
				rotulo: item.rotulo,
				lang:   !! item.lang,
				grupo:  g.titulo,
				busca:  chave( item.rotulo + ' ' + g.titulo + ' ' + item.valor )
			} );
		} );
	} );

	/** Preenche o seletor de largura com as opcoes vindas do PHP. */
	function montarLarguras() {
		if ( ! elLargura ) {
			return;
		}
		( CFG.larguras || [] ).forEach( function ( l ) {
			var op = document.createElement( 'option' );
			op.value       = l.valor;
			op.textContent = l.rotulo;
			if ( 'padrao' === l.valor ) {
				op.selected = true;
			}
			elLargura.appendChild( op );
		} );
	}

	/** Desenha a lista da esquerda, agrupada, respeitando o texto buscado. */
	function desenharLista( termo ) {
		var alvo    = chave( termo || '' );
		var achados = alvo
			? TODOS.filter( function ( i ) { return i.busca.indexOf( alvo ) !== -1; } )
			: TODOS;

		elItens.textContent = '';

		if ( ! achados.length ) {
			var vazio = document.createElement( 'p' );
			vazio.className   = 'vfcw-vazio';
			vazio.textContent = CFG.i18n.vazio;
			elItens.appendChild( vazio );
			elContagem.textContent = '';
			return;
		}

		var grupoAtual = null;
		var lista      = null;

		achados.forEach( function ( item ) {
			if ( item.grupo !== grupoAtual ) {
				grupoAtual = item.grupo;
				var h = document.createElement( 'h3' );
				h.className   = 'vfcw-grupo';
				h.textContent = grupoAtual;
				elItens.appendChild( h );
				lista = document.createElement( 'ul' );
				lista.className = 'vfcw-ul';
				elItens.appendChild( lista );
			}

			var li  = document.createElement( 'li' );
			var bot = document.createElement( 'button' );
			bot.type        = 'button';
			bot.className   = 'vfcw-item';
			bot.textContent = item.rotulo;
			bot.setAttribute( 'data-valor', item.valor );
			bot.setAttribute( 'role', 'option' );
			bot.setAttribute( 'aria-selected', atual && atual.valor === item.valor ? 'true' : 'false' );
			if ( atual && atual.valor === item.valor ) {
				bot.className += ' vfcw-item-ativo';
			}
			bot.addEventListener( 'click', function () {
				selecionar( item );
			} );
			li.appendChild( bot );
			lista.appendChild( li );
		} );

		elContagem.textContent = CFG.i18n.resultados.replace( '%d', achados.length );
	}

	/** Troca o widget do palco. */
	function selecionar( item ) {
		atual = item;

		if ( elEscolhido ) {
			elEscolhido.textContent = item.rotulo;
		}
		if ( elCampoIdi ) {
			elCampoIdi.hidden = ! item.lang;
			if ( ! item.lang && elIdioma ) {
				elIdioma.value = 'pt';
			}
		}

		// Marca visualmente o item ativo sem redesenhar a lista inteira.
		var botoes = elItens.querySelectorAll( '.vfcw-item' );
		for ( var i = 0; i < botoes.length; i++ ) {
			var ativo = botoes[ i ].getAttribute( 'data-valor' ) === item.valor;
			botoes[ i ].className = ativo ? 'vfcw-item vfcw-item-ativo' : 'vfcw-item';
			botoes[ i ].setAttribute( 'aria-selected', ativo ? 'true' : 'false' );
		}

		atualizar();
	}

	/** Estado atual dos controles, no formato que o endpoint espera. */
	function estado() {
		return {
			valor:   atual ? atual.valor : '',
			tema:    document.querySelector( 'input[name="vfcw-tema"]:checked' ).value,
			cor:     elCor ? elCor.value : '',
			largura: elLargura ? elLargura.value : 'padrao',
			idioma:  ( elIdioma && elCampoIdi && ! elCampoIdi.hidden ) ? elIdioma.value : 'pt',
			titulo:  elTitulo && elTitulo.checked ? '1' : '0',
			credito: elCredito && elCredito.checked ? '1' : '0'
		};
	}

	/** Pede o preview ao servidor, com debounce para nao disparar a cada tecla. */
	function atualizar() {
		if ( ! atual ) {
			return;
		}
		window.clearTimeout( timer );
		timer = window.setTimeout( pedirPreview, 180 );
	}

	function pedirPreview() {
		var dados = estado();
		var corpo = 'action=vfcw_preview&nonce=' + encodeURIComponent( CFG.nonce );

		Object.keys( dados ).forEach( function ( k ) {
			corpo += '&' + k + '=' + encodeURIComponent( dados[ k ] );
		} );

		elPreview.setAttribute( 'data-estado', 'carregando' );

		var req = new XMLHttpRequest();
		req.open( 'POST', CFG.ajaxUrl, true );
		req.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8' );
		req.onload = function () {
			var resposta = null;
			try {
				resposta = JSON.parse( req.responseText );
			} catch ( e ) {
				resposta = null;
			}

			elPreview.removeAttribute( 'data-estado' );

			if ( ! resposta || ! resposta.success || ! resposta.data ) {
				falhar( resposta && resposta.data && resposta.data.mensagem );
				return;
			}

			// HTML gerado pelo nosso proprio builder, ja escapado no PHP.
			elPreview.innerHTML = resposta.data.html;
			if ( elShortcode ) {
				elShortcode.value = resposta.data.shortcode;
			}
			if ( elIframe ) {
				elIframe.value = resposta.data.iframe;
			}
		};
		req.onerror = function () {
			elPreview.removeAttribute( 'data-estado' );
			falhar();
		};
		req.send( corpo );
	}

	function falhar( mensagem ) {
		elPreview.textContent = mensagem || CFG.i18n.erro;
		if ( elShortcode ) {
			elShortcode.value = '';
		}
		if ( elIframe ) {
			elIframe.value = '';
		}
	}

	/** Copia um dos campos de codigo, com queda para o metodo antigo. */
	function copiar( idAlvo ) {
		var campo = document.getElementById( idAlvo );
		var aviso = document.querySelector( '[data-aviso="' + idAlvo + '"]' );
		if ( ! campo || ! campo.value ) {
			return;
		}

		function ok() {
			if ( aviso ) {
				aviso.textContent = CFG.i18n.copiado;
				window.setTimeout( function () { aviso.textContent = ''; }, 2500 );
			}
		}
		function nok() {
			if ( aviso ) {
				aviso.textContent = CFG.i18n.copiarFalha;
			}
		}

		if ( window.navigator && window.navigator.clipboard && window.navigator.clipboard.writeText ) {
			window.navigator.clipboard.writeText( campo.value ).then( ok, function () {
				selecionarECopiar( campo ) ? ok() : nok();
			} );
			return;
		}
		if ( selecionarECopiar( campo ) ) {
			ok();
		} else {
			nok();
		}
	}

	function selecionarECopiar( campo ) {
		try {
			campo.select();
			campo.setSelectionRange( 0, campo.value.length );
			return document.execCommand( 'copy' );
		} catch ( e ) {
			return false;
		}
	}

	// Liga os eventos.
	elBusca.addEventListener( 'input', function () {
		desenharLista( elBusca.value );
	} );

	[ elLargura, elIdioma, elCor, elTitulo, elCredito ].forEach( function ( el ) {
		if ( el ) {
			el.addEventListener( 'change', atualizar );
		}
	} );

	var radios = document.querySelectorAll( 'input[name="vfcw-tema"]' );
	for ( var r = 0; r < radios.length; r++ ) {
		radios[ r ].addEventListener( 'change', atualizar );
	}

	var reset = document.querySelector( '.vfcw-reset-cor' );
	if ( reset && elCor ) {
		reset.addEventListener( 'click', function () {
			elCor.value = CFG.accent;
			atualizar();
		} );
	}

	var copiadores = document.querySelectorAll( '.vfcw-copiar' );
	for ( var c = 0; c < copiadores.length; c++ ) {
		copiadores[ c ].addEventListener( 'click', function ( ev ) {
			copiar( ev.currentTarget.getAttribute( 'data-alvo' ) );
		} );
	}

	// Estado inicial: lista completa e o widget de estreia ja no palco.
	montarLarguras();
	desenharLista( '' );

	var inicial = null;
	for ( var i = 0; i < TODOS.length; i++ ) {
		if ( TODOS[ i ].valor === CFG.inicial ) {
			inicial = TODOS[ i ];
			break;
		}
	}
	selecionar( inicial || TODOS[ 0 ] );
} )();
