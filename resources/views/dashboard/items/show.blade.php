@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض منتج') }}
@endsection

@section('content')
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

                        {{-- <hr>
                        <br>
                        <h3>{{ translate('الكميات و الوحدات') }}</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ translate('المخزن') }}</th>
                                    <th>{{ translate('الوحدة') }}</th>
                                    <th>{{ translate('الكمية') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->stores as $store)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $store->store->name }}</td>
                                        <td>{{ $store->unit->name }}</td>
                                        <td>{{ $store->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset($item->image) }}" alt="">
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