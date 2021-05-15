@extends('dashboard.layouts.master')

@section('title')
    {{ translate('اضافة عميل') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('customers.store') }}" method="POST">
                <div class="card-header">
                    <h3>{{ translate('اضافة عميل') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ translate('المعلومات الاساسية') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('اسم العميل') }} :</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('العنوان') }} :</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('الرقم  التعريفي الضريبي') }} :</label>
                                    <input type="text" class="form-control" name="tax_id_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ translate('معلومات التواصل') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('جهة الاتصال') }} :</label>
                                    <input type="text" class="form-control" name="contact">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('رقم الهاتف') }} :</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('فاكس') }} :</label>
                                    <input type="text" class="form-control" name="fax">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('البريد الالكتروني') }} :</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">{{ translate('الموقع الالكتروني') }} :</label>
                                    <input type="url" class="form-control" name="website">
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