=== ValorFinal: Calculadoras e Widgets ===
Contributors: ctgargiulo01
Tags: calculadora, widget, brasileirao, cotacao, loterias
Requires at least: 5.8
Tested up to: 7.0
Requires PHP: 7.2
Stable tag: 1.5.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Tabela e jogos do Brasileirão ao vivo, dólar, Selic, Bitcoin, loterias e mais de 400 calculadoras no seu WordPress. Bloco, shortcode e widget. Grátis.

== Description ==

Coloque widgets gratuitos e sempre atualizados do **ValorFinal** (https://valorfinal.com.br) no seu site WordPress em um clique. Você escolhe o widget, ajusta o tema e a cor, e pronto: o conteúdo se atualiza sozinho, sem nada para manter.

Feito para blogs de torcida, sites de esporte, portais de finanças, escritórios de contabilidade e qualquer site que queira mostrar dados ao vivo ou uma calculadora útil.

Depois de ativar, abra **ValorFinal** no menu lateral do painel. Lá estão todos os widgets em uma lista com busca: você escolhe um, vê o preview funcionando de verdade, ajusta tema, cor e largura, e copia o código pronto. Quem prefere o editor de blocos pode usar o bloco "ValorFinal: widget", que tem os mesmos ajustes.

O ValorFinal é um portal brasileiro de calculadoras e ferramentas gratuitas, mantido pela GUARDIASEC LTDA. Este plugin incorpora os widgets públicos do portal por iframe; ele não processa nem armazena nenhum dado remoto.

= Futebol ao vivo (atualiza a cada rodada) =

* **Tabela do Brasileirão Série A** - classificação com pontos, jogos e saldo, ao vivo. Versão completa em https://valorfinal.com.br/tabela-brasileirao-serie-a
* **Jogos do Brasileirão hoje** - os jogos da rodada com horário de Brasília e placar ao vivo. https://valorfinal.com.br/jogos-do-brasileirao-hoje
* **Jogos da Copa do Mundo hoje** - https://valorfinal.com.br/jogos-da-copa-hoje

Você cola uma vez e o widget acompanha a temporada inteira sozinho.

= Financeiro ao vivo =

* Cotação do dólar e do euro hoje - https://valorfinal.com.br/cotacao-dolar-hoje
* Selic e CDI hoje - https://valorfinal.com.br/selic-hoje
* IPCA acumulado, rendimento da poupança, cotação do Bitcoin, conversor de moedas e o painel de indicadores econômicos.

= Loterias =

* Último resultado da Mega-Sena, Quina, Lotofácil, Lotomania e +Milionária.

= Mais de 400 calculadoras =

* Mais de 400 calculadoras do ValorFinal (rescisão CLT, salário líquido, INSS, financiamento, IMC e muitas outras) pelo slug da ferramenta, com busca direto no editor. Catálogo completo: https://valorfinal.com.br/embed

= Como usar =

Três caminhos, todos com as mesmas opções:

1. **Bloco** (editor Gutenberg): adicione o bloco "ValorFinal: widget", escolha o widget no painel lateral (dá para buscar digitando) e veja a prévia na hora.
2. **Shortcode**: `[valorfinal widget="tabela-brasileirao"]`. Aceita `tema` (light ou dark), `cor` (hex), `largura` (compacto, padrao, largo, total), `titulo`, `credito` e, para calculadoras, `slug`. Exemplo com calculadora: `[valorfinal widget="calculadora" slug="calculadora-rescisao-clt"]`
3. **Widget clássico**: em Aparência > Widgets, adicione "ValorFinal: widget".

A documentação completa, com exemplos, está em https://valorfinal.com.br/embed/wordpress

= Personalização =

Todo widget aceita tema claro ou escuro, cor de destaque em hex, quatro larguras e a opção de esconder o título. A altura se ajusta sozinha ao conteúdo.

= Segurança e privacidade =

Este plugin **não coleta nem envia nenhum dado pessoal**. Ele só insere um iframe que carrega o widget público do https://valorfinal.com.br, que se atualiza sozinho. Nenhum dado dos seus visitantes passa pelo plugin. O código é aberto (GPL) e legível: uma whitelist fechada de widgets, sanitização de todas as opções e escape de toda a saída.

O link de crédito ao ValorFinal vem **desligado por padrão** (opt-in) e nunca é obrigatório. Se você ligar, ajuda o ValorFinal a continuar distribuindo os widgets de graça, com um link discreto abaixo do widget.

= Serviço de terceiros =

Os widgets são carregados por iframe a partir de https://valorfinal.com.br, portal operado pela GUARDIASEC LTDA (ValorFinal). Ao usar o plugin, as páginas com widget carregam conteúdo desse domínio no navegador do visitante, como qualquer iframe. Termos de uso: https://valorfinal.com.br/termos - Política de privacidade: https://valorfinal.com.br/privacidade

= Quer uma calculadora que ainda não existe? =

O catálogo cresce todo mês. Se o seu site precisa de uma calculadora ou de um widget que ainda não está na lista, peça pela página de contato: https://valorfinal.com.br/contato - os pedidos de quem usa o plugin entram na frente da fila.

== Installation ==

1. Em Plugins > Adicionar novo, busque por "ValorFinal", instale e ative. Ou envie o .zip em Plugins > Adicionar novo > Enviar plugin.
2. Adicione o bloco "ValorFinal: widget" a uma página ou post, ou use o shortcode `[valorfinal widget="tabela-brasileirao"]`, ou o widget clássico em Aparência > Widgets.
3. Escolha o widget, o tema e a cor. Pronto: ele se atualiza sozinho.

== Frequently Asked Questions ==

= O plugin coleta dados dos meus visitantes? =

Não. O plugin só gera um iframe para um widget público do ValorFinal. Nenhum dado pessoal é coletado, armazenado ou enviado pelo plugin.

= Preciso de conta ou de chave de API? =

Não. É grátis, sem cadastro e sem chave. Os widgets são públicos.

= O widget deixa o site lento? =

Não. O iframe carrega de forma assíncrona (lazy loading) e os dados vêm do servidor do ValorFinal, sem pesar no seu WordPress. A altura se ajusta automaticamente.

= Como funciona o ajuste de altura? =

O widget informa a própria altura por postMessage e um script pequeno redimensiona o iframe. Por segurança, o script só aceita mensagens da origem https://valorfinal.com.br.

= Como coloco uma calculadora específica? =

No bloco, digite o nome no seletor (por exemplo "rescisão") e escolha na lista. No shortcode, use `[valorfinal widget="calculadora" slug="calculadora-rescisao-clt"]`, trocando o slug pelo da calculadora que você quer. Os slugs estão em https://valorfinal.com.br/embed

= Funciona com Elementor e outros construtores? =

Sim. O shortcode funciona em qualquer campo que aceite shortcodes, o que inclui Elementor, Divi e similares. Também dá para colar o código de incorporação num widget de HTML.

= O link de crédito ao ValorFinal é obrigatório? =

Não. Ele vem **desligado por padrão** e é totalmente opcional. Você pode ligar no bloco, no shortcode (`credito="1"`) ou no widget clássico. Ligar ajuda o ValorFinal a continuar distribuindo os widgets de graça, mas o plugin funciona por completo sem isso.

= Quais widgets estão disponíveis? =

Tabela e jogos do Brasileirão, jogos da Copa, dólar e euro, Selic e CDI, IPCA, poupança, Bitcoin, conversor de moedas, indicadores econômicos, resultados de loterias e mais de 400 calculadoras. Veja todos em https://valorfinal.com.br/embed

= É grátis para uso comercial? =

Sim, é gratuito para uso pessoal e comercial.

= Como peço uma calculadora nova ou reporto um problema? =

Para dúvidas do plugin, use o fórum de suporte aqui do diretório. Para pedir uma calculadora nova ou falar com o ValorFinal, use https://valorfinal.com.br/contato

== Screenshots ==

1. Tabela do Brasileirão Série A ao vivo, incorporada num post.
2. O bloco "ValorFinal: widget" no editor, com prévia e as opções de tema, cor e largura.
3. Jogos do Brasileirão de hoje, com placar ao vivo e horário de Brasília.
4. Seletor pesquisável: digite para achar uma das mais de 400 calculadoras.
5. Widget financeiro de cotação do dólar e do euro.

== Changelog ==

= 1.5.0 =
* Nova tela "ValorFinal" no menu lateral do painel: uma vitrine com todos os widgets, busca por nome, preview ao vivo e o código pronto para copiar, em shortcode e em HTML. Até agora o plugin não mostrava nada depois de ativado, e era preciso sair do WordPress e ler a documentação para descobrir como usar.
* O preview da vitrine é gerado pelo mesmo código que publica o widget no seu site. O que aparece na tela é exatamente o que vai ao ar, inclusive o rel="nofollow" do crédito.
* Novo atalho "Escolher um widget" na lista de plugins, que abre a vitrine direto.
* Nenhuma mudança em shortcode, atributos, bloco ou aparência dos widgets já publicados.

= 1.4.1 =
* Catálogo do seletor com mais de 400 calculadoras, gerado da mesma lista que o site usa. O número anunciado nesta página passa a sair dessa lista, e não mais escrito à mão.
* Esta é a primeira versão publicada no diretório depois da 1.3.0: ela leva a correção da 1.4.0, que ficou só no repositório. Quem usa a 1.3.0 e liga o crédito ainda emite o link seguido; atualizar resolve.
* Nenhuma mudança em shortcode, atributos, bloco ou aparência.

= 1.4.0 =
* O link do crédito ao ValorFinal passou a sair com rel="nofollow". O crédito continua opcional (vem desligado por padrão) e continua aparecendo igual para o leitor; a mudança é só técnica, para deixar claro que usar o plugin não obriga o seu site a transmitir autoridade de busca para o ValorFinal, seguindo as diretrizes do Google sobre links em widgets distribuídos.
* Nenhuma mudança em shortcode, atributos, bloco ou aparência: quem já usa o plugin não precisa mexer em nada.

= 1.3.0 =
* Novo widget de cotação de moedas: mais de 50 moedas em tempo real (dólar, euro, libra, iene, franco suíço, pesos dos vizinhos, lira turca e outras), além de ouro, prata e criptomoedas. No editor, digite o nome da moeda no seletor pesquisável; no shortcode, use [valorfinal widget="moeda" par="EUR-BRL"].
* Os widgets de cotação passaram a atualizar com mais frequência durante o pregão (mesmo painel de câmbio do portal ValorFinal).

= 1.2.0 =
* Página do diretório em português do Brasil (descrição, FAQ, capturas e changelog).
* Banner corrigido: a tabela do Brasileirão aparecia cortada na borda da imagem.
* Capturas de tela refeitas com a interface atual (acentuação correta e crédito desligado por padrão) e duas capturas novas: o seletor pesquisável e o widget de cotação.
* Catálogo atualizado: 395 calculadoras embedáveis.
* Nome de exibição do plugin com acentuação correta: "ValorFinal: Calculadoras e Widgets".
* Novo link "Como usar" na lista de plugins, levando à documentação oficial.

= 1.1.2 =
* Interface do plugin toda em português do Brasil com acentuação correta (editor de bloco, widget clássico, rótulos e a descrição na lista de plugins).

= 1.1.1 =
* Conformidade da página no WordPress.org: readme e descrição em inglês, "Tested up to: 7.0" e descrição curta menor.
* Removidos a chamada load_plugin_textdomain() e o cabeçalho Domain Path (as traduções vêm do próprio WordPress.org).

= 1.1.0 =
* Novo: seletor com busca no bloco, com os widgets ao vivo e as calculadoras (digite para achar).
* Conformidade: o link de crédito ao ValorFinal agora vem desligado por padrão (opt-in), conforme as diretrizes do WordPress.org.

= 1.0.0 =
* Versão inicial: bloco, shortcode e widget clássico.
* Widgets de futebol ao vivo (tabela e jogos do Brasileirão, jogos da Copa).
* Widgets financeiros (dólar, Selic e CDI, IPCA, poupança, Bitcoin, conversor, indicadores).
* Resultados de loterias e mais de 400 calculadoras.
* Opções de tema, cor, largura, título e crédito. Ajuste de altura automático e seguro.

== Upgrade Notice ==

= 1.5.0 =
Nova tela no painel com busca, preview ao vivo e código pronto para copiar. Nada muda nos widgets que você já publicou.

= 1.4.1 =
Catálogo com mais de 400 calculadoras e o link de crédito (opcional) com rel="nofollow". Nada muda em shortcode, bloco ou aparência.

= 1.2.0 =
Página do diretório em português, banner e capturas corrigidos e catálogo com 395 calculadoras.

= 1.1.2 =
Interface do plugin em português do Brasil com acentuação correta.

= 1.1.1 =
Ajustes de compatibilidade e metadados da página no WordPress.org (Tested up to 7.0).

= 1.1.0 =
Seletor com busca incluindo todas as calculadoras, e o link de crédito agora é opt-in (desligado por padrão).

= 1.0.0 =
Primeira versão do plugin ValorFinal: Calculadoras e Widgets.
