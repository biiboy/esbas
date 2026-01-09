@extends('layouts.app')
@section('title', 'Produk Non Moving (Tidak Bergerak)')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header no-print">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">{{ 'Produk Non Moving (Tidak Bergerak)' }}</h1>
    </section>

    <!-- Main content -->
    <section class="content no-print">
        <div class="row">
            <div class="col-md-12">
                @component('components.filters', ['title' => __('report.filters')])
                    {!! Form::open(['url' => action([\App\Http\Controllers\ReportController::class, 'getProdukTidakBergerak']), 'method' => 'get']) !!}
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('location_id', __('purchase.business_location') . ':') !!}
                            {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'location_id', 'placeholder' => __('messages.please_select')]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('produk_tidak_bergerak_date_filter', __('report.date_range') . ':') !!}
                            {!! Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'produk_tidak_bergerak_date_filter', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('category_id', __('product.category') . ':') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'category_id', 'placeholder' => __('lang_v1.all')]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('brand_id', __('product.brand') . ':') !!}
                            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'brand_id', 'placeholder' => __('lang_v1.all')]) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @component('components.widget', ['class' => 'box-primary'])
                    @include('product.partials.product_list_tidak_bergerak')
                @endcomponent
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="modal fade view_register" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade" id="view_product_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            product_table = $('#product_table').DataTable({
                processing: true,
                serverSide: true,
                fixedHeader: false,
                aaSorting: [
                    [3, 'asc']
                ],
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                "ajax": {
                    "url": "/reports/produk-tidak-bergerak",
                    data: function(d) {
                        var start = '';
                        var end = '';
                        if ($('#produk_tidak_bergerak_date_filter').val()) {
                            start = $('input#produk_tidak_bergerak_date_filter')
                                .data('daterangepicker')
                                .startDate.format('YYYY-MM-DD');
                            end = $('input#produk_tidak_bergerak_date_filter')
                                .data('daterangepicker')
                                .endDate.format('YYYY-MM-DD');
                        }
                        d.start_date = start;
                        d.end_date = end;
                        d.category_id = $('select#category_id').val();
                        d.brand_id = $('select#brand_id').val();
                        d.location_id = $('select#location_id').val();
                    },
                },
                columnDefs: [{
                    "targets": [0],
                    "orderable": false,
                    "searchable": false
                }],
                columns: [{
                        data: 'image',
                        name: 'products.image'
                    },
                    {
                        data: 'product',
                        name: 'products.name'
                    },
                    {
                        data: 'product_locations',
                        name: 'product_locations'
                    },
                    @can('view_purchase_price')
                        {
                            data: 'purchase_price',
                            name: 'max_purchase_price',
                            searchable: false
                        },
                    @endcan
                    @can('access_default_selling_price')
                        {
                            data: 'selling_price',
                            name: 'max_price',
                            searchable: false
                        },
                    @endcan {
                        data: 'current_stock',
                        searchable: false
                    },
                    {
                        data: 'type',
                        name: 'products.type'
                    },
                    {
                        data: 'category',
                        name: 'c1.name'
                    },
                    {
                        data: 'brand',
                        name: 'brands.name'
                    },
                    {
                        data: 'tax',
                        name: 'tax_rates.name',
                        searchable: false
                    },
                    {
                        data: 'sku',
                        name: 'products.sku'
                    },
                    {
                        data: 'product_custom_field1',
                        name: 'products.product_custom_field1',
                        visible: $('#cf_1').text().length > 0
                    },
                    {
                        data: 'product_custom_field2',
                        name: 'products.product_custom_field2',
                        visible: $('#cf_2').text().length > 0
                    },
                    {
                        data: 'product_custom_field3',
                        name: 'products.product_custom_field3',
                        visible: $('#cf_3').text().length > 0
                    },
                    {
                        data: 'product_custom_field4',
                        name: 'products.product_custom_field4',
                        visible: $('#cf_4').text().length > 0
                    },
                    {
                        data: 'product_custom_field5',
                        name: 'products.product_custom_field5',
                        visible: $('#cf_5').text().length > 0
                    },
                    {
                        data: 'product_custom_field6',
                        name: 'products.product_custom_field6',
                        visible: $('#cf_6').text().length > 0
                    },
                    {
                        data: 'product_custom_field7',
                        name: 'products.product_custom_field7',
                        visible: $('#cf_7').text().length > 0
                    },
                ],
                fnDrawCallback: function(oSettings) {
                    __currency_convert_recursively($('#product_table'));
                },
            });

            $('#location_id, #category_id, #brand_id').change(function() {
                product_table.ajax.reload();
            });

            if ($('#produk_tidak_bergerak_date_filter').length == 1) {
                get_sub_categories();
                $('#produk_tidak_bergerak_date_filter').daterangepicker({
                    ranges: ranges,
                    autoUpdateInput: false,
                    locale: {
                        format: moment_date_format,
                        cancelLabel: LANG.clear,
                        applyLabel: LANG.apply,
                        customRangeLabel: LANG.custom_range,
                    },
                });

                $('#produk_tidak_bergerak_date_filter').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(
                        picker.startDate.format(moment_date_format) +
                        ' - ' +
                        picker.endDate.format(moment_date_format)
                    );
                    product_table.ajax.reload();
                });

                $('#produk_tidak_bergerak_date_filter').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    product_table.ajax.reload();
                });
            }
        });

        $(document).on('shown.bs.modal', 'div.view_product_modal, div.view_modal, #view_product_modal',
            function() {
                var div = $(this).find('#view_product_stock_details');
                if (div.length) {
                    $.ajax({
                        url: "{{ action([\App\Http\Controllers\ReportController::class, 'getStockReport']) }}" +
                            '?for=view_product&product_id=' + div.data('product_id'),
                        dataType: 'html',
                        success: function(result) {
                            div.html(result);
                            __currency_convert_recursively(div);
                        },
                    });
                }
                __currency_convert_recursively($(this));
            });
    </script>
@endsection
