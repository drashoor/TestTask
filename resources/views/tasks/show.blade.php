@extends("layouts.layout")

@section("content")
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('tasks') }}">Tasks</a></li>
        <li class="breadcrumb-item"><span>New Task</span></li>
    </ul>

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">Task Name : {{ $task['name'] }}</h6>
                <div class="element-box">
                    <div class="form-group">

                        <b>{{ Form::label('#', '#') }}:</b>
                        <br>
                        {{ $task['pkey'] }}
                    </div>
                    <div class="form-group">

                        <b>{{ Form::label('name', 'Name') }}:</b>
                        <br>
                        {{ $task['name'] }}
                    </div>
                    <div class="form-group">
                        <b>{{ Form::label('due', 'Due') }}:</b>
                        <br>
                        {{ $task['due'] }}
                    </div>
                    <div class="form-group">
                        <b>{{ Form::label('list', 'List') }}:</b>
                        <br>
                        {{ $task['list'] }}
                    </div>
                    <div class="form-group">
                        <b>{{ Form::label('inquiry_id', 'Inquiry') }}:</b>
                        <br>
                        {{ $task['inquiry_id'] }}

                    </div>
                    <div class="form-group">
                        <b>{{ Form::label('user_id', 'User') }}:</b>
                        <br>
                        {{ $task['user_id'] }}
                    </div>
                    <div class="form-group">
                        <b>{{ Form::label('notes', 'Notes') }}:</b>
                        <br>
                        {!! nl2br($task['notes']) !!}
                    </div>
                    <div class="form-group ">
                        <b>{{ Form::label('status', 'Status') }}</b><br>
                        {{ $task['status'] }}
                    </div>
                    <div class="form-buttons-w">
                        <a href="{{ url('tasks') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop