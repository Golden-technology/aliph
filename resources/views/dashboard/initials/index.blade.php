@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة العروض') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة العروض') }}
                    @permission('initials-create')
                        <a 
                        class="btn btn-primary float-left"
                        href="{{ route('initials.create') }}"
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
                            @foreach ($initials as $initial)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $initial->customer->name }}</td>
                                    <td>{{ $initial->total }}</td>
                                    <td>{{ translate($initial->status) }}</td>
                                    <td>{{ $initial->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @permission('initials-read')
                                            <a href="{{ route('initials.show' , $initial->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('initials-update')
                                            <a href="{{ route('initials.edit' , $initial->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
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