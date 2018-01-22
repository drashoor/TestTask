<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tasks'] = Task::latest()->paginate(10);

        return View('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('tasks.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        Task::create(request()->all());

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return View('tasks.form', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {

        if (Task::where('pkey', $id)->update($request->except(['_token', '_method']))) {
            flash('Deleted Succesfully.');
        } else {
            flash('Something Wrong!');
        }

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('pkey', $id);

        if ($task->delete()) {
            flash('Deleted Succesfully.');
        } else {
            flash('Something Wrong!');
        }

        return redirect('tasks');
    }
}
