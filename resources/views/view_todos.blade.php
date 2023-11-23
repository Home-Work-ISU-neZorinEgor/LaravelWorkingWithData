@extends('layouts.app')

@section('content')
    <h1>Задачи</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($todos->count() > 0)
        @foreach ($todos as $todo)
            <div class="task">
                <h2>{{ $todo->title }}</h2>
                <p>{{ $todo->description }}</p>
                <form method="POST" action="{{ route('todos.soft-delete', $todo->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="button1" type="submit">Удалить (мягкое)</button>
                </form>
            </div>
        @endforeach
    @else
        <p>Задачи отсутствуют.</p>
    @endif
@endsection
