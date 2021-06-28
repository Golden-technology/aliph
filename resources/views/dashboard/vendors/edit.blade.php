@extends('dashboard.layouts.master')

@section('title')
    {{ translate('تعديل مورد') }}
@endsection

@section('content')

<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('vendors.index') , 'title' => translate('الموردين') , 'isactive' => false],
    ['url' => route('vendors.show', $vendor->id) , 'title' =>   $vendor->name , 'isactive' => false],
    ['url' => '#' , 'title' => translate('تعديل') , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
                <div class="card-header">
                    <h3>{{ translate('تعديل مورد') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ translate('المعلومات الاساسية') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('اسم المورد') }} :</label>
                                    <input type="text" class="form-control" name="name" required value="{{ $vendor->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('العنوان') }} :</label>
                                    <input type="text" class="form-control" name="address" value="{{ $vendor->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('الرقم  التعريفي الضريبي') }} :</label>
                                    <input type="text" class="form-control" name="tax_id_number" value="{{ $vendor->tax_id_number }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ translate('معلومات التواصل') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('جهة الاتصال') }} :</label>
                                    <input type="text" class="form-control" value="{{ $vendor->contact }}"  name="contact">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('رقم الهاتف') }} :</label>
                                    <input type="number" class="form-control" value="{{ $vendor->phone }}"  name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('فاكس') }} :</label>
                                    <input type="text" class="form-control" value="{{ $vendor->fax }}"  name="fax">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('البريد الالكتروني') }} :</label>
                                    <input type="email" class="form-control" value="{{ $vendor->email }}"  name="email">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('الموقع الالكتروني') }} :</label>
                                    <input type="url" class="form-control" value="{{ $vendor->website }}"  name="website">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ translate('حفظ') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection