@extends('dashboard.layouts.master')

@section('title')
{{ translate('الاعدادات') }}
@endsection

@section('content')


<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('settings.index') , 'title' => translate('الاعدادات') , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#invoice" aria-expanded="true"
                    aria-controls="invoice">
                    {{ translate('اعدادت الفواتير') }}
                </button>
            </h5>
        </div>

        <div id="invoice" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <form action="{{ route('settings.update' , $setting->id) }}?type=invoice_template" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="invoice_template" class="col-form-label btn btn-primary btn-block">
                            {{ translate('تصميم الفاتورة') }} :
                            <input type="file" class="form-control d-none" id="invoice_template" name="invoice_template" >
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ translate('حفظ اعدادت ') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
