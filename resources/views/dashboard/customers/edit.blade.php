@extends('dashboard.layouts.master')

@section('title')
    {{ translate('تعديل عميل') }}
@endsection

@section('content')

<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('customers.index') , 'title' => translate('العملاء') , 'isactive' => false],
    ['url' => route('customers.show', $customer->id) , 'title' =>  $customer->name , 'isactive' => false],
    ['url' => '#' , 'title' => translate('تعديل') , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                <div class="card-header">
                    <h3>{{ translate('تعديل عميل') }}</h3>
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
                                    <label for="recipient-name" class="col-form-label">{{ translate('اسم العميل') }} :</label>
                                    <input type="text" class="form-control" name="name" required value="{{ $customer->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('العنوان') }} :</label>
                                    <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('الرقم  التعريفي الضريبي') }} :</label>
                                    <input type="text" class="form-control" name="tax_id_number" value="{{ $customer->tax_id_number }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ translate('معلومات التواصل') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('جهة الاتصال') }} :</label>
                                    <input type="text" class="form-control" value="{{ $customer->contact }}"  name="contact">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('رقم الهاتف') }} :</label>
                                    <input type="number" class="form-control" value="{{ $customer->phone }}"  name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('فاكس') }} :</label>
                                    <input type="text" class="form-control" value="{{ $customer->fax }}"  name="fax">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('البريد الالكتروني') }} :</label>
                                    <input type="email" class="form-control" value="{{ $customer->email }}"  name="email">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('الموقع الالكتروني') }} :</label>
                                    <input type="url" class="form-control" value="{{ $customer->website }}"  name="website">
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