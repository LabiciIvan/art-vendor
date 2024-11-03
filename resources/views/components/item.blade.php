<div>
    <a href={{ route('item.show', ['id' => $item->id]) }}> {{$item->name}} </a>
    {{-- <a href={{"/item/{$item->id}"}}> {{$item->name}} </a> --}}
    <p> {{$item->price}} </p>
    <p> {{$item->description}} </p>
</div>