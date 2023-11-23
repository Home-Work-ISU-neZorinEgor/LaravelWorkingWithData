<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource; 
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Todo::create($request->all());

        return redirect('/todos')->with('success', 'Задача успешно созданна!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $todo->update($request->all());

        return redirect('/todos')->with('success', 'Задача успешно обнавленна!');
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


        return redirect('/todos')->with('success', 'Задача успешно удалена (мягкое удаление)!');
        
    }
    

}
