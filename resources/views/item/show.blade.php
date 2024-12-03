@extends('layouts.main')

@section('content')
    <a href={{ route('item.all') }}>Back</a>
    @isset($item)
        <h4>{{$item->name}}</h4>
        <h4>{{$item->price}}</h4>
        <p>{{$item->description}}</p>
    @endisset
@endsection