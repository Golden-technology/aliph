@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة العملاء') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة العملاء') }}
                    @permission('customers-create')
                    <a 
                    class="btn btn-primary float-left customer"
                    href="{{ route('customers.create') }}"
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
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        @permission('customers-read')
                                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('customers-update')
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
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