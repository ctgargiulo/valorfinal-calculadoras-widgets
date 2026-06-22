=== ValorFinal: Calculadoras e Widgets ===
Contributors: valorfinal
Tags: brasileirao, calculadora, dolar, widget, futebol
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 7.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Widgets ao vivo do ValorFinal: tabela e jogos do Brasileirao, dolar, Selic, Bitcoin, loterias e calculadoras. Bloco, shortcode e widget.

== Description ==

Adicione widgets gratuitos e sempre atualizados do **ValorFinal** (https://valorfinal.com.br) ao seu site WordPress, em um clique. Escolha o widget, ajuste o tema e a cor, e pronto: o conteudo se atualiza sozinho, sem voce mexer em nada depois.

Feito para blogs de torcida, sites de futebol, portais de financas e qualquer site que queira mostrar dados ao vivo.

= Widgets de futebol (atualizam a cada rodada) =

* **Tabela do Brasileirao Serie A ao vivo** - a classificacao com pontos, jogos e saldo de gols. Veja a versao completa em https://valorfinal.com.br/tabela-brasileirao-serie-a
* **Jogos do Brasileirao hoje** - os jogos da rodada com horarios de Brasilia e placar ao vivo. https://valorfinal.com.br/jogos-do-brasileirao-hoje
* **Jogos da Copa do Mundo hoje** - https://valorfinal.com.br/jogos-da-copa-hoje

Cole uma vez e o widget acompanha o campeonato a temporada inteira.

= Widgets de financas (ao vivo) =

* Cotacao do dolar e euro hoje - https://valorfinal.com.br/cotacao-dolar-hoje
* Selic e CDI hoje - https://valorfinal.com.br/selic-hoje
* IPCA acumulado, rendimento da poupanca, cotacao do Bitcoin, conversor de moedas e o painel de indicadores economicos.

= Loterias =

* Ultimo resultado da Mega-Sena, Quina, Lotofacil, Lotomania e +Milionaria.

= Calculadoras =

* Mais de 200 calculadoras do ValorFinal (rescisao, INSS, financiamento, IMC e muito mais) pelo slug da ferramenta. Catalogo de widgets: https://valorfinal.com.br/embed

= Como usar =

Tres formas, todas com as mesmas opcoes:

1. **Bloco** (editor Gutenberg): adicione o bloco "ValorFinal: widget", escolha o widget no painel lateral e veja o preview na hora.
2. **Shortcode**: `[valorfinal widget="tabela-brasileirao"]`. Aceita `tema`, `cor`, `largura`, `titulo`, `credito` e (para calculadoras) `slug`.
3. **Widget classico**: em Aparencia > Widgets, adicione "ValorFinal: widget".

= Privacidade e seguranca =

Este plugin **nao coleta nem envia nenhum dado pessoal**. Ele apenas insere um iframe que carrega o widget publico de https://valorfinal.com.br, que se atualiza sozinho. Nenhum dado dos seus visitantes passa pelo plugin. O codigo e aberto (GPL) e legivel.

O link de credito ao ValorFinal vem **desligado por padrao** (opt-in) e nunca e obrigatorio. Se voce marcar a opcao para exibi-lo, ajuda muito o ValorFinal a continuar distribuindo os widgets de graca, com um link discreto abaixo do widget.

== Installation ==

1. Em Plugins > Adicionar novo, procure por "ValorFinal", instale e ative. Ou faca o upload do .zip em Plugins > Adicionar novo > Enviar plugin.
2. Adicione o bloco "ValorFinal: widget" a uma pagina/post, ou use o shortcode `[valorfinal widget="tabela-brasileirao"]`, ou o widget classico em Aparencia > Widgets.
3. Escolha o widget, o tema e a cor. Pronto: ele se atualiza sozinho.

== Frequently Asked Questions ==

= O plugin coleta dados dos meus visitantes? =

Nao. O plugin so gera um iframe para um widget publico do ValorFinal. Nenhum dado pessoal e coletado, armazenado ou enviado pelo plugin.

= Preciso de uma conta ou de uma chave de API? =

Nao. E gratuito, sem cadastro e sem chave. Os widgets sao publicos.

= O widget deixa o site lento? =

Nao. O iframe carrega de forma assincrona (loading lazy) e os dados vem do servidor do ValorFinal; o ajuste de altura e automatico.

= Como funciona o ajuste de altura? =

O widget publica a propria altura por postMessage e um pequeno script ajusta o iframe. Por seguranca, o script so aceita mensagens da origem https://valorfinal.com.br.

= O link de credito ao ValorFinal e obrigatorio? =

Nao. Ele vem **desligado por padrao** e e totalmente opcional. Voce pode liga-lo no bloco, no shortcode (`credito="1"`) ou no widget classico. Ativar esse credito ajuda muito o ValorFinal a continuar distribuindo os widgets de graca, mas o plugin funciona 100% sem ele.

= Quais widgets estao disponiveis? =

Tabela e jogos do Brasileirao, jogos da Copa, dolar/euro, Selic/CDI, IPCA, poupanca, Bitcoin, conversor de moedas, indicadores economicos, resultados de loteria e mais de 200 calculadoras. Veja todos em https://valorfinal.com.br/embed

= E grátis para uso comercial? =

Sim, e gratuito para uso pessoal e comercial.

== Screenshots ==

1. Tabela do Brasileirao Serie A ao vivo incorporada em um post.
2. O bloco "ValorFinal: widget" no editor, com preview e opcoes de tema e cor.
3. Jogos do Brasileirao de hoje com placar ao vivo.

== Changelog ==

= 1.1.0 =
* Novo: seletor PESQUISAVEL no bloco, com os widgets ao vivo e as mais de 390 calculadoras (digite para encontrar).
* Conformidade: o link de credito ao ValorFinal agora vem DESLIGADO por padrao (opt-in), conforme as diretrizes do WordPress.org.

= 1.0.0 =
* Versao inicial: bloco, shortcode e widget classico.
* Widgets de futebol ao vivo (tabela e jogos do Brasileirao, jogos da Copa).
* Widgets de financas (dolar, Selic/CDI, IPCA, poupanca, Bitcoin, conversor, indicadores).
* Resultados de loteria e mais de 200 calculadoras.
* Opcoes de tema, cor, largura, titulo e credito. Ajuste de altura automatico e seguro.

== Upgrade Notice ==

= 1.1.0 =
Seletor pesquisavel com todas as calculadoras e o link de credito agora opt-in (desligado por padrao).

= 1.0.0 =
Versao inicial do plugin ValorFinal: Calculadoras e Widgets.
