# ValorFinal: Calculadoras e Widgets (plugin de WordPress)

Plugin oficial do **[ValorFinal](https://valorfinal.com.br)** para incorporar widgets ao vivo no seu site WordPress em um clique: **tabela e jogos do Brasileirão**, cotação do dólar, Selic, CDI, Bitcoin, resultados de loteria e mais de 200 calculadoras. Bloco (Gutenberg), shortcode e widget clássico. Os widgets **se atualizam sozinhos** e o plugin **não coleta nenhum dado**.

> Site: **https://valorfinal.com.br** · Catálogo de widgets: **https://valorfinal.com.br/embed** · Guia para WordPress: **https://valorfinal.com.br/embed/wordpress**

[![License: GPL v2+](https://img.shields.io/badge/License-GPLv2%2B-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

## O que ele faz

O [ValorFinal](https://valorfinal.com.br) é um portal brasileiro gratuito de calculadoras, cotações ao vivo e ferramentas. Este plugin transforma o "copiar e colar um iframe" em um clique dentro do WordPress.

### ⚽ Futebol ao vivo (atualiza a cada rodada)

| Widget | Página completa |
| --- | --- |
| Tabela do Brasileirão Série A | https://valorfinal.com.br/tabela-brasileirao-serie-a |
| Jogos do Brasileirão hoje | https://valorfinal.com.br/jogos-do-brasileirao-hoje |
| Jogos da Copa do Mundo hoje | https://valorfinal.com.br/jogos-da-copa-hoje |

Perfeito para blogs de torcida: cole uma vez, fica a temporada inteira.

### 💲 Finanças ao vivo

- [Cotação do dólar e euro hoje](https://valorfinal.com.br/cotacao-dolar-hoje)
- [Selic e CDI hoje](https://valorfinal.com.br/selic-hoje)
- [IPCA acumulado](https://valorfinal.com.br/ipca-acumulado)
- [Rendimento da poupança hoje](https://valorfinal.com.br/poupanca-hoje)
- [Cotação do Bitcoin hoje](https://valorfinal.com.br/cotacao-bitcoin-hoje)
- [Conversor de moedas](https://valorfinal.com.br/cambio) e [indicadores econômicos](https://valorfinal.com.br/indicadores-economicos-hoje)

### 🍀 Loterias e 🧮 calculadoras

Últimos resultados da Mega-Sena, Quina, Lotofácil, Lotomania e +Milionária, e mais de **200 calculadoras** ([catálogo completo](https://valorfinal.com.br/embed)).

## Instalação

1. Instale pelo diretório do WordPress (procure por "ValorFinal") **ou** baixe o `.zip` e envie em *Plugins > Adicionar novo > Enviar plugin*.
2. Ative o plugin.

## Como usar

**Bloco (Gutenberg):** adicione o bloco *"ValorFinal: widget"*, escolha o widget no painel lateral e veja o preview na hora.

**Shortcode:**

```text
[valorfinal widget="tabela-brasileirao"]
[valorfinal widget="jogos-brasileirao-hoje" tema="dark" cor="#1e88e5"]
[valorfinal widget="dolar" idioma="en" largura="compacto"]
[valorfinal widget="calculadora" slug="calculadora-rescisao-clt" titulo_texto="Rescisão CLT"]
```

| Atributo | Valores | Padrão |
| --- | --- | --- |
| `widget` | chave do catálogo ou `calculadora` | (obrigatório) |
| `slug` | slug da calculadora (só com `widget="calculadora"`) | — |
| `tema` | `light` \| `dark` | `light` |
| `cor` | hex `#rrggbb` | `#2563eb` |
| `largura` | `compacto` \| `padrao` \| `largo` \| `total` | `padrao` |
| `titulo` | `1` \| `0` | `1` |
| `credito` | `1` \| `0` | `1` |
| `idioma` | `pt` \| `en` (widgets universais) | `pt` |

**Widget clássico:** *Aparência > Widgets > "ValorFinal: widget"*.

## Privacidade e segurança

- **Zero coleta de dados.** O plugin só insere um `iframe` para um widget público de `https://valorfinal.com.br`. Nenhum dado dos seus visitantes passa pelo plugin.
- **Sem chamadas remotas de código.** Nada de `eval`, nada de carregar scripts de terceiros.
- O script de auto-altura **só aceita mensagens da origem `https://valorfinal.com.br`** (`event.origin`), validadas antes de qualquer ação.
- Toda entrada é sanitizada (whitelist de widgets, `sanitize_hex_color`, `sanitize_key`) e toda saída é escapada (`esc_url`, `esc_attr`, `esc_html`).
- Crédito ao ValorFinal é **opt-in** (vem ligado, mas pode ser desligado).

## Desenvolvimento

Plugin **buildless** (sem bundler): o bloco usa `wp.element`/`wp.components` direto, e o render é server-side (mesmo builder seguro do shortcode e do widget). Estrutura:

```text
valorfinal-calculadoras-widgets.php   # bootstrap
includes/render.php                   # catálogo (whitelist) + builder seguro
includes/shortcode.php                # [valorfinal]
includes/block.php                    # bloco (render server-side)
includes/widget.php                   # widget clássico
blocks/valorfinal/                    # block.json + edit.js (buildless)
assets/js/valorfinal-embed.js         # auto-altura (origem validada)
```

Releases são publicados no WordPress.org via GitHub Actions (`10up/action-wordpress-plugin-deploy`) a cada tag.

## Licença

GPL-2.0-or-later. Veja [LICENSE](LICENSE).

---

Feito por **[ValorFinal](https://valorfinal.com.br)** — sua calculadora online.
