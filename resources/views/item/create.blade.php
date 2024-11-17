@extends('layouts.admin')

@section('content')
    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}"/>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label>Price</label>
        <input type="text" name="price" value="{{ old('price') }}"/>
        @error('price')
            <p>{{ $message }}</p>
        @enderror

        <label>Description</label>
        <textarea name="description" cols="30" rows="4">{{ old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <label>Pictures</label>
        <input type="file" name="photos">
        @error('photos')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Upload</button>
    </form>


@endsection