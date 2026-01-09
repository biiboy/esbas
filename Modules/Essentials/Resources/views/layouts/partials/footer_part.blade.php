@if (Module::has('Essentials'))
    @include('essentials::attendance.clock_in_clock_out_modal')
@endif
{{-- <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCU61c8oBdfuzO2kVpTvdXwMYbzCDHmeeY&language=id&region=ID&loading=async&callback=initMap" type="text/javascript"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#essentials_dob').datepicker();
        $('.clock_in_btn, .clock_out_btn').click(function() {
            var type = $(this).data('type');
            if (type == 'clock_in') {
                $('#clock_in_clock_out_modal').find('#clock_in_text').removeClass('hide');
                $('#clock_in_clock_out_modal').find('#clock_out_text').addClass('hide');
                $('#clock_in_clock_out_modal').find('.clock_in_note').removeClass('hide');
                $('#clock_in_clock_out_modal').find('.clock_out_note').addClass('hide');
            } else if (type == 'clock_out') {
                $('#clock_in_clock_out_modal').find('#clock_in_text').addClass('hide');
                $('#clock_in_clock_out_modal').find('#clock_out_text').removeClass('hide');
                $('#clock_in_clock_out_modal').find('.clock_in_note').addClass('hide');
                $('#clock_in_clock_out_modal').find('.clock_out_note').removeClass('hide');
            }
            $('#clock_in_clock_out_modal').find('input#type').val(type);

            $('#clock_in_clock_out_modal').modal('show');
        });

        // Initially hide the map
        $('#map').hide();
    });

    $(document).on('submit', 'form#clock_in_clock_out_form', function(e) {
        e.preventDefault();
        $(this).find('button[type="submit"]').attr('disabled', true);
        var data = $(this).serialize();

        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            success: function(result) {
                if (result.success == true) {
                    $('div#clock_in_clock_out_modal').modal('hide');

                    var shift_details = document.createElement("div");
                    if (result.current_shift) {
                        shift_details.innerHTML = result.current_shift;
                    }

                    swal({
                        title: result.msg,
                        content: shift_details,
                        icon: 'success'
                    });

                    if (typeof attendance_table !== 'undefined') {
                        attendance_table.ajax.reload();
                    }
                    if (result.type == 'clock_in') {
                        $('.clock_in_btn').addClass('hide');
                        $('.clock_out_btn').removeClass('hide');
                    } else if (result.type == 'clock_out') {
                        $('.clock_out_btn').addClass('hide');
                        $('.clock_in_btn').removeClass('hide');
                    }
                } else {
                    var shift_details = document.createElement("p");
                    if (result.shift_details) {
                        shift_details.innerHTML = result.shift_details;
                    }

                    swal({
                        title: result.msg,
                        content: shift_details,
                        icon: 'error'
                    })
                }
                $('#clock_in_clock_out_form')[0].reset();
                $('#clock_in_clock_out_form').find('button[type="submit"]').removeAttr('disabled');
            },
        });
    });

    $(document).on('click', '#get_current_location', function() {
        getFullAddress();
        $('#map').show();
    });

    function getFullAddress() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Set map to the user's location
                    initMap(latitude, longitude);
                    $("input#clock_in_out_latitude").val(latitude);
                    $("input#clock_in_out_longitude").val(longitude);

                    $.ajax({
                        url: '/user-location/' + latitude + ',' + longitude,
                        dataType: 'json',
                        success: function(result) {
                            if (typeof result.address !== 'undefined') {

                                $("input#clock_in_out_location").val(result.address);
                                $("span.clock_in_out_location").text(result.address);
                                $("div.ask_location").hide();
                            } else if (typeof result.error_message !== 'undefined') {
                                console.log(result.error_message);
                            }
                        }
                    });

                },
                () => {
                    $("div.ask_location").show();
                    $("span.location_required").text("{{ __('essentials::lang.you_must_enable_location') }}")
                    console.log("Error: The Geolocation service failed.");
                }
            );
        } else {
            $("div.ask_location").show();
            $("span.location_required").text("{{ __('essentials::lang.you_must_enable_location') }}")
            // Browser doesn't support Geolocation
            console.log("Browser doesn't support Geolocation");
        }
    }

    let map;

    function initMap(lat = null, lng = null) {
        let mapOptions;
        const userName = "{{ auth()->user()->first_name ?? '' }}";

        if (lat && lng) {
            // User location provided
            const userPosition = {
                lat: lat,
                lng: lng
            };
            mapOptions = {
                center: userPosition,
                zoom: 15,
                mapTypeId: "roadmap",
                fullscreenControl: false,
                mapTypeControl: false,
                streetViewControl: false,
            };

            // Initialize map with user's location
            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Add a marker at the user's location
            const marker = new google.maps.Marker({
                position: userPosition,
                map: map,
                title: 'Lokasi ' + userName
            });

            const infoWindow = new google.maps.InfoWindow({
                content: marker.getTitle() // Mengambil judul dari marker
            });

            // Tampilkan InfoWindow di atas marker
            infoWindow.open(map, marker);

            marker.addListener('click', function() {
                // Tampilkan InfoWindow di atas marker saat marker diklik
                infoWindow.open(map, marker);
            });
        } else {
            // No location provided, use default options with no specific center
            mapOptions = {
                zoom: 2, // World view zoom
                mapTypeId: "roadmap",
                fullscreenControl: false,
                mapTypeControl: false,
                streetViewControl: false,
            };

            map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }
    }

    $('#attendance_table').on('click', '.btn-location', function() {
        // Ambil latitude dan longitude dari tombol
        var lat = $(this).data('lat');
        var lng = $(this).data('lng');

        // Inisialisasi peta ketika modal terbuka
        $('#location_attendance_modal').on('shown.bs.modal', function() {
            var map = new google.maps.Map(document.getElementById('map2'), {
                zoom: 15,
                center: {
                    lat: lat,
                    lng: lng
                },
                mapTypeId: "roadmap",
                fullscreenControl: false,
                mapTypeControl: false,
                streetViewControl: false,
            });

            // Tambahkan marker di lokasi clock-in/out
            var marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map
            });
        });
    });
</script>
