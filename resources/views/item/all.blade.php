@extends('layouts.main')

@section('content')
    @foreach ($items as $item)
        <div>
            <x-item :item="$item"/>
        </div>
    @endforeach
@endsection