@extends('dashboard.layouts.master', ['modals' => ['store'] ])

@section('title')
    {{ translate('قائمة المخازن') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة المخازن') }}
                    @permission('stores-create')
                        <a 
                        class="btn btn-primary float-left store"
                        href="#"
                        data-toggle="modal" 
                        data-target="#storeModal"
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
                            @foreach ($stores as $store)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $store->name }}</td>
                                    <td>
                                        @permission('stores-update')
                                            <button href="#" class="btn btn-warning btn-sm text-white update store" data-toggle="modal" data-target="#storeModal" data-action="{{ route('stores.update', $store->id) }}" data-name="{{ $store->name }}"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</button>
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