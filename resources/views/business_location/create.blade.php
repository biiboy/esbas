<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action([\App\Http\Controllers\BusinessLocationController::class, 'store']), 'method' => 'post', 'id' => 'business_location_add_form']) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('business.add_business_location')</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', __('invoice.name') . ':*') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __('invoice.name')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('location_id', __('lang_v1.location_id') . ':') !!}
                        {!! Form::text('location_id', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.location_id')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('landmark', __('business.landmark') . ':') !!}
                        {!! Form::text('landmark', null, ['class' => 'form-control', 'placeholder' => __('business.landmark'), 'id' => 'landmark']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('city', __('business.city') . ':*') !!}
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('business.city'), 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('state', 'Provinsi:*') !!}
                        {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'Provinsi', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country', __('business.country') . ':*') !!}
                        {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.country'), 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('zip_code', __('business.zip_code') . ':*') !!}
                        {!! Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => __('business.zip_code'), 'required']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('lokasi', 'Lokasi:') !!}
                        <div id="map_lokasi_create" style="height: 250px;"></div>
                        <input type="text" name="latitude_create" id="latitude_create" value="">
                        <input type="text" name="longitude_create" id="longitude_create" value="">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('mobile', __('business.mobile') . ':') !!}
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => __('business.mobile')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('alternate_number', __('business.alternate_number') . ':') !!}
                        {!! Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('business.alternate_number')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('email', __('business.email') . ':') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('business.email')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('website', __('lang_v1.website') . ':') !!}
                        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.website')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('invoice_scheme_id', __('invoice.invoice_scheme_for_pos') . ':*') !!} @show_tooltip(__('tooltip.invoice_scheme'))
                        {!! Form::select('invoice_scheme_id', $invoice_schemes, null, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('sale_invoice_scheme_id', __('invoice.invoice_scheme_for_sale') . ':*') !!}
                        {!! Form::select('sale_invoice_scheme_id', $invoice_schemes, null, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('invoice_layout_id', __('lang_v1.invoice_layout_for_pos') . ':*') !!} @show_tooltip(__('tooltip.invoice_layout'))
                        {!! Form::select('invoice_layout_id', $invoice_layouts, null, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('sale_invoice_layout_id', __('lang_v1.invoice_layout_for_sale') . ':*') !!} @show_tooltip(__('lang_v1.invoice_layout_for_sale_tooltip'))
                        {!! Form::select('sale_invoice_layout_id', $invoice_layouts, null, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('selling_price_group_id', __('lang_v1.default_selling_price_group') . ':') !!} @show_tooltip(__('lang_v1.location_price_group_help'))
                        {!! Form::select('selling_price_group_id', $price_groups, null, ['class' => 'form-control', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                @php
                    $custom_labels = json_decode(session('business.custom_labels'), true);
                    $location_custom_field1 = !empty($custom_labels['location']['custom_field_1']) ? $custom_labels['location']['custom_field_1'] : __('lang_v1.location_custom_field1');
                    $location_custom_field2 = !empty($custom_labels['location']['custom_field_2']) ? $custom_labels['location']['custom_field_2'] : __('lang_v1.location_custom_field2');
                    $location_custom_field3 = !empty($custom_labels['location']['custom_field_3']) ? $custom_labels['location']['custom_field_3'] : __('lang_v1.location_custom_field3');
                    $location_custom_field4 = !empty($custom_labels['location']['custom_field_4']) ? $custom_labels['location']['custom_field_4'] : __('lang_v1.location_custom_field4');
                @endphp
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field1', $location_custom_field1 . ':') !!}
                        {!! Form::text('custom_field1', null, ['class' => 'form-control', 'placeholder' => $location_custom_field1]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field2', $location_custom_field2 . ':') !!}
                        {!! Form::text('custom_field2', null, ['class' => 'form-control', 'placeholder' => $location_custom_field2]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field3', $location_custom_field3 . ':') !!}
                        {!! Form::text('custom_field3', null, ['class' => 'form-control', 'placeholder' => $location_custom_field3]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field4', $location_custom_field4 . ':') !!}
                        {!! Form::text('custom_field4', null, ['class' => 'form-control', 'placeholder' => $location_custom_field4]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('featured_products', __('lang_v1.pos_screen_featured_products') . ':') !!} @show_tooltip(__('lang_v1.featured_products_help'))
                        {!! Form::select('featured_products[]', [], null, ['class' => 'form-control', 'id' => 'featured_products', 'multiple']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="col-sm-12">
                    <strong>@lang('lang_v1.payment_options'): @show_tooltip(__('lang_v1.payment_option_help'))</strong>
                    <div class="form-group">
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">@lang('lang_v1.payment_method')</th>
                                    <th class="text-center">@lang('lang_v1.enable')</th>
                                    <th class="text-center @if (empty($accounts)) hide @endif">@lang('lang_v1.default_accounts') @show_tooltip(__('lang_v1.default_account_help'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_types as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value }}</td>
                                        <td class="text-center">{!! Form::checkbox('default_payment_accounts[' . $key . '][is_enabled]', 1, true) !!}</td>
                                        <td class="text-center @if (empty($accounts)) hide @endif">
                                            {!! Form::select('default_payment_accounts[' . $key . '][account]', $accounts, null, ['class' => 'form-control input-sm']) !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white">@lang('messages.save')</button>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">@lang('messages.close')</button>
        </div>

        {!! Form::close() !!}

        <script type="text/javascript">
            let map_lokasi_create;
            let marker_create;
            let infoWindow_create;

            function initMapLokasiCreate() {
                // Default map options
                const defaultPosition = {
                    lat: -6.200000,
                    lng: 106.816666
                }; // Default: Jakarta

                let mapOptions = {
                    zoom: 15,
                    center: defaultPosition,
                    mapTypeId: "roadmap",
                    fullscreenControl: false,
                    mapTypeControl: false,
                    streetViewControl: false,
                };

                // Initialize map
                map_lokasi_create = new google.maps.Map(document.getElementById("map_lokasi_create"), mapOptions);

                // Initialize InfoWindow
                infoWindow_create = new google.maps.InfoWindow();

                // Function to handle marker click event
                function handleMarkerClick() {
                    infoWindow_create.setContent(marker_create.getTitle());
                    infoWindow_create.open(map_lokasi_create, marker_create);
                }

                // Try to get user's current location using geolocation
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const userPosition = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        // Set the map center to user's location
                        map_lokasi_create.setCenter(userPosition);

                        // Add a marker at user's location
                        marker_create = new google.maps.Marker({
                            position: userPosition,
                            map: map_lokasi_create,
                            title: 'Lokasi dipilih'
                        });

                        infoWindow_create.setContent(marker_create.getTitle());
                        infoWindow_create.open(map_lokasi_create, marker_create);

                        // Update hidden inputs with user's location
                        updateLatLngInputsCreate(userPosition.lat, userPosition.lng);

                        // Add InfoWindow on marker click
                        marker_create.addListener('click', handleMarkerClick);
                    });
                } else {
                    // If geolocation is not supported, use the default location (Jakarta)
                    marker_create = new google.maps.Marker({
                        position: defaultPosition,
                        map: map_lokasi_create,
                        title: 'Lokasi dipilih'
                    });

                    infoWindow_create.setContent(marker_create.getTitle());
                    infoWindow_create.open(map_lokasi_create, marker_create);

                    // Update hidden inputs with default coordinates
                    updateLatLngInputsCreate(defaultPosition.lat, defaultPosition.lng);

                    // Add InfoWindow on marker click
                    marker_create.addListener('click', handleMarkerClick);
                }

                // Add event listener to map clicks to move the marker
                map_lokasi_create.addListener('click', function(event) {
                    const clickedPosition = {
                        lat: event.latLng.lat(),
                        lng: event.latLng.lng()
                    };

                    // Move the marker to the clicked position
                    if (marker_create) {
                        marker_create.setPosition(clickedPosition);
                    } else {
                        // Create a new marker if it doesn't exist
                        marker_create = new google.maps.Marker({
                            position: clickedPosition,
                            map: map_lokasi_create,
                            title: 'Lokasi dipilih'
                        });
                    }

                    // Update hidden inputs with new coordinates
                    updateLatLngInputsCreate(clickedPosition.lat, clickedPosition.lng);

                    // Show InfoWindow after marker is set at the new position
                    infoWindow_create.setContent(marker_create.getTitle());
                    infoWindow_create.open(map_lokasi_create, marker_create);

                    // Add InfoWindow on marker click
                    google.maps.event.clearListeners(marker_create, 'click'); // Clear previous listeners
                    marker_create.addListener('click', handleMarkerClick);
                });

                let debounceTimerCreate;
                document.getElementById("landmark").addEventListener("input", function() {
                    clearTimeout(debounceTimerCreate);
                    debounceTimerCreate = setTimeout(() => {
                        const input = document.getElementById("landmark").value;
                        if (input) {
                            const geocoder = new google.maps.Geocoder();
                            geocoder.geocode({
                                'address': input
                            }, function(results, status) {
                                if (status === 'OK') {
                                    map_lokasi_create.setCenter(results[0].geometry.location);
                                    if (marker_create) {
                                        marker_create.setMap(null);
                                    }
                                    marker_create = new google.maps.Marker({
                                        map: map_lokasi_create,
                                        position: results[0].geometry.location,
                                        title: 'Lokasi dipilih'
                                    });
                                    infoWindow_create.setContent(marker_create.getTitle());
                                    infoWindow_create.open(map_lokasi_create, marker_create);
                                    updateLatLngInputsCreate(
                                        results[0].geometry.location.lat(),
                                        results[0].geometry.location.lng()
                                    );
                                    // infoWindow_create.close();
                                    marker_create.addListener("click", () => {
                                        infoWindow_create.setContent(marker_create.getTitle());
                                        infoWindow_create.open(map_lokasi_create, marker_create);
                                    });
                                } else {
                                    alert("Lokasi tidak ditemukan: " + status);
                                }
                            });
                        } else {
                            alert("Silakan masukkan lokasi terlebih dahulu.");
                        }
                    }, 500); // 500ms debounce time
                });
            }

            $('.location_add_modal').on('shown.bs.modal', function() {
                initMapLokasiCreate();
            });

            $('.location_add_modal').on('hidden.bs.modal', function() {
                if (marker_create) {
                    marker_create.setMap(null); // Remove marker from map
                }
                map_lokasi_create = null; // Reset map variable
            });

            // Function to update the hidden inputs with latitude and longitude
            function updateLatLngInputsCreate(lat, lng) {
                $('#latitude_create').val(lat);
                $('#longitude_create').val(lng);
            }
        </script>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
