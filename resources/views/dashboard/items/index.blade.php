@extends('dashboard.layouts.master')

@section('title')
    {{ translate('قائمة المنتجات') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة المنتجات') }}
                    @permission('items-create')
                        <a 
                        class="btn btn-primary btn-sm right"
                        href="{{ route('items.create') }}"
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
                                {{-- <th class="border-top-0">{{ translate('المخزن') }}</th> --}}
                                <th class="border-top-0">{{ translate('المنتج') }}</th>
                                <th class="border-top-0">{{ translate('الكمية') }}</th>
                                <th class="border-top-0">{{ translate('السعر') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    {{-- <td>{{ $item->store->name }}</td> --}}
                                    <td>{{ $item->name }}</td>
                                    <td>0</td>
                                    <td>{{ $item->price_purchase ?? 0 }}</td>
                                    <td>
                                        @permission('items-read')
                                            <a href="{{ route('items.show' , $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                        @endpermission
                                        @permission('items-update')
                                            <a href="{{ route('items.edit' , $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
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