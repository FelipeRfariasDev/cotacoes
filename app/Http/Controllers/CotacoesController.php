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
            $data_hora_cotacao = date('d/m/Y H:i:s', time());
            
            return view('cotacoes.index', [
                "exibir_resultado"      =>  true,
                "moeda_origem_blr"      =>  number_format($valor_real_BRL,2,',','.'),
                "nome_moeda_destino"    =>  $nome_moeda_destino,
                "valor_moeda_destino"   =>  $valor_moeda_destino,
                "forma_pagamento"       =>  $forma_pagamento,
                "valor_total_reais"     =>  number_format($valor_total_multiplicado,2,',','.'),
                "data_hora_cotacao"     =>  $data_hora_cotacao,
                "getValorMoedas"        =>  $getValorMoedas

            ]);

        }
        return view('cotacoes.index', ["getValorMoedas"=>$getValorMoedas,"exibir_resultado" => false]);
    }
}
