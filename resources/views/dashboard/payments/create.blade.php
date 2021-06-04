@extends('dashboard.layouts.master')

@section('title')
    {{ translate('اضافة دفعة') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>{{ translate('اضافة دفعة') }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        @if(request()->type == 'vendor')
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">{{ translate('الي') }} :</label>
                                                <select class="form-control select" name="vendor_id">
                                                    <option value="">{{ translate('اختار المندوب') }}</option>
                                                    @foreach ($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">{{ translate('الي') }} :</label>
                                                <select class="form-control select" name="customer_id">
                                                    <option value="">{{ translate('اختار العميل') }}</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('مرجع') }} :</label>
                                            <input type="text" class="form-control" name="reference" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('رقم الدفع') }} :</label>
                                            <input type="text" class="form-control" name="number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('التاريخ') }} :</label>
                                            <input type="date" class="form-control" name="date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('المبلغ') }} :</label>
                                            <input type="text" class="form-control" name="amount" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('رسوم بنكية') }} :</label>
                                            <input type="text" class="form-control" name="bank">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="units" class="col-form-label">{{ translate('طريقة الدفع') }} :</label>
                                            <select class="form-control select" id="units" name="payment_method">
                                                @foreach ($methods as $method)
                                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('وذلك عن') }} :</label>
                                            <input type="text" class="form-control" name="details">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">{{ translate('ملاحظات') }} :</label>
                                            <textarea type="text" class="form-control" name="comments" ></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                
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

@push('js')

@endpush