@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    <div>Cart items</div>
    @if ($cart)
        @foreach ($cart as $item)
            <a href={{ route('item.show', [$item['id']]) }}>{{ $item['name'] }}</a>
            <div>
                <form method="POST" action={{ route('cart.update', $item['id']) }}>
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="item-update" value="decrement"/>
                    <button type="submit">-</button>
                </form>
                <div>Quantity: {{ $item['quantity'] }}</div>
                <div>Price: {{ $item['price'] }}</div>
                <form method="POST" action={{ route('cart.update', $item['id']) }}>
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="item-update" value="increment"/>
                    <button type="submit">+</button>
                </form>
            </div>
            <form method="POST" action={{ route('cart.destroy', [$item['id']]) }}>
                @csrf
                @method('DELETE')
                <button type="submit">x</button>
            </form>
        @endforeach
    @else
        <div>Cart is empty</div>
    @endif
@endsection