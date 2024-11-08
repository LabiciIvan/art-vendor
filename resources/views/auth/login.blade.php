@extends('layouts.auth')

@section('content')
    <form method="POST"  action="{{ route('login.user') }}">
        @csrf

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

        <button type="submit">Login</button>
    </form>
@endsection