<?php

namespace App\Http\Controllers;

use App\Models\Cotacoes;
use Illuminate\Http\Request;

class CotacoesController extends Controller
{

    public function index()
    {
        $cotacoes = new Cotacoes();
        $getValorMoedas = $cotacoes->getValorMoedas();
        return view('cotacoes.index', ["getValorMoedas"=>$getValorMoedas]);
    }

    public function resultado()
    {
        
        if($_POST){
            $valor_real_BRL = $_POST['valor_real_BRL'];
            $nome_moeda_destino = $_POST['nome_moeda_destino'];
            $forma_pagamento = $_POST['forma_pagamento'];

            $cotacoes = new Cotacoes();
            $exibirValoresConvertido = $cotacoes->getValorConvertidoMoedaDestino($valor_real_BRL,$nome_moeda_destino);
            $nome_moeda_destino = $exibirValoresConvertido["nome_moeda_destino"];
            $valor_real_BRL = ($exibirValoresConvertido["valor_real_BRL"]);
            $valor_moeda_destino = $exibirValoresConvertido["valor_moeda_destino"];
            $valor_total_multiplicado = $exibirValoresConvertido["valor_total_multiplicado"];

            echo "Moeda de origem: BRL R$ ".number_format($valor_real_BRL,2,',','.')."<br>";
            echo "Moeda de origem $nome_moeda_destino: ".$valor_moeda_destino."<br>";
            echo "Forma de pagamento: $forma_pagamento <br>";
            echo "R$ Valor Total: ".number_format($valor_total_multiplicado,2,',','.')."<br>";
            $data_hora_cotacao = date('d/m/Y H:i:s', time());
            echo "Cotação realizada em $data_hora_cotacao";

        }

        return view('cotacoes.resultado', []);
    }
}
