<div class="top-bar">
    <div class="logo-w"><a class="logo" href="/rentals">
            <div class="logo-element"></div>
            <div class="logo-label">Property</div>
        </a>
        <div class="filters-toggler"><i class="os-icon os-icon-hamburger-menu-1"></i></div>
    </div>
    <div class="filters">
        <div class="filters-header"><h4>Search By</h4></div>
        <form class="form-inline" action="/rentals" method="get">
            <div class="filter-w">
                <div class="filter-body">
                    <div class="form-group"><label for="">Zip Code</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="os-icon os-icon-ui-74"></i></div>
                            <input name="zip" class="form-control zip-width" placeholder="Zip Code" type="text"
                                   value="{{ request('zip') }}"></div>
                    </div>
                </div>
            </div>
            <div class="filter-w">
                <div class="filter-body">
                    <div class="form-group"><label for=""> Dates</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="os-icon os-icon-ui-83"></i></div>
                            <input class="form-control date-range-picker" type="text" value=""></div>
                    </div>
                </div>
            </div>
            <div class="buttons-w">
                <button type="submit" class="btn btn-upper btn-primary" href="#">
                    <i class="os-icon os-icon-ui-37"></i>
                    <span>Search</span>
                </button>
            </div>
        </form>
    </div>

</div>