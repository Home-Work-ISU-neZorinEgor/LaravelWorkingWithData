@extends('layouts.app')

@section('content')
    <h1>Информация о назначителе</h1>

    <p>ID: {{ $user->id }}</p>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <a href="{{ route('users.index') }}">Назад к списку назначителей</a>
@endsection
