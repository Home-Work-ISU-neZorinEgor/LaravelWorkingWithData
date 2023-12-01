@extends('layouts.app')

@section('content')
    <h1>Создать задачу</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('todos.store') }}">
        @csrf
        <label for="title">Заголовок:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Описание:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="user_id">Назначить пользователей:</label>
<select name="user_id[]" id="user_id" multiple>
    @isset($users)
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    @else
        <option value="" disabled selected>Не удалось получить список пользователей</option>
    @endisset
</select>


        <button type="submit">Добавить задачу</button>
    </form>

@endsection
