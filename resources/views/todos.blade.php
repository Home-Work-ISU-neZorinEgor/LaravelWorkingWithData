@extends('layouts.app')

@section('content')
    <h1>Задачи</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/todos" class="todo-form">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок:</label>
            <input type="text" name="title" id="title" required>
        </div>
        
        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        
        <button type="submit">Добавить задачу</button>
    </form>
@endsection
