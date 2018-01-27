@extends("layouts.layout")

@section("content")
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('inquires') }}">Inquires</a></li>
        <li class="breadcrumb-item"><span>Browse</span></li>
    </ul>

    <div class="content-panel-toggler">
        <i class="os-icon os-icon-grid-squares-22"></i>
        <span>Sidebar</span>
    </div>

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">Inquires</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                            <tr>
                                <th>Source</th>
                                <th>Name</th>
                                <th>Arrive</th>
                                <th>Depart</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($objects as $object)
                                <tr>
                                    <td>{{ $object->source }}</td>
                                    <td>{{ $object->name }}</td>
                                    <td>{{ $object->arrive }}</td>
                                    <td>{{ $object->depart }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Results!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        {{ $objects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop