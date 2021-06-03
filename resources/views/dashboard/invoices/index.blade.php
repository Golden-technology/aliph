@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة فواتير المبيعات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة فواتير المبيعات') }}
                    @permission('invoices-create')
                        <a 
                        class="btn btn-primary float-left"
                        href="{{ route('invoices.create') }}"
                        >
                        <i class="fa fa-plus"> {{ translate('اضافة') }}</i>
                        </a>
                    @endpermission
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">{{ translate('العميل') }}</th>
                                <th class="border-top-0">{{ translate('المبلغ') }}</th>
                                <th class="border-top-0">{{ translate('الحالة') }}</th>
                                <th class="border-top-0">{{ translate('تاريخ الانشاء') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ number_format($invoice->total , 2) }}</td>
                                    <td>{{ translate($invoice->status) }}</td>
                                    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @permission('invoices-read')
                                            <a href="{{ route('invoices.show' , $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('invoices-update')
                                            <a href="{{ route('invoices.edit' , $invoice->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection