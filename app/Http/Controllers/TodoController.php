<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;


class TodoController extends Controller
{
     public function index()
    {
        return view('welcome');
    }
    
    public function show(Todo $todo)
    {
        return view('todos', compact('todo'));
    }

    public function create()
    {
        $users = User::all();
        return view('todos', compact('users')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|array',
        ]);

        $todo = Todo::create($request->all());
        $todo->users()->attach($request->input('user_id'));

        return redirect()->route('todos.index')
            ->with('success', 'Задача успешно создана');
    }

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



        return redirect('/view-todos')->with('success', 'Задача успешно удалена (мягкое удаление)!');
    
    
    }

    
    

}
