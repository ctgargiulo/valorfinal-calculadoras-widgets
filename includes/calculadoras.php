<?php
/**
 * Catalogo de calculadoras embedaveis (gerado do registry do ValorFinal).
 * NAO editar a mao. Usado pelo seletor pesquisavel do bloco no editor.
 * Slugs/titulos sao publicos (aparecem no site); sem dados sensiveis.
 *
 * @package ValorFinal_Calculadoras_Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lista das calculadoras embedaveis do ValorFinal (slug, titulo e categoria).
 *
 * @return array<int,array{slug:string,label:string,cat:string}>
 */
function vfcw_calculadoras() {
	return array(
		array(
			'slug'  => 'calculadora-chuveiro-eletrico',
			'label' => 'Chuveiro Elétrico',
			'cat'   => 'Energia',
		),
		array(
			'slug'  => 'calculadora-consumo-ar-condicionado',
			'label' => 'Consumo Ar-Condicionado',
			'cat'   => 'Energia',
		),
		array(
			'slug'  => 'calculadora-consumo-energia',
			'label' => 'Consumo de Energia',
			'cat'   => 'Energia',
		),
		array(
			'slug'  => 'calculadora-conta-de-luz',
			'label' => 'Conta de Luz',
			'cat'   => 'Energia',
		),
		array(
			'slug'  => 'calculadora-conversor-potencia',
			'label' => 'Conversor de Potência',
			'cat'   => 'Energia',
		),
		array(
			'slug'  => 'calculadora-energia-solar',
			'label' => 'Energia Solar',
			'cat'   => 'Energia',
		),
		array(
			'slug'  => 'calculadora-concreto',
			'label' => 'Concreto',
			'cat'   => 'Engenharia',
		),
		array(
			'slug'  => 'calculadora-espessura-vaso-pressao',
			'label' => 'Espessura de Vaso',
			'cat'   => 'Engenharia',
		),
		array(
			'slug'  => 'calculadora-queda-tensao',
			'label' => 'Queda de Tensão',
			'cat'   => 'Engenharia',
		),
		array(
			'slug'  => 'calculadora-resistencia-dos-materiais',
			'label' => 'Resistência dos Materiais',
			'cat'   => 'Engenharia',
		),
		array(
			'slug'  => 'calculadora-tijolos',
			'label' => 'Tijolos e Blocos',
			'cat'   => 'Engenharia',
		),
		array(
			'slug'  => 'calculadora-vaso-pressao-nr13',
			'label' => 'Vaso de Pressão NR-13',
			'cat'   => 'Engenharia',
		),
		array(
			'slug'  => 'calculadora-amortizacao-financiamento',
			'label' => 'Amortização de Financiamento',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'cambio',
			'label' => 'Câmbio Hoje',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-cet',
			'label' => 'CET',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-comprometimento-renda',
			'label' => 'Comprometimento de Renda',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-consorcio-vs-financiamento',
			'label' => 'Consórcio vs Financiamento',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-conversor-moedas',
			'label' => 'Conversor de Moedas',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-correcao-monetaria',
			'label' => 'Correção Monetária',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'cotacao-dolar-hoje',
			'label' => 'Cotação do Dólar Hoje',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-custo-total-patrimonio',
			'label' => 'Custo Total do Patrimônio',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-emprestimo-pessoal',
			'label' => 'Empréstimo Pessoal',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-entrada-financiamento',
			'label' => 'Entrada de Financiamento',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-financiamento-vs-a-vista',
			'label' => 'Financiamento vs À Vista',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'indicadores-economicos-hoje',
			'label' => 'Indicadores Econômicos Hoje',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-inflacao',
			'label' => 'Inflação e Poder de Compra',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-juros-compostos',
			'label' => 'Juros Compostos',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-juros-cartao-credito',
			'label' => 'Juros do Cartão',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'juros-do-credito-hoje',
			'label' => 'Juros do Crédito Hoje',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-juros-simples',
			'label' => 'Juros Simples',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-meta-financeira',
			'label' => 'Meta Financeira',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-parcelas',
			'label' => 'Parcelas',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-porcentagem',
			'label' => 'Porcentagem',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-portabilidade-credito',
			'label' => 'Portabilidade de Crédito',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'quanto-rende-hoje',
			'label' => 'Quanto Rende Hoje',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-quitacao-antecipada',
			'label' => 'Quitação Antecipada',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-renegociacao-dividas',
			'label' => 'Quitação de Dívidas',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'ranking-bancos-taxas',
			'label' => 'Ranking de Bancos',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-remessa-internacional',
			'label' => 'Remessa Internacional',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'retroativo-investimentos',
			'label' => 'Retroativo de Investimentos',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'taxa-cartao-rotativo-hoje',
			'label' => 'Rotativo do Cartão Hoje',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-sac-price',
			'label' => 'SAC x Price',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'simulador-tesouro-direto',
			'label' => 'Simulador Tesouro Direto',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'minha-taxa-de-emprestimo-esta-cara',
			'label' => 'Taxa de Empréstimo Cara?',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-taxa-equivalente',
			'label' => 'Taxa Equivalente',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-valor-presente-futuro',
			'label' => 'Valor Presente e Futuro',
			'cat'   => 'Financeiro',
		),
		array(
			'slug'  => 'calculadora-airbnb-vs-aluguel',
			'label' => 'Airbnb x Aluguel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-alugar-ou-comprar',
			'label' => 'Alugar ou Comprar',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-amortizacao-fgts',
			'label' => 'Amortização com FGTS',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-cet-financiamento-imobiliario',
			'label' => 'CET do Financiamento',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-custo-venda-imovel',
			'label' => 'Custo de Venda',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-custo-mensal-imovel',
			'label' => 'Custo Mensal de Imóvel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-custo-total-compra-imovel',
			'label' => 'Custo Total de Comprar Imóvel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-fgts-compra-imovel',
			'label' => 'FGTS na Compra',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-financiamento-imobiliario',
			'label' => 'Financiamento Imobiliário',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-garantias-aluguel',
			'label' => 'Garantias de Aluguel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-ir-aluguel',
			'label' => 'IR do Aluguel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-ir-ganho-capital-imovel',
			'label' => 'IR na Venda de Imóvel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-itbi-cartorio-imovel',
			'label' => 'ITBI e Cartório',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-financiamento-tr-ipca-prefixado',
			'label' => 'Linhas de Financiamento',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'simulador-minha-casa-minha-vida',
			'label' => 'Minha Casa Minha Vida',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-multa-rescisao-aluguel',
			'label' => 'Multa de Aluguel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-portabilidade-financiamento-imobiliario',
			'label' => 'Portabilidade Imobiliária',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-quanto-consigo-financiar',
			'label' => 'Quanto Consigo Financiar',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-reajuste-aluguel',
			'label' => 'Reajuste de Aluguel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-renda-para-financiar-imovel',
			'label' => 'Renda para Financiar',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-rentabilidade-aluguel',
			'label' => 'Rentabilidade de Aluguel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-valorizacao-imovel',
			'label' => 'Valorização de Imóvel',
			'cat'   => 'Imóveis',
		),
		array(
			'slug'  => 'calculadora-alocacao-carteira',
			'label' => 'Alocação de Carteira',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-aposentadoria',
			'label' => 'Aposentadoria',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-etf',
			'label' => 'Calculadora de ETF',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-fundos-imobiliarios',
			'label' => 'Calculadora de FII',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-cdb-vale-a-pena',
			'label' => 'CDB vale a pena?',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-cdi-cdb',
			'label' => 'CDI / CDB',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-come-cotas',
			'label' => 'Come-cotas',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-comparador-renda-fixa',
			'label' => 'Comparador Renda Fixa',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-conversor-taxa-juros',
			'label' => 'Conversor de Taxa',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-custo-oportunidade',
			'label' => 'Custo de Oportunidade',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-darf-acoes',
			'label' => 'DARF de Ações',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-dividendos',
			'label' => 'Dividendos',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-fundo-di-vs-cdb',
			'label' => 'Fundo DI x CDB',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-independencia-financeira',
			'label' => 'Independência Financeira',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-iof-renda-fixa',
			'label' => 'IOF em renda fixa',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-ir-investimentos',
			'label' => 'IR sobre Investimentos',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-jcp-liquido',
			'label' => 'JCP Líquido',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-lci-lca',
			'label' => 'LCI / LCA',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-marcacao-mercado-tesouro',
			'label' => 'Marcação a mercado',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-pgbl-vgbl',
			'label' => 'PGBL x VGBL',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-preco-medio-acoes',
			'label' => 'Preço Médio de Ações',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-preco-teto-bazin',
			'label' => 'Preço-Teto (Bazin)',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-previdencia-vale-a-pena',
			'label' => 'Previdência vale a pena?',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-rentabilidade-carteira',
			'label' => 'Rentabilidade da Carteira',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-rentabilidade-real',
			'label' => 'Rentabilidade Real',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-reserva-emergencia',
			'label' => 'Reserva de Emergência',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-simulador-aportes',
			'label' => 'Simulador de Aportes',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-tesouro-ipca',
			'label' => 'Tesouro IPCA',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-tesouro-selic',
			'label' => 'Tesouro Selic',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'calculadora-vpl-tir',
			'label' => 'VPL e TIR',
			'cat'   => 'Investimentos',
		),
		array(
			'slug'  => 'analisar-jogo-lotofacil',
			'label' => 'Analisar Jogo',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-maismilionaria',
			'label' => 'Analisar Jogo +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-diadesorte',
			'label' => 'Analisar Jogo Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-duplasena',
			'label' => 'Analisar Jogo Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-lotomania',
			'label' => 'Analisar Jogo Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-megasena',
			'label' => 'Analisar Jogo Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-quina',
			'label' => 'Analisar Jogo Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-supersete',
			'label' => 'Analisar Jogo Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'analisar-jogo-timemania',
			'label' => 'Analisar Jogo Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-maismilionaria',
			'label' => 'Combinações +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-diadesorte',
			'label' => 'Combinações Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-duplasena',
			'label' => 'Combinações Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-lotofacil',
			'label' => 'Combinações Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-lotomania',
			'label' => 'Combinações Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-megasena',
			'label' => 'Combinações Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-quina',
			'label' => 'Combinações Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-combinacoes-supersete',
			'label' => 'Combinações Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'comparar-jogos-lotomania',
			'label' => 'Comparar Jogos Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-lotofacil-historico',
			'label' => 'Conferidor Histórico',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-maismilionaria-historico',
			'label' => 'Conferidor Histórico +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-diadesorte-historico',
			'label' => 'Conferidor Histórico Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-duplasena-historico',
			'label' => 'Conferidor Histórico Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-lotomania-historico',
			'label' => 'Conferidor Histórico Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-megasena-historico',
			'label' => 'Conferidor Histórico Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-quina-historico',
			'label' => 'Conferidor Histórico Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-supersete-historico',
			'label' => 'Conferidor Histórico Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-timemania-historico',
			'label' => 'Conferidor Histórico Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-lotofacil',
			'label' => 'Conferir Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-lotomania',
			'label' => 'Conferir Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-megasena',
			'label' => 'Conferir Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'conferir-quina',
			'label' => 'Conferir Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-loteca',
			'label' => 'Custo de Apostas Loteca',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-diadesorte',
			'label' => 'Custo de Jogos Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-duplasena',
			'label' => 'Custo de Jogos Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-lotofacil',
			'label' => 'Custo de Jogos Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-supersete',
			'label' => 'Custo de Jogos Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-timemania',
			'label' => 'Custo de Jogos Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-maismilionaria',
			'label' => 'Custo Jogos +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-lotomania',
			'label' => 'Custo Jogos Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-megasena',
			'label' => 'Custo Jogos Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-custo-jogos-quina',
			'label' => 'Custo Jogos Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-maismilionaria',
			'label' => 'Desdobramento +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-diadesorte',
			'label' => 'Desdobramento Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-duplasena',
			'label' => 'Desdobramento Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-lotofacil',
			'label' => 'Desdobramento Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-lotomania',
			'label' => 'Desdobramento Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-megasena',
			'label' => 'Desdobramento Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-desdobramento-quina',
			'label' => 'Desdobramento Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-maismilionaria',
			'label' => 'Estatísticas +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-diadesorte',
			'label' => 'Estatísticas Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-duplasena',
			'label' => 'Estatísticas Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-loteca',
			'label' => 'Estatísticas Loteca',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-lotofacil',
			'label' => 'Estatísticas Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-lotomania',
			'label' => 'Estatísticas Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-megasena',
			'label' => 'Estatísticas Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-quina',
			'label' => 'Estatísticas Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-supersete',
			'label' => 'Estatísticas Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'estatisticas-timemania',
			'label' => 'Estatísticas Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-fechamento-lotofacil',
			'label' => 'Fechamento Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-fechamento-megasena',
			'label' => 'Fechamento Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-fechamento-quina',
			'label' => 'Fechamento Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-maismilionaria',
			'label' => 'Filtros +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-diadesorte',
			'label' => 'Filtros Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-duplasena',
			'label' => 'Filtros Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-lotofacil',
			'label' => 'Filtros Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-lotomania',
			'label' => 'Filtros Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-megasena',
			'label' => 'Filtros Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-quina',
			'label' => 'Filtros Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-filtros-timemania',
			'label' => 'Filtros Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-maismilionaria',
			'label' => 'Gerador +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-diadesorte',
			'label' => 'Gerador Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-duplasena',
			'label' => 'Gerador Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-loteca',
			'label' => 'Gerador Loteca',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-lotofacil',
			'label' => 'Gerador Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-lotomania',
			'label' => 'Gerador Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-megasena',
			'label' => 'Gerador Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-quina',
			'label' => 'Gerador Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-supersete',
			'label' => 'Gerador Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'gerador-timemania',
			'label' => 'Gerador Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-loteca',
			'label' => 'Montar Aposta Loteca',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-lotofacil',
			'label' => 'Montar Jogo',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-maismilionaria',
			'label' => 'Montar Jogo +Milionária',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-diadesorte',
			'label' => 'Montar Jogo Dia de Sorte',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-duplasena',
			'label' => 'Montar Jogo Dupla Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-lotomania',
			'label' => 'Montar Jogo Lotomania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-megasena',
			'label' => 'Montar Jogo Mega-Sena',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-quina',
			'label' => 'Montar Jogo Quina',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-supersete',
			'label' => 'Montar Jogo Super Sete',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'montar-jogo-timemania',
			'label' => 'Montar Jogo Timemania',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-probabilidade-lotofacil',
			'label' => 'Probabilidade Lotofácil',
			'cat'   => 'Loterias',
		),
		array(
			'slug'  => 'calculadora-adicao-subtracao-longa',
			'label' => 'Adição e subtração longa',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-algarismos-significativos',
			'label' => 'Algarismos significativos',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-area-perimetro',
			'label' => 'Área e Perímetro',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-arredondamento',
			'label' => 'Arredondamento',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-basica',
			'label' => 'Calculadora básica',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-circunferencia-circulo',
			'label' => 'Circunferência e círculo',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-analise-combinatoria',
			'label' => 'Combinatória',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-comparar-fracoes',
			'label' => 'Comparar frações',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'conversor-de-unidades',
			'label' => 'Conversor de Unidades',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-decimal-para-fracao',
			'label' => 'Decimal para fração',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-decimal-para-porcentagem',
			'label' => 'Decimal para porcentagem',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-desvio-padrao-variancia',
			'label' => 'Desvio padrão',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-dias-entre-datas',
			'label' => 'Dias entre Datas',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-divisao-longa',
			'label' => 'Divisão longa',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-equacao-primeiro-grau',
			'label' => 'Equação 1º grau',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-equacao-segundo-grau',
			'label' => 'Equação do 2º Grau',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fatoracao-prima',
			'label' => 'Fatoração prima',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fatores-comuns',
			'label' => 'Fatores comuns',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fatores-de-um-numero',
			'label' => 'Fatores de um número',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-forma-expandida',
			'label' => 'Forma expandida',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-forma-padrao',
			'label' => 'Forma padrão de um número',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracao-mista',
			'label' => 'Fração mista',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracao-para-decimal',
			'label' => 'Fração para decimal',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracao-para-porcentagem',
			'label' => 'Fração para porcentagem',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracoes',
			'label' => 'Frações',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracoes-complexas',
			'label' => 'Frações complexas',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracoes-equivalentes',
			'label' => 'Frações equivalentes',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-fracoes-mistas',
			'label' => 'Frações mistas',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-funcao-primeiro-grau',
			'label' => 'Função do 1º Grau',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-funcao-segundo-grau',
			'label' => 'Função do 2º grau',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-funcao-exponencial',
			'label' => 'Função exponencial',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-geometria-analitica',
			'label' => 'Geometria analítica',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-idade',
			'label' => 'Idade',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-lei-senos-cossenos',
			'label' => 'Lei senos e cossenos',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-logaritmo',
			'label' => 'Logaritmo',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-mdc-euclides',
			'label' => 'MDC por Euclides',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-media',
			'label' => 'Média',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-media-fracoes',
			'label' => 'Média de frações',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-mediana-moda',
			'label' => 'Mediana e moda',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-mmc-mdc',
			'label' => 'MMC e MDC',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-modulo',
			'label' => 'Módulo (resto)',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-multiplicacao-rede',
			'label' => 'Multiplicação em rede',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-multiplicacao-longa',
			'label' => 'Multiplicação longa',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-multiplos',
			'label' => 'Múltiplos',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-notacao-cientifica',
			'label' => 'Notação científica',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-conversor-notacao-cientifica',
			'label' => 'Notação científica e engenharia',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-numero-misto-decimal',
			'label' => 'Número misto para decimal',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-numero-por-extenso',
			'label' => 'Número por extenso',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-numeros-primos',
			'label' => 'Números primos',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-numeros-romanos',
			'label' => 'Números Romanos',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-ordenar-fracoes',
			'label' => 'Ordenar frações',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-progressoes',
			'label' => 'PA e PG',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-porcentagem-para-fracao',
			'label' => 'Porcentagem para fração',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-potencia-raiz',
			'label' => 'Potência e Raiz',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-preco-unitario',
			'label' => 'Preço unitário',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-probabilidade',
			'label' => 'Probabilidade',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-diamante',
			'label' => 'Problema diamante',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-proporcao-aurea',
			'label' => 'Proporção áurea',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-razao',
			'label' => 'Razão',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-regra-de-tres',
			'label' => 'Regra de Três',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-simplificar-fracao',
			'label' => 'Simplificar fração',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-sistemas-lineares',
			'label' => 'Sistemas lineares',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-tabuada',
			'label' => 'Tabuada',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-pitagoras',
			'label' => 'Teorema de Pitágoras',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-trigonometria',
			'label' => 'Trigonometria',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-resolver-proporcao',
			'label' => 'Valor de X na proporção',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-velocidade-distancia-tempo',
			'label' => 'Velocidade e tempo',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-volume-solidos',
			'label' => 'Volume de sólidos',
			'cat'   => 'Matemática',
		),
		array(
			'slug'  => 'calculadora-primeiro-funcionario-simples',
			'label' => '1º Funcionário no Simples',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-capital-giro',
			'label' => 'Capital de Giro',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-custo-abrir-empresa',
			'label' => 'Custo de Abrir Empresa',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-custo-demitir-empregador',
			'label' => 'Custo de Demitir',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-das-em-atraso',
			'label' => 'DAS em Atraso',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-mei-das',
			'label' => 'DAS MEI',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-das-mei-caminhoneiro',
			'label' => 'DAS MEI Caminhoneiro',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-dasn-simei',
			'label' => 'DASN-SIMEI',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-desconto-maximo',
			'label' => 'Desconto Máximo',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-desenquadramento-mei',
			'label' => 'Desenquadramento do MEI',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-difal',
			'label' => 'DIFAL',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-distribuicao-lucros-socio',
			'label' => 'Distribuição de Lucros',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-dre-simplificada',
			'label' => 'DRE Simplificada',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-estagiario-clt-pj',
			'label' => 'Estagiário x CLT x PJ',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-fator-r',
			'label' => 'Fator R',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-faturamento-mei',
			'label' => 'Faturamento MEI',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-fluxo-caixa-projetado',
			'label' => 'Fluxo de Caixa Projetado',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-icms-st',
			'label' => 'ICMS-ST',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-lucro-liquido',
			'label' => 'Lucro Líquido',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-lucro-presumido',
			'label' => 'Lucro Presumido',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-lucro-real',
			'label' => 'Lucro Real',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-margem-contribuicao',
			'label' => 'Margem de Contribuição',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-markup',
			'label' => 'Markup',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'comparador-regimes-tributarios',
			'label' => 'MEI x Simples x Presumido',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-migracao-regime',
			'label' => 'Migração de Regime',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-ponto-equilibrio',
			'label' => 'Ponto de Equilíbrio',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-pode-contratar',
			'label' => 'Posso Contratar',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-preco-venda',
			'label' => 'Preço de Venda',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-preco-hora-servico',
			'label' => 'Preço por Hora',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-pro-labore',
			'label' => 'Pró-Labore',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-pro-labore-ideal',
			'label' => 'Pró-Labore Ideal',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-pro-labore-vs-clt-socio',
			'label' => 'Pró-Labore vs CLT do Sócio',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-retencao-impostos-nota',
			'label' => 'Retenções na Nota',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-simples-nacional',
			'label' => 'Simples Nacional',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-sublimite-simples',
			'label' => 'Sublimite do Simples',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-vale-a-pena-mei',
			'label' => 'Vale a pena virar MEI',
			'cat'   => 'MEI e Empresa',
		),
		array(
			'slug'  => 'calculadora-agua-diaria',
			'label' => 'Água Diária',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-calorias-diarias',
			'label' => 'Calorias Diárias',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-relacao-cintura-quadril',
			'label' => 'Cintura-Quadril',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-data-provavel-parto',
			'label' => 'Data do Parto',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-frequencia-cardiaca-alvo',
			'label' => 'Frequência Cardíaca',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-gordura-corporal',
			'label' => 'Gordura Corporal',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-idade-gestacional',
			'label' => 'Idade Gestacional',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-imc',
			'label' => 'IMC',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-macronutrientes',
			'label' => 'Macronutrientes',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-periodo-fertil',
			'label' => 'Período Fértil',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-peso-ideal',
			'label' => 'Peso Ideal',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-sono',
			'label' => 'Sono',
			'cat'   => 'Saúde',
		),
		array(
			'slug'  => 'calculadora-base64',
			'label' => 'Base64',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-diff-texto',
			'label' => 'Comparador de Texto',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-binario-decimal-hexadecimal',
			'label' => 'Conversor de Bases',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-conversor-dados',
			'label' => 'Conversor de Dados',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-cron',
			'label' => 'Cron',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-ferramentas-css',
			'label' => 'Ferramentas CSS',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-ferramentas-devops',
			'label' => 'Ferramentas DevOps',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-formatador-codigo',
			'label' => 'Formatador de Código',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-hash',
			'label' => 'Hash SHA',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-json',
			'label' => 'JSON Formatter',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-jwt',
			'label' => 'JWT Decoder',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-markdown-preview',
			'label' => 'Markdown Preview',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-qr-code',
			'label' => 'QR Code',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-regex',
			'label' => 'Regex Tester',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-senha-forte',
			'label' => 'Senha Forte',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-subnet',
			'label' => 'Subnet IPv4',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-timestamp-unix',
			'label' => 'Timestamp Unix',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-url-encode-decode',
			'label' => 'URL Encode/Decode',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-uuid',
			'label' => 'UUID',
			'cat'   => 'Tecnologia',
		),
		array(
			'slug'  => 'calculadora-abono-salarial-pis-pasep',
			'label' => 'Abono Salarial PIS/PASEP',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-adicional-transferencia',
			'label' => 'Adicional de Transferência',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-adicional-noturno',
			'label' => 'Adicional Noturno',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-adicional-tempo-servico',
			'label' => 'Adicional por Tempo de Serviço',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-aposentadoria-inss',
			'label' => 'Aposentadoria INSS',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-atualizacao-debitos-trabalhistas',
			'label' => 'Atualização de Débitos',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-auxilio-doenca',
			'label' => 'Auxílio-Doença',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-aviso-previo',
			'label' => 'Aviso Prévio',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-aviso-previo-proporcional',
			'label' => 'Aviso Prévio Proporcional',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-banco-de-horas',
			'label' => 'Banco de Horas',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-bolsa-estagio',
			'label' => 'Bolsa de Estágio',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'clt-vs-pj',
			'label' => 'CLT vs PJ',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'conferir-holerite',
			'label' => 'Conferir Holerite',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-custo-funcionario',
			'label' => 'Custo do Funcionário',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-decimo-terceiro-clt',
			'label' => 'Décimo Terceiro CLT',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'comparador-pedir-demissao-vs-acordo',
			'label' => 'Demissão vs Acordo',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-desconto-faltas',
			'label' => 'Desconto de Faltas',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-dsr',
			'label' => 'DSR',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-comissao-e-dsr-sobre-comissoes',
			'label' => 'DSR sobre Comissões',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-escala-12x36',
			'label' => 'Escala 12x36',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-estabilidade-gestante',
			'label' => 'Estabilidade da Gestante',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-feriado-trabalhado',
			'label' => 'Feriado Trabalhado',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-ferias-clt',
			'label' => 'Férias CLT',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-ferias-vencidas-em-dobro',
			'label' => 'Férias em Dobro',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-fgts',
			'label' => 'FGTS',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-horas-extras',
			'label' => 'Horas Extras',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-horas-trabalhadas',
			'label' => 'Horas Trabalhadas',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-insalubridade',
			'label' => 'Insalubridade',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-inss',
			'label' => 'INSS',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-inss-autonomo',
			'label' => 'INSS Autônomo',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-intervalo-intrajornada',
			'label' => 'Intervalo Intrajornada',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-irrf',
			'label' => 'IRRF',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-irrf-13o-salario',
			'label' => 'IRRF do 13º',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-jornada-trabalho',
			'label' => 'Jornada de Trabalho',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-multa-40-fgts',
			'label' => 'Multa 40% FGTS',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-multa-art-477',
			'label' => 'Multa do Art. 477',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-periculosidade',
			'label' => 'Periculosidade',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-plr',
			'label' => 'PLR',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-gorjeta-rateio',
			'label' => 'Rateio de Gorjetas',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-reajuste-salarial-dissidio',
			'label' => 'Reajuste Salarial',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-rescisao-clt',
			'label' => 'Rescisão CLT',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-rescisao-contrato-experiencia',
			'label' => 'Rescisão Contrato Experiência',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-rescisao-domestica',
			'label' => 'Rescisão Doméstica',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-rescisao-indireta',
			'label' => 'Rescisão Indireta',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-rescisao-por-acordo',
			'label' => 'Rescisão por Acordo',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-rescisao-justa-causa',
			'label' => 'Rescisão por Justa Causa',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-salario-bruto-a-partir-do-liquido',
			'label' => 'Salário Bruto pelo Líquido',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-salario-liquido-clt',
			'label' => 'Salário Líquido CLT',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-salario-por-hora',
			'label' => 'Salário por Hora',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-salario-proporcional-admissao',
			'label' => 'Salário Proporcional',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-salario-familia',
			'label' => 'Salário-Família',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-salario-maternidade',
			'label' => 'Salário-Maternidade',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-saque-aniversario-fgts',
			'label' => 'Saque-Aniversário FGTS',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'comparador-saque-aniversario-vs-saque-rescisao',
			'label' => 'Saque-Aniversário vs Rescisão',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-seguro-desemprego',
			'label' => 'Seguro-Desemprego',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-vale-transporte',
			'label' => 'Vale-Transporte',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-vender-um-terco-das-ferias',
			'label' => 'Vender 1/3 das Férias',
			'cat'   => 'Trabalhista',
		),
		array(
			'slug'  => 'calculadora-comparar-carros',
			'label' => 'Comparar Carros',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-consumo-combustivel',
			'label' => 'Consumo de Combustível',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-custo-por-km',
			'label' => 'Custo por Km',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-custo-total-carro',
			'label' => 'Custo Total de Carro',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-depreciacao-veiculo',
			'label' => 'Depreciação de Veículo',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-financiamento-veiculo',
			'label' => 'Financiamento Veículo',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-ipva-licenciamento',
			'label' => 'IPVA e Licenciamento',
			'cat'   => 'Veículos',
		),
		array(
			'slug'  => 'calculadora-cartao-exterior',
			'label' => 'Cartão no Exterior',
			'cat'   => 'Viagem',
		),
		array(
			'slug'  => 'calculadora-conversao-moeda-viagem',
			'label' => 'Conversão de Moeda',
			'cat'   => 'Viagem',
		),
		array(
			'slug'  => 'calculadora-custo-viagem',
			'label' => 'Custo de Viagem',
			'cat'   => 'Viagem',
		),
		array(
			'slug'  => 'calculadora-divisao-despesas-viagem',
			'label' => 'Dividir Despesas',
			'cat'   => 'Viagem',
		),
		array(
			'slug'  => 'calculadora-orcamento-viagem',
			'label' => 'Orçamento de Viagem',
			'cat'   => 'Viagem',
		),
		array(
			'slug'  => 'calculadora-tempo-viagem',
			'label' => 'Tempo de Viagem',
			'cat'   => 'Viagem',
		),
		array(
			'slug'  => 'calculadora-valor-milheiro',
			'label' => 'Valor do Milheiro',
			'cat'   => 'Viagem',
		),
	);
}
