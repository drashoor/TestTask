<?php

namespace App\Http\Controllers;

use App\cUrl;
use App\Http\Requests\TaskRequest;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class TasksApiController extends Controller
{
    use cUrl;

    public function __construct()
    {
        // Prepare cUrl Client
        $this->preparecUrl();
    }

    /**
     * Browse All Tasks Through cUrl
     */
    public function index()
    {
        $tasks = $this->getApi();

        return view('tasksapi.index', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('tasksapi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->request('POST', null, [], \request()->all());

        if ($response->getStatusCode() == 200) {
            flash('Inserted Successfully.');
        } else {
            flash('Not Inserted Yet.', 'danger');
        }

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->getApi($id);

        return view('tasksapi.show', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = json_decode($this->request('GET', $id)->getBody(), true);

        return view('tasksapi.form', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {

        /** @var Response $response */
        $response = $this->request('PUT', $id, [], \request()->all());

        dd($response->getBody()->getContents());

        if ($response->getStatusCode() == 200) {
            flash('Updated Successfully.');
        } else {
            flash('Not Updated Yet.', 'danger');
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
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $response = $this->request('DELETE', $id, $headers);

        $task = json_decode($response->getBody(), true);

        if ($response->getStatusCode() == 200) {
            flash('Deleted Successfully.');
        } else {
            flash('Not Deleted Yet.', 'danger');
        }

        return redirect('tasks');
    }
}
