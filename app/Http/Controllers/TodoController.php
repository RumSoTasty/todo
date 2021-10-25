<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todo()
    {
        $todos = Todo::getAllUndone();

        return view('todo', [
            'todos' => $todos
        ]);
    }

    public function todoDonelist()
    {
        $todos = Todo::getAllDone();

        return view('tododonelist', [
            'todos' => $todos
        ]);
    }

    public function todoCheck(Request $request)
    {
        $todo = Todo::form($request);
        $todo->save();

        return redirect()->route('todo');
    }

    public function todoDone(int $id)
    {
        $todo = Todo::find($id);
        $todo->status = Todo::DONE;
        $todo->save();

        return redirect()->route('todo');
    }

    public function todoUndone(int $id)
    {
        $todo = Todo::find($id);
        $todo->status = Todo::UNDONE;
        $todo->save();

        return redirect()->route('todo_done_list');
    }
}
