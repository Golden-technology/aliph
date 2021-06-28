@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض دفعة') }}
@endsection

@section('content')

<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('payments.index') , 'title' => translate('الدفعات') , 'isactive' => false],
    ['url' => route('payments.show', $payment->id) , 'title' =>  translate('دفعة رقم ')  .  $payment->id , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ translate('دفعة رقم') }} {{ $payment->number }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-10">
                        <table class="table border-bottom table-striped">
                            <tr>
                                <th>{{ translate('رقم الدفعة') }}</th>
                                <td>{{ $payment->number }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('تاريخ الدفعة') }}</th>
                                <td>{{ $payment->date }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('الرقم المرجعي') }}</th>
                                <td>{{ $payment->reference }}</td>
                            </tr>
                            @if($payment->vendor_id)
                                <tr>
                                    <th>{{ translate('دفع ل') }}</th>
                                    <td><a href="{{ route('vendors.show' , $payment->vendor->id) }}">{{ $payment->vendor->name }}</a></td>
                                </tr>
                            @else 
                                <tr>
                                    <th>{{ translate('تلقي من') }}</th>
                                    <td><a href="{{ route('customers.show' , $payment->customer->id) }}">{{ $payment->customer->name }}</a></td>
                                </tr>
                            @endif
                            <tr>
                                <th>{{ translate('طريقة الدفع') }}</th>
                                <td>{{ $payment->paymentMethod->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('وذلك عن') }}</th>
                                <td>{{ $payment->details }}</td>
                            </tr>
                        </table>

                        <table class="table table-bordered">
                            <thead class="bg-gray-300">
                                <tr>
                                    @if($payment->vendor_id)
                                        <th>{{ translate(' المورد') }}</th>
                                    @else 
                                        <th>{{ translate(' العميل') }}</th>
                                    @endif
                                    <th>{{ translate('المبلغ') }}</th>
                                    <th>{{ translate('رسوم بنكية') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if($payment->vendor_id)
                                        <td><a href="{{ route('vendors.show' , $payment->vendor->id) }}">{{ $payment->vendor->name }}</a></td>
                                    @else 
                                    <td><a href="{{ route('customers.show' , $payment->customer->id) }}">{{ $payment->customer->name }}</a></td>
                                    @endif
                                    <td>{{ number_format($payment->amount , 2) }}</td>
                                    <td>{{ number_format($payment->bank , 2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                @permission('payments-update')
                    <a href="{{ route('payments.edit' , $payment->id) }}?type={{ request()->type }}" class="btn btn-warning"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                @endpermission
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush