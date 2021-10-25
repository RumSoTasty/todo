<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    const UNDONE = 0;
    const DONE = 1;

    use HasFactory;

    public function validate(Request $request)
    {
        return $request->validate([
            'title' => 'required|max:100',
            'message' => 'required'
        ]);
    }

    public static function form(Request $request) : self
    {
        $todo = new self;
        $todo->validate($request);
        $todo->title = $request->input('title');
        $todo->message = $request->input('message');
        $todo->user_id = Auth::user()->id;
        $todo->status = self::UNDONE;

        return $todo;
    }

    public static function getAllUndone()
    {
        $userId = Auth::user()->id;
        return self::where('status', self::UNDONE)
            ->where('user_id', $userId)
            ->get();
    }

    public static function getAllDone()
    {
        $userId = Auth::user()->id;
        return self::where('status', self::DONE)
            ->where('user_id', $userId)
            ->get();
    }
    
}
