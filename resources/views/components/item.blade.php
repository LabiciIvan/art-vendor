<div>
    <a href={{ route('item.show', ['id' => $item->id]) }}> {{$item->name}} </a>
    <p><strong>Price:</strong> {{$item->price}} </p>
    <p><strong>Description:</strong>{{$item->description}} </p>
    <form method='POST' action={{ route('cart.store') }}>
        @csrf
        <input type='hidden' name="id" value="{{ $item->id }}"/>
        <input type='hidden' name="name" value="{{ $item->name }}"/>
        <input type='hidden' name="price" value="{{ $item->price }}"/>
        <input type='hidden' name="quantity" value="{{ $item->quantity !== 0 ? 1 : 0 }}"/>
        <button type="submit">Add Cart</button>
    </form>
</div>