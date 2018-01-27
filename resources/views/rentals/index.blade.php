@extends("layouts.site")

@section("content")
    <div class="all-wrapper rentals">

        @include('rentals.topbar')

        <div class="rentals-list-w">

            @include('rentals.leftbar')
            <div class="rentals-list">
                <div class="list-controls">
                    <div class="list-info">{{ $objects->total() }} Rentals Found.</div>
                    <div class="list-order">
                        <label for="">Order By:</label>
                        <select name="by" onchange="if (this.value) window.location.href=this.value">
                            <option value="">-- Choose --</option>
                            <option value="rentals?by=date&{{ http_build_query(request()->except('by')) }}"
                                    @if(request('by') == 'date') selected="selected" @endif">Date</option>
                            {{--<option value="relevance">Relevance</option>--}}
                            {{--<option>Price</option>--}}
                        </select>

                        <select name="order" onchange="if (this.value) window.location.href=this.value">
                            <option value="rentals?order=desc&{{ http_build_query(request()->except('order')) }}"
                                    @if(request('order') == 'desc') selected="selected" @endif>DESC
                            </option>
                            <option value="rentals?order=asc&{{ http_build_query(request()->except('order')) }}"
                                    @if(request('order') == 'asc') selected="selected" @endif>ASC
                            </option>
                        </select>

                    </div>
                </div>
                <div class="property-items as-grid">

                    @foreach($objects as $object)
                        @include('rentals.item')
                    @endforeach

                </div>
                <div class="pagination-w">
                    <div class="pagination-info">
                        Showing Page #{{ $objects->currentPage() }} of
                        Total {{  $objects->lastPage() . ' ' .  str_plural('page', $objects->lastPage())  }}
                    </div>
                    <div class="pagination-links">
                        {{ $objects->links("pagination") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop