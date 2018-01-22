@extends("layouts.layout")

@section("content")
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('tasksapi') }}">Tasks</a></li>
        <li class="breadcrumb-item"><span>Browse</span></li>
    </ul>

    <div class="content-panel-toggler">
        <i class="os-icon os-icon-grid-squares-22"></i>
        <span>Sidebar</span>
    </div>

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">Tasks</h6>
                @include('flash::message')
                <div class="element-box">
                    <div class="text-right">
                        <a href="{{ url('tasksapi/create') }}" class="mr-2 mb-2 btn btn-primary">New Task</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>List</th>
                                <th>Due</th>
                                <th class="text-center">Status</th>
                                <th class="text-right">Created At</th>
                                <th style="width: 30px"></th>
                                <th style="width: 30px"></th>
                                <th style="width: 30px"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($data as $task)
                                <tr>
                                    <td>{{ $task['name'] }}</td>
                                    <td>{{ $task['list'] }}</td>
                                    <td>{{ \Carbon\Carbon::createFromTimestamp( $task['due'])->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @if ($task['status'] == 1)
                                            <div class="status-pill yellow" data-title="Active" data-toggle="tooltip"
                                                 data-original-title="" title=""></div>
                                        @elseif($task['status'] == 2)
                                            <div class="status-pill green" data-title="Completed" data-toggle="tooltip"
                                                 data-original-title="" title=""></div>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        {{ \Carbon\Carbon::createFromTimestamp( $task['created'])->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ url("tasksapi/{$task['pkey']}") }}"
                                           class="btn btn-info btn-sm ">
                                            Show
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url("tasksapi/{$task['pkey']}/edit") }}"
                                           class="btn btn-secondary btn-sm pull-left">
                                            Edit
                                        </a>
                                    </td>
                                    <td>

                                        <form action="{{ url("tasksapi/{$task['pkey']}") }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Results!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop