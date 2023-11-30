@extends('layouts.app')

@section('content')
    <h1>Редактировать назначителя</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <button type="submit">Обновить назначителя</button>
    </form>

    <a href="{{ route('users.index') }}">Назад к списку назначителей</a>
@endsection
