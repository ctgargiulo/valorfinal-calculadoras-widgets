=== ValorFinal: Calculators and Widgets ===
Contributors: ctgargiulo01
Tags: widget, calculator, embed, football, live-data
Requires at least: 5.8
Tested up to: 7.0
Requires PHP: 7.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Live ValorFinal widgets for your site: Brazilian football tables and fixtures, currency, Selic, Bitcoin, lottery results and calculators. Block, shortcode and widget.

== Description ==

Add free, always up to date widgets from **ValorFinal** (https://valorfinal.com.br) to your WordPress site in one click. Pick a widget, adjust the theme and color, and you are done: the content refreshes on its own, with nothing else to maintain.

Built for football fan blogs, sports sites, finance portals and any site that wants to show live data.

ValorFinal is a Brazilian portal of free calculators and tools. This plugin embeds its public widgets by iframe; it does not process or store any remote data.

= Football widgets (refresh every round) =

* **Live Brazilian Serie A table** - standings with points, matches and goal difference. Full version at https://valorfinal.com.br/tabela-brasileirao-serie-a
* **Today's Brazilian league fixtures** - the round's matches with Brasilia kickoff times and live score. https://valorfinal.com.br/jogos-do-brasileirao-hoje
* **Today's World Cup matches** - https://valorfinal.com.br/jogos-da-copa-hoje

Paste once and the widget follows the whole season on its own.

= Finance widgets (live) =

* US dollar and euro rate today - https://valorfinal.com.br/cotacao-dolar-hoje
* Selic and CDI rates today - https://valorfinal.com.br/selic-hoje
* Accumulated IPCA inflation, savings account yield, Bitcoin price, currency converter and the economic indicators panel.

= Lotteries =

* Latest results for Mega-Sena, Quina, Lotofacil, Lotomania and +Milionaria.

= Calculators =

* More than 200 ValorFinal calculators (severance pay, social security, financing, BMI and many more) by tool slug. Widget catalog: https://valorfinal.com.br/embed

= How to use =

Three ways, all with the same options:

1. **Block** (Gutenberg editor): add the "ValorFinal: widget" block, pick a widget in the side panel and see the preview right away.
2. **Shortcode**: `[valorfinal widget="tabela-brasileirao"]`. Accepts `tema`, `cor`, `largura`, `titulo`, `credito` and (for calculators) `slug`.
3. **Classic widget**: under Appearance > Widgets, add "ValorFinal: widget".

= Privacy and security =

This plugin **does not collect or send any personal data**. It only inserts an iframe that loads the public widget from https://valorfinal.com.br, which refreshes on its own. No visitor data passes through the plugin. The code is open source (GPL) and readable.

The credit link back to ValorFinal is **off by default** (opt-in) and never required. If you turn it on, it helps ValorFinal keep giving the widgets away for free, with a small link below the widget.

== Installation ==

1. Under Plugins > Add New, search for "ValorFinal", install and activate. Or upload the .zip under Plugins > Add New > Upload Plugin.
2. Add the "ValorFinal: widget" block to a page or post, or use the shortcode `[valorfinal widget="tabela-brasileirao"]`, or the classic widget under Appearance > Widgets.
3. Pick the widget, theme and color. Done: it refreshes on its own.

== Frequently Asked Questions ==

= Does the plugin collect my visitors' data? =

No. The plugin only generates an iframe for a public ValorFinal widget. No personal data is collected, stored or sent by the plugin.

= Do I need an account or an API key? =

No. It is free, with no signup and no key. The widgets are public.

= Does the widget slow the site down? =

No. The iframe loads asynchronously (lazy loading) and the data comes from the ValorFinal server; the height adjusts automatically.

= How does the height adjustment work? =

The widget posts its own height via postMessage and a small script resizes the iframe. For safety, the script only accepts messages from the origin https://valorfinal.com.br.

= Is the ValorFinal credit link required? =

No. It is **off by default** and completely optional. You can turn it on in the block, the shortcode (`credito="1"`) or the classic widget. Turning it on helps ValorFinal keep giving the widgets away for free, but the plugin works fully without it.

= Which widgets are available? =

Brazilian league table and fixtures, World Cup matches, dollar/euro, Selic/CDI, IPCA, savings, Bitcoin, currency converter, economic indicators, lottery results and more than 200 calculators. See them all at https://valorfinal.com.br/embed

= Is it free for commercial use? =

Yes, it is free for personal and commercial use.

== Screenshots ==

1. Live Brazilian Serie A table embedded in a post.
2. The "ValorFinal: widget" block in the editor, with preview and theme and color options.
3. Today's Brazilian league fixtures with live score.

== Changelog ==

= 1.1.0 =
* New: SEARCHABLE selector in the block, with the live widgets and the 390+ calculators (type to find one).
* Compliance: the ValorFinal credit link is now OFF by default (opt-in), per the WordPress.org guidelines.

= 1.0.0 =
* Initial version: block, shortcode and classic widget.
* Live football widgets (Brazilian league table and fixtures, World Cup matches).
* Finance widgets (dollar, Selic/CDI, IPCA, savings, Bitcoin, converter, indicators).
* Lottery results and more than 200 calculators.
* Theme, color, width, title and credit options. Automatic, safe height adjustment.

== Upgrade Notice ==

= 1.1.0 =
Searchable selector with all calculators, and the credit link is now opt-in (off by default).

= 1.0.0 =
Initial release of the ValorFinal: Calculators and Widgets plugin.
