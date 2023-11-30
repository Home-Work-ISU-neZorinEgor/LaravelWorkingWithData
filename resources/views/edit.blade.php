@extends('layouts.app')

@section('content')
    <h1>Редактировать задачу</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('todos.update', $todo->id) }}">
        @csrf
        @method('PUT')
        
        <label for="title">Заголовок:</label>
        <input type="text" name="title" id="title" value="{{ $todo->title }}" required>
        
        <label for="description">Описание:</label>
        <textarea name="description" id="description" required>{{ $todo->description }}</textarea>
        
        <button type="submit">Обновить задачу</button>
    </form>
@endsection
