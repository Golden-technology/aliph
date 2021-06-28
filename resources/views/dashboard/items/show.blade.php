@extends('dashboard.layouts.master', ['modals' => ['barcode']])

@section('title')
    {{ translate('عرض منتج') }}
@endsection

@section('content')

<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('items.index') , 'title' => translate('المنتجات') , 'isactive' => false],
    ['url' => route('items.show', $item->id) , 'title' =>  $item->name , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ translate('المعرف ') }} : {{$item->id }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-10">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ translate('اسم المنتج') }}</th>
                                <td>{{ $item->name }}</td>
                                <th>{{ translate('القسم') }}</th>
                                <td>{{ $item->category->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('المورد') }}</th>
                                <td>{{ $item->vendor->name }}</td>
                                <th>{{ translate('العملة') }}</th>
                                <td>{{ $item->currency ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>{{ translate('سعر الشراء') }}</th>
                                <td>{{ $item->price_sale }}</td>
                                <th>{{ translate('سعر البيع') }}</th>
                                <td>
                                    {{ $item->price_purchase }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{ translate('الوحدات') }}</th>
                                <td>
                                    {{ $item->unit->name }} 
                                </td>
                                <th>{{ translate('الضريبة') }}</th>
                                <td>
                                    {{ $item->tax->value }}%
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2">
                        <div class="img form-group">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="barcode">
                            <h3>
                                {!! DNS1D::getBarcodeHTML($item->barcode, "C128",1.4,44) !!}
                            </h3>
                            <p class="text-center">{{ $item->barcode }}</p>
                            <button class="btn btn-primary btn-block print" 
                            data-toggle="modal" 
                            data-target="#barcodeModal"
                            data-item="{{ $item->id }}"
                            ><i class="fa fa-print"></i> طباعة</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                @permission('items-update')
                    <a href="{{ route('items.edit' , $item->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                @endpermission
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush