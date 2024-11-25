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

      @if ($mensagem = Session::get('aviso'))
      <div class="card blue">
        <div class="card-content white-text">
          <span class="card-title">Que pena,</span>
          <p>{{$mensagem}} </p>
        </div>
      </div>
      @endif
        
      @if ($itens->count() == 0)
        
      <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">Seu Carrinho esta vazio,</span>
          <p>Aproveite nossas Promoções!!!</p>
        </div>
      </div>
    
      @else
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
            
            {{-- BTN ATUALIZAR --}}
            <form action="{{route('site.atualizaCarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}"> 
            <td><input style="width: 40px; font-weight:900;" min="1" class="white center" type="number"  name="quantity" value="{{$item->quantity}}"></td>
            <td>
              <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
            </form>
              
            {{-- BTN REMOVER --}}
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
      

      <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title"><b> Total: R$ {{number_format(\Cart::getTotal(), 2, ',', '.')}}</b></span>
          <p>Pague em 12x sem juros</p>
        </div>
      </div>

      @endif

        <div class="row container center">
          <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></a>
          <a href="{{route('site.limparCarrinho')}}" class="btn waves-effect waves-light blue">Limpar Carrinho<i class="material-icons">clear</i></a>
          <button class="btn waves-effect waves-light green">Finalizar Pedido<i class="material-icons">check</i></button>
        </div>

    </div>
@endsection

