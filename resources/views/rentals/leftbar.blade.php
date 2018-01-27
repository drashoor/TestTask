<div class="filter-side">
    <div class="filters-header"><h4>Filter</h4>
        <div class="reset-filters">
            <a href="/rentals">
                <i class="os-icon-close os-icon"></i><span>Reset Filters</span>
            </a>
        </div>
    </div>
    <div class="filter-w">
        <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
        <h6 class="filter-header">Listing Type</h6>
        <div class="filter-body">
            <div class="toggled-buttons">
                <a class="btn btn-toggled on" href="rentals?{{ http_build_query(request()->except('type')) }}">Show
                    All</a>
                @foreach($types as $type)
                    <a class="btn btn-toggled off"
                       href="rentals?type={{ $type->id }}&{{ http_build_query(request()->except('type')) }}">{{ $type->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="filter-w">
            <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
            <h6 class="filter-header">Price Range</h6>
            <div class="filter-body"><input class="ion-range-slider" type="text"></div>
        </div>
        <div class="filter-w">
            <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
            <h6 class="filter-header">Number of Bedrooms</h6>
            <div class="filter-body">
                <div class="toggled-buttons solid">
                    <a class="btn btn-toggled @if ( request('number_of_rooms') == 1 ) on @endif"
                       href="/rentals?number_of_rooms=1">1+</a>
                    <a class="btn btn-toggled @if ( request('number_of_rooms') == 2 ) on @endif"
                       href="/rentals?number_of_rooms=2">2+</a>
                    <a class="btn btn-toggled @if ( request('number_of_rooms') == 3 ) on @endif"
                       href="/rentals?number_of_rooms=3">3+</a>
                    <a class="btn btn-toggled @if ( request('number_of_rooms') == 4 ) on @endif"
                       href="/rentals?number_of_rooms=4">4+</a>
                </div>
            </div>
            {{--<div class="filter-w">
                <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                <h6 class="filter-header">Features</h6>
                <div class="filter-body"><select class="select2" multiple="true" name="">
                        <option>Solar Power</option>
                        <option>Open Space</option>
                        <option selected="true">Backyard</option>
                        <option>Washer</option>
                        <option selected="true">Garage</option>
                    </select></div>
            </div>
            <div class="filter-w collapsed">
                <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                <h6 class="filter-header">Posted by Agent</h6>
                <div class="filter-body"><input class="ion-range-slider" type="text"></div>
            </div>
            <div class="filter-w collapsed">
                <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                <h6 class="filter-header">Time on Market</h6>
                <div class="filter-body"><input class="ion-range-slider" type="text"></div>
            </div>--}}
            <div class="filter-w no-padding">
                <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                <h6 class="filter-header">Listings on Map</h6>
                <div class="filter-body">
                    <iframe src="https://www.google.com/maps/embed?pb=12.3293120,45.4363100&z=9"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>