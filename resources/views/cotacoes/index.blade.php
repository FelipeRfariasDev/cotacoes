@extends('layouts.app')
@section('content')

<form action="/" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="row">
    <div class="col-12">
        <label class="col-form-label">Valor(Compra) para conversão R$</label>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <select name="valor_real_BRL" class="form-control" required>
        <option value="1000">1.000.00</option>
        <option value="5000">5.000,00</option>
        <option value="70000">70.000,00</option>
      </select>
    </div>
  </div>  
  <div class="row">
    <div class="col-12">
      <label>Moeda para conversão</label>
        <select name="nome_moeda_destino" class="form-control" required>
        @foreach($getValorMoedas as $moeda)
          <option value="{{$moeda["code"]}}">{{$moeda["name"]}}</option>
        @endforeach
    </select>
    </div>
  </div>
  <div class="row">  
    <div class="col-12">
    <label>Forma de Pagamento</label>
    <select name="forma_pagamento" class="form-control" required>
      <option value="boleto">Boleto</option>
      <option value="cartao_credito">Cartão de Crédito</option>
    </select>
    </div>
  </div> 
  <div class="row">  
    <div class="col-12">
      <input type="submit" value="Calcular" class="btn btn-success" style="margin-top: 10px;">
    </div>
  </div>
</form>    
  @if($exibir_resultado)
  <div>
    
      <h3>Cotações Resultado Parâmetros de saída:</h3>

      <strong>Moeda de origem BRL R$</strong> {{$moeda_origem_blr}} <br>
      <strong>Forma de pagamento</strong> {{$forma_pagamento}} <br>
      <strong>Moeda de destino {{$nome_moeda_destino}}</strong> {{$valor_moeda_destino}}<br>
      <strong>Valor Total R$ </strong> {{$valor_total_reais}}<br>
      <strong>Taxa Conversão R$ </strong>{{$vrl_taxa_conversao_reais}}<br>
      <strong>Valor Total + Taxa Conversão R$ ({{$getJurosValorTotalPercentual}}%) </strong> {{$vrl_tot_mult_taxa_conversao}}<br>
      <strong>Valor Total + Juros R$ ({{$getJurosTipoPagamento[$forma_pagamento]}}) </strong> {{$valor_total_reais_juros}}<br>
      <strong>Cotação realizada em</strong> {{$data_hora_cotacao}}
  </div>

  <div>

    <h3>Cotações Resultado Parâmetros de saída:</h3>

    <strong>Moeda de origem:</strong> BRL <br>
    <strong>Moeda de destino:</strong> USD <br>
    <strong>Valor para conversão:</strong> R$ 5.000,00 <br>
    <strong>Forma de pagamento:</strong> Boleto <br>
    <strong>Valor da "Moeda de destino" usado para conversão:</strong> $ 5,30 <br>
    <strong>Valor comprado em "Moeda de destino":</strong> $ 921,03 (taxas aplicadas no valor de compra diminuindo no valor total de conversão) <br>
    <strong>Taxa de pagamento:</strong> R$ 68,50 <br>
    <strong>Taxa de conversão:</strong> R$ 50,00 <br>
    <strong>Valor utilizado para conversão descontando as taxas:</strong> R$ 4.881,50 
  </div>
  @endif
 
@endsection
