@extends('dashboard.layouts.master', ['modals' => ['unit'] ])

@section('title')
    {{ translate('قائمة الوحدات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة الوحدات') }}
                    @permission('units-create')
                        <a 
                        class="btn btn-primary btn-sm left unit"
                        href="#"
                        data-toggle="modal" 
                        data-target="#unitModal"
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
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>
                                        @permission('units-update')
                                            <button href="#" class="btn btn-warning btn-sm text-white update unit" data-toggle="modal" data-target="#unitModal" data-action="{{ route('units.update', $unit->id) }}" data-name="{{ $unit->name }}"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</button>
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