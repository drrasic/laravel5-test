<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    //

    public function index() {
        $tasks = Task::all();

        return view("tasks.index", compact('tasks'));
    }

    public function show($id) {
        $task = Task::findOrFail($id);

        dd($task);

        return $task;
    }
}
