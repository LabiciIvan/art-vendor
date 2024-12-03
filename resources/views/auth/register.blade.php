@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('register.user') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name">
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label>Email</label>
        <input type="text" name="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <label>Password</label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror


        <label>Password Repeat</label>
        <input type="password" name="password_confirmation">

        @error('password_confirmation')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Register</button>
    </form>
@endsection