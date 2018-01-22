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
                <h6 class="element-header">New Task</h6>
                <div class="element-box">

                    @if(isset($task))
                        {!! Form::model($task,['route' => ['tasks.update', $task['pkey']], 'method'=>'PUT'] ) !!}
                    @else
                        {!! Form::open(['route' => ['tasks.store']] ) !!}
                    @endif
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {!! Form::text('name', null, ['placeholder' => 'Task Name', 'class' => 'form-control']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('due', 'Due') }}

                        <div class="date-input">
                            {!! Form::text('due', null, ['placeholder' => 'Due', 'class' => 'single-daterange form-control']) !!}
                        </div>
                        @if ($errors->has('due')) <p class="help-block">{{ $errors->first('due') }}</p> @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('list', 'List') }}
                        {!! Form::text('list', null, ['placeholder' => 'List', 'class' => 'form-control']) !!}
                        @if ($errors->has('list')) <p class="help-block">{{ $errors->first('list') }}</p> @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('inquiry_id', 'Inquiry') }}
                        {!! Form::text('inquiry_id', null, ['placeholder' => 'Inquiry', 'class' => 'form-control']) !!}
                        @if ($errors->has('inquiry_id')) <p
                                class="help-block">{{ $errors->first('inquiry_id') }}</p> @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('user_id', 'User') }}
                        {!! Form::text('user_id', null, ['placeholder' => 'User Id', 'class' => 'form-control']) !!}
                        @if ($errors->has('user_id')) <p class="help-block">{{ $errors->first('user_id') }}</p> @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('notes', 'Notes') }}
                        {!! Form::textarea('notes', null, ['rows' => '3', 'placeholder' => 'Notes', 'class' => 'form-control']) !!}
                        @if ($errors->has('notes')) <p class="help-block">{{ $errors->first('notes') }}</p> @endif
                    </div>
                    <div class="form-group ">
                        {{ Form::label('status', 'Status') }}
                        <div class="form-check">
                            <label class="form-check-label">{!! Form::radio('status', 1) !!} Active</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">{!! Form::radio('status', 2) !!} Completed</label>
                        </div>
                        @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
                    </div>


                    <div class="form-buttons-w">
                        <a href="{{ url('tasks') }}" class="btn btn-default">Back</a>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop