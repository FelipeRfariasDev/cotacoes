@extends('layouts.app')
@section('content')

<form action="/" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="row">
    <div class="col-12">
        <label class="col-form-label">Valor em Reais</label>
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
    
      <h3>Cotações Resultado</h3>

      <strong>Moeda de origem BRL R$</strong> {{$moeda_origem_blr}} <br>
      <strong>Moeda de destino</strong> {{$nome_moeda_destino}} {{$valor_moeda_destino}}<br>
      <strong>Forma de pagamento</strong> {{$forma_pagamento}} <br>
      <strong>R$ Valor Total</strong> {{$valor_total_reais}}<br>
      <strong>Cotação realizada em</strong> {{$data_hora_cotacao}}
  </div>
  @endif
 
@endsection
