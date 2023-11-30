<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;


class TodoController extends Controller
{ public function index()
    {
        return view('welcome');
    }
    
    public function show(Todo $todo)
    {
        return response()->json(['todo' => new TodoResource($todo)], 200);
    }

    public function create()
{
    $users = User::all();
    return view('todos.create', compact('users'));
}

// В методе store, сохраните связанных пользователей
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $todo = Todo::create([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    // Привязываем выбранных пользователей к задаче
    if ($request->has('assignees')) {
        $todo->assignees()->attach($request->assignees);
    }

        return redirect('view-todos')->with('success', 'Задача успешно создана!');

}

// В методе edit, передайте список пользователей в представление
public function edit(Todo $todo)
{
    $users = User::all();
    return view('edit', compact('todo', 'users'));
}
    

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $todo->update($request->all());
    
        return redirect('view-todos')->with('success', 'Задача успешно обновленна!');
    }
    

    public function viewTodosList()
{
    $todos = Todo::all();
    return view('view_todos', ['todos' => $todos]);
}

   public function viewTodos()
{
    $todos = Todo::all(); 
    return view('todos', ['todos' => $todos]);
}


    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')
            ->with('success', 'Задача успешно удалена');
    }

    public function softDelete(Todo $todo)
    {
        $todo->delete();
        // $softDeletedTodos = Todo::onlyTrashed()->get();


        return redirect('/view-todos')->with('success', 'Задача успешно удалена (мягкое удаление)!');
        
    }

    
    

}
