<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('payroll_ref_no_prefix', __('essentials::lang.payroll_ref_no_prefix') . ':') !!}
                {!! Form::text('payroll_ref_no_prefix', !empty($settings['payroll_ref_no_prefix']) ? $settings['payroll_ref_no_prefix'] : null, ['class' => 'form-control', 'placeholder' => __('essentials::lang.payroll_ref_no_prefix')]) !!}
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('payroll_potongan_telat', 'Potongan telat per menit:') !!}
                {!! Form::number('payroll_potongan_telat', !empty($settings['payroll_potongan_telat']) ? $settings['payroll_potongan_telat'] : null, ['class' => 'form-control', 'placeholder' => 'Jumlah potongan per menit']) !!}
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('bonus_lembur', 'Bonus lembur per menit:') !!}
                {!! Form::number('bonus_lembur', !empty($settings['bonus_lembur']) ? $settings['bonus_lembur'] : null, ['class' => 'form-control', 'placeholder' => 'Jumlah bonus per menit']) !!}
            </div>
        </div>
    </div>
</div>
