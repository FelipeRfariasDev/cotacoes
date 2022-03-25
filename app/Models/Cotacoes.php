<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacoes extends Model
{
    use HasFactory;
    

    public function getValorMoedas(){
        $curl = curl_init();
      
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://economia.awesomeapi.com.br/json/all",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "GET"
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        $retorno = json_decode($response,true);
      
        return $retorno;
      }

      public function getValorConvertidoMoedaDestino($valor_real_BRL,$nome_moeda_destino){
        $getValorMoedas = $this->getValorMoedas();
        $valor_unitario_moeda_destino = ($getValorMoedas["$nome_moeda_destino"]["bid"]);
        $valor_total_multiplicado = ($valor_real_BRL * $valor_unitario_moeda_destino);
      
        return [
          "valor_real_BRL"=>$valor_real_BRL,
          "valor_moeda_destino"=>$valor_unitario_moeda_destino,
          "valor_total_multiplicado"=>$valor_total_multiplicado,
          "nome_moeda_destino"=>$nome_moeda_destino
        ];
      }
}
