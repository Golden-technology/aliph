@extends('dashboard.layouts.master', ['modals' => ['method'] ])

@section('title')
    {{ translate('قائمة طرق الدفع') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة طرق الدفع') }}
                    @permission('methods-create')
                        <a 
                        class="btn btn-primary float-left method"
                        href="#"
                        data-toggle="modal" 
                        data-target="#methodModal"
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
                            @foreach ($methods as $method)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $method->name }}</td>
                                    <td>
                                        @permission('methods-update')
                                            <button href="#" class="btn btn-warning btn-sm text-white update method" data-toggle="modal" data-target="#methodModal" data-action="{{ route('methods.update', $method->id) }}" data-name="{{ $method->name }}"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</button>
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