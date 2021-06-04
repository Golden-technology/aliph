@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة الدفعات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة الدفعات') }}
                    @permission('payments-create')
                        <a 
                        class="btn btn-primary float-left"
                        href="{{ route('payments.create') }}?type={{ request()->type }}"
                        >
                        <i class="fa fa-plus"> {{ translate('اضافة') }}</i>
                        </a>
                    @endpermission
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap text-center">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">{{ translate('التاريخ') }}</th>
                                @if(request()->type == 'vendor')
                                    <th class="border-top-0">{{ translate(' المندوب') }}</th>
                                @else
                                    <th class="border-top-0">{{ translate(' العميل') }}</th>
                                @endif
                                <th class="border-top-0">{{ translate('الطريقة') }}</th>
                                <th class="border-top-0">{{ translate('وذلك عن') }}</th>
                                <th class="border-top-0">{{ translate('المبلغ') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $payment->date }}</td>
                                    @if(request()->type == 'vendor')
                                        <td><a href="{{ route('vendors.show' , $payment->vendor->id) }}">{{ $payment->vendor->name }}</a></td>
                                    @else 
                                    <td><a href="{{ route('customers.show' , $payment->customer->id) }}">{{ $payment->customer->name }}</a></td>
                                    @endif
                                    <td>{{ $payment->paymentMethod->name }}</td>
                                    <td>{{ $payment->details }}</td>
                                    <td>{{ number_format($payment->amount , 2) }}</td>
                                    <td>
                                        @permission('payments-read')
                                            <a href="{{ route('payments.show' , $payment->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('payments-update')
                                            <a href="{{ route('payments.edit' , $payment->id) }}?type={{ request()->type }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $payments->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection