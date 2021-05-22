@extends('dashboard.layouts.master', ['modals' => ['tax'] ])

@section('title')
    {{ translate('قائمة الضرائب') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة الضرائب') }}
                    @permission('taxes-create')
                        <a 
                        class="btn btn-primary float-left tax"
                        href="#"
                        data-toggle="modal" 
                        data-target="#taxModal"
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
                                <th class="border-top-0">{{ translate('القيمة') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taxes as $tax)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $tax->value }}</td>
                                    <td>
                                        @permission('taxes-update')
                                            <button href="#" class="btn btn-warning btn-sm text-white update tax" data-toggle="modal" data-target="#taxModal" data-action="{{ route('taxes.update', $tax->id) }}" data-value="{{ $tax->value }}"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</button>
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