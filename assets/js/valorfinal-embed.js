/**
 * ValorFinal embed - ajuste automatico de altura dos widgets.
 *
 * Os widgets do ValorFinal publicam a propria altura via postMessage; aqui
 * ajustamos o <iframe data-valorfinal-embed> correspondente para que o conteudo
 * nunca seja cortado.
 *
 * SEGURANCA: so aceitamos mensagens cuja origem seja EXATAMENTE
 * https://valorfinal.com.br e cujo formato seja o nosso; casamos o iframe certo
 * por contentWindow === event.source. Sem isso, qualquer site poderia redimensionar
 * o iframe via postMessage. Nao executa nada vindo da mensagem; so le um numero.
 *
 * Sem dependencias, sem jQuery, sem coleta de dados.
 */
( function () {
	if ( window.__vfEmbed ) {
		return;
	}
	window.__vfEmbed = 1;

	window.addEventListener( 'message', function ( event ) {
		if ( event.origin !== 'https://valorfinal.com.br' ) {
			return;
		}
		var data = event.data;
		if ( ! data || data.type !== 'valorfinal:embed-height' || typeof data.height !== 'number' ) {
			return;
		}
		var altura = data.height;
		if ( ! isFinite( altura ) || altura < 0 || altura > 5000 ) {
			return;
		}
		var frames = document.querySelectorAll( 'iframe[data-valorfinal-embed]' );
		for ( var i = 0; i < frames.length; i++ ) {
			if ( frames[ i ].contentWindow === event.source ) {
				frames[ i ].style.height = altura + 'px';
			}
		}
	} );
} )();
