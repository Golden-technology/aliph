@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة الموردين') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة الموردين') }}
                    @permission('vendors-create')
                    <a 
                    class="btn btn-primary btn-sm left vendor"
                    href="{{ route('vendors.create') }}"
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
                                <th class="border-top-0">{{ translate('الاسم') }}</th>
                                <th class="border-top-0">{{ translate('رقم الهاتف') }}</th>
                                <th class="border-top-0">{{ translate('البريد الالكتروني') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $vendor->name }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>
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