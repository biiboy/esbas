<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action([\App\Http\Controllers\BusinessLocationController::class, 'update'], [$location->id]), 'method' => 'PUT', 'id' => 'business_location_add_form']) !!}

        {!! Form::hidden('hidden_id', $location->id, ['id' => 'hidden_id']) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('business.edit_business_location')</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', __('invoice.name') . ':*') !!}
                        {!! Form::text('name', $location->name, ['class' => 'form-control', 'required', 'placeholder' => __('invoice.name')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('location_id', __('lang_v1.location_id') . ':') !!}
                        {!! Form::text('location_id', $location->location_id, ['class' => 'form-control', 'placeholder' => __('lang_v1.location_id')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('landmark', __('business.landmark') . ':') !!}
                        {!! Form::text('landmark', $location->landmark, ['class' => 'form-control', 'placeholder' => __('business.landmark'), 'id' => 'landmark2']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('city', __('business.city') . ':*') !!}
                        {!! Form::text('city', $location->city, ['class' => 'form-control', 'placeholder' => __('business.city'), 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('state', 'Provinsi:*') !!}
                        {!! Form::text('state', $location->state, ['class' => 'form-control', 'placeholder' => 'Provinsi', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country', __('business.country') . ':*') !!}
                        {!! Form::text('country', $location->country, ['class' => 'form-control', 'placeholder' => __('business.country'), 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('zip_code', __('business.zip_code') . ':*') !!}
                        {!! Form::text('zip_code', $location->zip_code, ['class' => 'form-control', 'placeholder' => __('business.zip_code'), 'required']) !!}
                    </div>
                </div>
                {{-- <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('lokasi', 'Lokasi:') !!}
                        <div id="map_lokasi" style="height: 250px;"></div>
                        <input type="text" name="latitude" id="latitude" value="{{ $location->latitude ?? '' }}">
                        <input type="text" name="longitude" id="longitude" value="{{ $location->longitude ?? '' }}">
                    </div>
                </div> --}}
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('mobile', __('business.mobile') . ':') !!}
                        {!! Form::text('mobile', $location->mobile, ['class' => 'form-control', 'placeholder' => __('business.mobile')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('alternate_number', __('business.alternate_number') . ':') !!}
                        {!! Form::text('alternate_number', $location->alternate_number, ['class' => 'form-control', 'placeholder' => __('business.alternate_number')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('email', __('business.email') . ':') !!}
                        {!! Form::email('email', $location->email, ['class' => 'form-control', 'placeholder' => __('business.email')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('website', __('lang_v1.website') . ':') !!}
                        {!! Form::text('website', $location->website, ['class' => 'form-control', 'placeholder' => __('lang_v1.website')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('invoice_scheme_id', __('invoice.invoice_scheme_for_pos') . ':*') !!} @show_tooltip(__('tooltip.invoice_scheme'))
                        {!! Form::select('invoice_scheme_id', $invoice_schemes, $location->invoice_scheme_id, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('sale_invoice_scheme_id', __('invoice.invoice_scheme_for_sale') . ':*') !!}
                        {!! Form::select('sale_invoice_scheme_id', $invoice_schemes, $location->sale_invoice_scheme_id, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('invoice_layout_id', __('lang_v1.invoice_layout_for_pos') . ':*') !!} @show_tooltip(__('tooltip.invoice_layout'))
                        {!! Form::select('invoice_layout_id', $invoice_layouts, $location->invoice_layout_id, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('sale_invoice_layout_id', __('lang_v1.invoice_layout_for_sale') . ':*') !!} @show_tooltip(__('tooltip.invoice_layout'))
                        {!! Form::select('sale_invoice_layout_id', $invoice_layouts, $location->sale_invoice_layout_id, ['class' => 'form-control', 'required', 'placeholder' => __('messages.please_select')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('selling_price_group_id', __('lang_v1.default_selling_price_group') . ':') !!} @show_tooltip(__('lang_v1.location_price_group_help'))
                        {!! Form::select('selling_price_group_id', $price_groups, $location->selling_price_group_id, ['class' => 'form-control', 'placeholder' => __('messages.please_select')]) !!}
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
                        {!! Form::text('custom_field1', $location->custom_field1, ['class' => 'form-control', 'placeholder' => $location_custom_field1]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field2', $location_custom_field2 . ':') !!}
                        {!! Form::text('custom_field2', $location->custom_field2, ['class' => 'form-control', 'placeholder' => $location_custom_field2]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field3', $location_custom_field3 . ':') !!}
                        {!! Form::text('custom_field3', $location->custom_field3, ['class' => 'form-control', 'placeholder' => $location_custom_field3]) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('custom_field4', $location_custom_field4 . ':') !!}
                        {!! Form::text('custom_field4', $location->custom_field4, ['class' => 'form-control', 'placeholder' => $location_custom_field4]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('featured_products', __('lang_v1.pos_screen_featured_products') . ':') !!} @show_tooltip(__('lang_v1.featured_products_help'))
                        {!! Form::select('featured_products[]', $featured_products, $location->featured_products, ['class' => 'form-control', 'id' => 'featured_products', 'multiple']) !!}
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
                                @php
                                    $default_payment_accounts = !empty($location->default_payment_accounts) ? json_decode($location->default_payment_accounts, true) : [];
                                @endphp
                                @foreach ($payment_types as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value }}</td>
                                        <td class="text-center">{!! Form::checkbox('default_payment_accounts[' . $key . '][is_enabled]', 1, !empty($default_payment_accounts[$key]['is_enabled'])) !!}</td>
                                        <td class="text-center @if (empty($accounts)) hide @endif">
                                            {!! Form::select('default_payment_accounts[' . $key . '][account]', $accounts, !empty($default_payment_accounts[$key]['account']) ? $default_payment_accounts[$key]['account'] : null, ['class' => 'form-control input-sm']) !!}
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
            let map_lokasi;
            let marker;
            let infoWindow;

            function initMapLokasi(lat, lng) {
                const position = {
                    lat: lat,
                    lng: lng
                };

                let mapOptions = {
                    zoom: 15,
                    center: position,
                    mapTypeId: "roadmap",
                    fullscreenControl: false,
                    mapTypeControl: false,
                    streetViewControl: false,
                };

                // Initialize map
                map_lokasi = new google.maps.Map(document.getElementById("map_lokasi"), mapOptions);

                // Initialize InfoWindow
                infoWindow = new google.maps.InfoWindow();

                // Tambahkan marker di posisi yang diatur
                marker = new google.maps.Marker({
                    position: position,
                    map: map_lokasi,
                    title: 'Lokasi dipilih'
                });

                infoWindow.setContent('Lokasi dipilih');
                infoWindow.open(map_lokasi, marker);

                // Perbarui nilai hidden input dengan posisi saat ini
                updateLatLngInputs(position.lat, position.lng);

                // Tambahkan InfoWindow saat marker di-klik
                marker.addListener('click', function() {
                    infoWindow.setContent(marker.getTitle());
                    infoWindow.open(map_lokasi, marker);
                });

                // Tambahkan event listener untuk memindahkan marker saat peta diklik
                map_lokasi.addListener('click', function(event) {
                    const clickedPosition = {
                        lat: event.latLng.lat(),
                        lng: event.latLng.lng()
                    };

                    // Pindahkan marker ke posisi yang di-klik
                    marker.setPosition(clickedPosition);

                    // Perbarui hidden input dengan posisi yang baru
                    updateLatLngInputs(clickedPosition.lat, clickedPosition.lng);

                    // Tampilkan InfoWindow setelah marker dipindahkan
                    infoWindow.setContent('Lokasi dipilih');
                    infoWindow.open(map_lokasi, marker);
                });

                let debounceTimerEdit;
                document.getElementById("landmark2").addEventListener("input", function() {
                    clearTimeout(debounceTimerEdit);
                    debounceTimerEdit = setTimeout(() => {
                        const input = document.getElementById("landmark2").value;
                        if (input) {
                            const geocoder = new google.maps.Geocoder();
                            geocoder.geocode({
                                'address': input
                            }, function(results, status) {
                                if (status === 'OK') {
                                    map_lokasi.setCenter(results[0].geometry.location);
                                    if (marker) {
                                        marker.setMap(null);
                                    }
                                    marker = new google.maps.Marker({
                                        map: map_lokasi,
                                        position: results[0].geometry.location,
                                        title: 'Lokasi dipilih'
                                    });
                                    infoWindow.setContent(marker.getTitle());
                                    infoWindow.open(map_lokasi, marker);
                                    updateLatLngInputsCreate(
                                        results[0].geometry.location.lat(),
                                        results[0].geometry.location.lng()
                                    );
                                    // infoWindow.close();
                                    marker.addListener("click", () => {
                                        infoWindow.setContent(marker.getTitle());
                                        infoWindow.open(map_lokasi, marker);
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

            $('.location_edit_modal').on('shown.bs.modal', function() {
                // Ambil nilai latitude dan longitude dari hidden input
                var latitudeInput = $('#latitude').val();
                var longitudeInput = $('#longitude').val();

                // Pastikan koordinat valid
                var latitude = latitudeInput ? parseFloat(latitudeInput) : null;
                var longitude = longitudeInput ? parseFloat(longitudeInput) : null;

                // Inisialisasi peta hanya jika kedua koordinat valid
                if (latitude !== null && longitude !== null && !isNaN(latitude) && !isNaN(longitude)) {
                    initMapLokasi(latitude, longitude);
                } else {
                    // Jika salah satu koordinat tidak valid, gunakan default
                    initMapLokasi(-6.2, 106.816666);
                }
            });

            $('.location_edit_modal').on('hidden.bs.modal', function() {
                if (marker) {
                    marker.setMap(null); // Remove marker from map
                }
                map_lokasi = null; // Reset map variable
            });

            // Fungsi untuk memperbarui nilai latitude dan longitude di input tersembunyi
            function updateLatLngInputs(lat, lng) {
                $('#latitude').val(lat);
                $('#longitude').val(lng);
            }
        </script>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
