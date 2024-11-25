@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
    <div class="row container">


      @if ($mensagem = Session::get('sucesso'))
      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">Obrigado,</span>
          <p>{{$mensagem}} </p>
        </div>
      </div>
      @endif
        
        <h5>Seu Carrinho possui: {{$itens->count()}} produtos.</h5>
        
        <table class="highlight">
          <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
          </thead>
        @foreach ($itens as $item)
          <tbody>
            <tr>
              <td><img src="{{'$item->attributes->image'}}" alt="" width="70" class="responsive_img circle"></td>
              <td>{{$item->name}}</td>
              <td>R$ {{number_format($item->price, 2, ',', '.')}}</td>
              <td><input style="width: 40px; font-weight:900;" class="white center" type="number"  name="quantity" value="{{$item->quantity}}"></td>
              <td>
                <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                
                
              <form action="{{route('site.removeCarrinho')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">  
                <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
              </form>
              
              
              
              </td>
            </tr>
            @endforeach
         
          </tbody>
        </table>

        <div class="row container center">
          <button class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></button>
          <button class="btn waves-effect waves-light blue">Limpar Carrinho<i class="material-icons">clear</i></button>
          <button class="btn waves-effect waves-light green">Finalizar Pedido<i class="material-icons">check</i></button>
        </div>

    </div>
@endsection

