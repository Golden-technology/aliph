@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة فواتير المشتريات') }}
@endsection

@section('content')
<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => '#' , 'title' => translate('فواتير المشتريات') , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div class="row">
    <div class="col-md-12">
        <x-filter-component id="true" vendors="true" date="true"></x-filter-component>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة فواتير المشتريات') }}
                    @permission('bills-create')
                        <a 
                        class="btn btn-primary float-left"
                        href="{{ route('bills.create') }}"
                        >
                        <i class="fa fa-plus"> {{ translate('اضافة') }}</i>
                        </a>
                    @endpermission
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable text-nowrap text-center">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">{{ translate('المورد') }}</th>
                                <th class="border-top-0">{{ translate('المبلغ') }}</th>
                                <th class="border-top-0">{{ translate('الحالة') }}</th>
                                <th class="border-top-0">{{ translate('تاريخ الانشاء') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $bill->vendor->name }}</td>
                                    <td>{{ $bill->total }}</td>
                                    <td>{{ translate($bill->status) }}</td>
                                    <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @permission('bills-read')
                                            <a href="{{ route('bills.show' , $bill->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('bills-update')
                                            <a href="{{ route('bills.edit' , $bill->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $bills->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection