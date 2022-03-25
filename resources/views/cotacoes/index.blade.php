@extends('layouts.app')
@section('content')

<h1>Cotações</h1>


<form action="/resultado" method="POST">

<label>Valor em Reais</label>

<select name="valor_real_BRL"  required>
  <option value="1000">1.000.00</option>
  <option value="5000">5.000,00</option>
  <option value="70000">70.000,00</option>
</select>

<label>Moeda para conversão</label>
<select name="nome_moeda_destino"  required>
  @foreach($getValorMoedas as $moeda)
    <option value="{{$moeda["code"]}}">{{$moeda["name"]}}</option>
    @endforeach
</select>

<select name="forma_pagamento" required>
  <option value="boleto">Boleto</option>
  <option value="cartao_credito">Cartão de Crédito</option>
</select>

<input type="submit" value="Calcular">


@endsection
