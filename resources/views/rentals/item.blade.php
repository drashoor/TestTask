<div class="property-item">
    <a class="item-media-w" href="{{ $object->path() }}">
        <div class="item-media" style="background-image: url(img/property3.jpg)"></div>
    </a>
    <div class="item-info">
        <div class="item-features">
            @if($object->bedrooms)
                <div class="feature">{{ $object->bedrooms }} Bedrooms</div>
                @if($object->bathrooms)
                    <div class="feature">{{ $object->bathrooms }} Bathrooms</div>
                @endif
            @endif
            <div class="feature">{{ $object->type->name }}</div>
        </div>

        <h3 class="item-title">
            <a href="{{ $object->path() }}">
                {{ $object->name }}
            </a>
        </h3>
        {{--<div class="item-reviews">--}}
            {{--<div class="reviews-stars"><select class="item-star-rating">--}}
                    {{--<option value="1">1</option>--}}
                    {{--<option value="2">2</option>--}}
                    {{--<option value="3">3</option>--}}
                    {{--<option selected="yes" value="4">4</option>--}}
                    {{--<option value="5">5</option>--}}
                {{--</select></div>--}}
            {{--<div class="reviews-count">7 Reviews</div>--}}
        {{--</div>--}}
        <div class="item-price-buttons">
            {{--<div class="item-price"><strong>$120</strong><span>/per night</span></div>--}}
            <div class="item-buttons">
                <a class="btn btn-outline-primary" href="{{ $object->path() }}">
                    <span>Details</span>
                    <i class="os-icon os-icon-arrow-2-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>