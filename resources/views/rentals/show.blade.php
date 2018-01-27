@extends("layouts.site")

@section("content")
    <div class="all-wrapper rentals">

        @include('rentals.topbar')

        <div class="property-single">
            <div class="property-media" style="background-image: url(/img/property3.jpg)">
                {{--<div class="media-buttons"><a href="#"><i
                                class="os-icon os-icon-documents-07"></i><span>View Photos</span></a><a href="#"><i
                                class="os-icon os-icon-ui-03"></i><span>Like</span></a>
                </div>--}}
            </div>
            <div class="property-info-w">
                <div class="property-info-main">
                    {{--<div class="badge badge-red">For Sale</div>--}}
                    <div class="item-features">
                        @if($object->bedrooms)
                            <div class="feature">{{ $object->bedrooms. ' ' . str_plural('bedroom', $object->bedrooms) }}</div>
                        @endif
                        <div class="feature">{{ $object->type->name }}</div>
                    </div>
                    <h1 >{{ $object->name }}</h1>
                    {{--<div class="property-price"><strong>$1,240,000</strong><span>Listing Price</span></div>
                    <div class="item-reviews">
                        <div class="reviews-stars"><select class="item-star-rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option selected="yes" value="4">4</option>
                                <option value="5">5</option>
                            </select></div>
                        <div class="reviews-count">14 Reviews</div>
                    </div>--}}
                    <div class="property-features-highlight">
                        @if($object->bedrooms)
                            <div class="feature">
                                <i class="os-icon os-icon-home-34"></i>
                                <span>{{ $object->bedrooms. ' ' . str_plural('bedroom', $object->bedrooms) }} </span>
                            </div>
                        @endif
                        @if($object->bathrooms)
                            <div class="feature">
                                <i class="os-icon os-icon-home-13"></i>
                                <span>{{ $object->bathrooms. ' ' . str_plural('bathroom', $object->bathrooms) }} </span>
                            </div>
                        @endif
                        @if(isset($object->type))
                            <div class="feature">
                                <i class="os-icon os-icon-home-09"></i><span>{{ $object->type->name }}</span>
                            </div>
                        @endif
                        <div class="feature"><i class="os-icon os-icon-old-tv-2"></i><span>{{ $object->phone }}</span></div>
                    </div>
                    <div class="property-description">
                        <p>
                            {!! nl2br($object->description) !!}
                        </p>
                    </div>
                    {{--<div class="property-section">
                        <div class="property-section-header">Extra Charges
                            <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                        </div>
                        <div class="property-section-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Cleaning Fee: <strong>$50</strong></li>
                                        <li>Security Deposit: <strong>$200</strong></li>
                                        <li>Weekly Discount: <strong>10%</strong></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Monthly Discount: <strong>15%</strong></li>
                                        <li>Weekend Price: <strong>$199 / night</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-note"><h6>Always communicate through</h6>
                                <p>To protect your payment, never transfer money or communicate outside of the our
                                    website or app.</p></div>
                        </div>
                    </div>--}}
                    @if($object->detail)
                        <div class="property-section">
                            <div class="property-section-header">Facts & Features
                                <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                            </div>
                            <div class="property-section-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            @foreach(json_decode($object->detail) as $item => $status)
                                                @if($status)
                                                    <li>
                                                        <span><b>{{ ucwords( str_replace('_', ' ', $item))  }}</b> </span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{--<div class="property-section">
                        <div class="property-section-header">House Rules
                            <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                        </div>
                        <div class="property-section-body">
                            <ul>
                                <li>No smoking</li>
                                <li>Not suitable for pets</li>
                                <li>Check in is anytime after 3PM</li>
                            </ul>
                        </div>
                    </div>--}}
                    {{--<div class="property-section">
                        <div class="property-section-header">Cancellation Policy
                            <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                        </div>
                        <div class="property-section-body"><h6>Strict</h6>
                            <p>Cancel up to 7 days before your trip and get a 50% refund. Cancel within 7 days of your
                                trip and the reservation is non-refundable.</p></div>
                    </div>--}}
                    <div class="property-section">
                        <div class="property-section-header">Location Info
                            <div class="filter-toggle"><i class="os-icon-minus os-icon"></i></div>
                        </div>
                        <div class="property-section-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26466.220546263787!2d-118.35266418131052!3d33.98540355993257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2b79824efa317%3A0x29dd07e1734487f2!2sPark+Mesa+Heights%2C+Los+Angeles%2C+CA!5e0!3m2!1sen!2sus!4v1502593931845"
                                    width="600" height="450" frameborder="0" style="border:0"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="property-info-side">
                    {{--<div class="side-section">
                        <div class="side-section-header">Request Information</div>
                        <div class="side-section-content">
                            <form action="" class="side-action-form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="os-icon os-icon-ui-90"></i></div>
                                        <input class="form-control" placeholder="Enter your name..." type="text"
                                               value=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="os-icon os-icon-phone-15"></i></div>
                                        <input class="form-control" placeholder="Your phone number..." type="text"
                                               value=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="os-icon os-icon-mail-01"></i></div>
                                        <input class="form-control" placeholder="Email Address..." type="text" value="">
                                    </div>
                                </div>
                                <div class="form-buttons"><a class="btn btn-primary" href="#"><span>Contact Agent</span><i
                                                class="os-icon os-icon-arrow-2-right"></i></a></div>
                            </form>
                        </div>
                    </div>--}}
                    <div class="side-section">
                        <div class="side-section-header">Facts and Features</div>
                        <div class="side-section-content">
                            <div class="property-side-features">
                                @if($object->bedrooms)
                                    <div class="feature">
                                        <i class="os-icon os-icon-home-34"></i>
                                        <span>{{ $object->bedrooms. ' ' . str_plural('bedroom', $object->bedrooms) }} </span>
                                    </div>
                                @endif
                                @if($object->bathrooms)
                                    <div class="feature">
                                        <i class="os-icon os-icon-home-13"></i>
                                        <span>{{ $object->bathrooms. ' ' . str_plural('bathroom', $object->bathrooms) }} </span>
                                    </div>
                                @endif
                                <div class="feature">
                                    <i class="os-icon os-icon-home-09"></i><span>{{ $object->type->name }}</span>
                                </div>
                                <div class="feature"><i class="os-icon os-icon-ui-83"></i><span>Built in 2014</span>
                                </div>
                                <div class="feature"><i
                                            class="os-icon os-icon-home-10"></i><span>Washer and Dryer</span></div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="side-magic" style="background-image: url(/img/property2.jpg)">
                        <div class="fader"></div>
                        <h4 class="side-magic-title">You have a listing to offer?</h4>
                        <div class="side-magic-desc">List your property on our site and get a special offer</div>
                        <a class="side-magic-btn" href="#">Submit Listing</a>
                    </div>--}}
                </div>
            </div>
            {{-- <div class="related-listings-w"><h2 class="property-section-big-header">Related Properties </h2>
                 <div class="related-listings">
                     <div class="property-item"><a class="item-media-w" href="rentals_single.html">
                             <div class="item-media" style="background-image: url(img/property2.jpg)"></div>
                         </a>
                         <div class="item-info">
                             <div class="item-features">
                                 <div class="feature">5 Bedrooms</div>
                                 <div class="feature">Entire Home</div>
                             </div>
                             <h3 class="item-title"><a href="rentals_single.html">Perfect Located 2BR Aspen Condo</a>
                             </h3>
                             <div class="item-reviews">
                                 <div class="reviews-stars"><select class="item-star-rating">
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option selected="yes" value="4">4</option>
                                         <option value="5">5</option>
                                     </select></div>
                                 <div class="reviews-count">12 Reviews</div>
                             </div>
                             <div class="item-price-buttons">
                                 <div class="item-price"><strong>$350</strong><span>/per night</span></div>
                                 <div class="item-buttons"><a class="btn btn-outline-primary" href="rentals_single.html"><span>Details</span><i
                                                 class="os-icon os-icon-arrow-2-right"></i></a></div>
                             </div>
                         </div>
                     </div>
                     <div class="property-item"><a class="item-media-w" href="rentals_single.html">
                             <div class="item-media" style="background-image: url(img/property3.jpg)"></div>
                         </a>
                         <div class="item-info">
                             <div class="item-features">
                                 <div class="feature">3 Bedrooms</div>
                                 <div class="feature">Entire Home</div>
                             </div>
                             <h3 class="item-title"><a href="rentals_single.html">Platinum Aspen Core Luxury Home</a>
                             </h3>
                             <div class="item-reviews">
                                 <div class="reviews-stars"><select class="item-star-rating">
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option selected="yes" value="4">4</option>
                                         <option value="5">5</option>
                                     </select></div>
                                 <div class="reviews-count">7 Reviews</div>
                             </div>
                             <div class="item-price-buttons">
                                 <div class="item-price"><strong>$120</strong><span>/per night</span></div>
                                 <div class="item-buttons"><a class="btn btn-outline-primary" href="rentals_single.html"><span>Details</span><i
                                                 class="os-icon os-icon-arrow-2-right"></i></a></div>
                             </div>
                         </div>
                     </div>

                     <div class="property-item"><a class="item-media-w" href="rentals_single.html">
                             <div class="item-media" style="background-image: url(img/property1.jpg)"></div>
                         </a>
                         <div class="item-info">
                             <div class="item-features">
                                 <div class="feature">2 Bedrooms</div>
                                 <div class="feature">Entire Home</div>
                             </div>
                             <h3 class="item-title"><a href="rentals_single.html">Private Corner Studio in downtown
                                     Aspen</a></h3>
                             <div class="item-reviews">
                                 <div class="reviews-stars"><select class="item-star-rating">
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option selected="yes" value="4">4</option>
                                         <option value="5">5</option>
                                     </select></div>
                                 <div class="reviews-count">4 Reviews</div>
                             </div>
                             <div class="item-price-buttons">
                                 <div class="item-price"><strong>$259</strong><span>/per night</span></div>
                                 <div class="item-buttons"><a class="btn btn-outline-primary" href="rentals_single.html"><span>Details</span><i
                                                 class="os-icon os-icon-arrow-2-right"></i></a></div>
                             </div>
                         </div>
                     </div></div>
             </div>--}}
        </div>


    </div>
@stop