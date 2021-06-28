@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة الموردين') }}
@endsection

@section('content')
<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('vendors.index') , 'title' => translate('الموردين') , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة الموردين') }}
                    @permission('vendors-create')
                    <a 
                    class="btn btn-primary float-left"
                    href="{{ route('vendors.create') }}"
                    >
                    <i class="fa fa-plus"> {{ translate('اضافة') }}</i>
                    </a>
                    @endpermission
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable text-center text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">{{ translate('الاسم') }}</th>
                                <th class="border-top-0">{{ translate('رقم الهاتف') }}</th>
                                <th class="border-top-0">{{ translate('البريد الالكتروني') }}</th>
                                <th class="border-top-0 options">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $vendor->name }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td class="options">
                                        @permission('vendors-read')
                                            <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('vendors-update')
                                            <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
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