@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عر ض فاتورة مشتريات') }}
@endsection

@section('content')

<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('bills.index') , 'title' => translate('فواتير المشتريات') , 'isactive' => false],
    ['url' => route('bills.show', $bill->id) , 'title' => translate('فاتورة رقم') . $bill->id , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ translate('رقم  فاتورة المشتريات') }} : {{$bill->id }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ translate('المورد') }}</th>
                                <td>{{ $bill->vendor->name }}</td>
                                <th>{{ translate('المبلغ') }}</th>
                                <td>{{ number_format($bill->total , 2) }}</td>
                                <th>{{ translate('الحالة') }}</th>
                                <td>{{ $bill->status }}</td>
                                <th>{{ translate('تاريخ الانشاء') }}</th>
                                <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                            </tr>
                        </table>

                        <hr>
                        <br>
                        <h3>{{ translate('المنتجات') }}</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ translate('المنتج') }}</th>
                                    <th>{{ translate('الكمية') }}</th>
                                    <th>{{ translate('السعر') }}</th>
                                    <th>{{ translate('الضريبة') }}</th>
                                    <th>{{ translate('المجموع') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bill->items as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->tax }}%</td>
                                        <td>{{ $item->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <th>{{ translate('الاجمالى') }}</th>
                                <th>{{ count($bill->items) }}</th>
                                <th>{{ $bill->items->sum('quantity') }}</th>
                                <th>{{ number_format($bill->items->sum('price') , 2) }}</th>
                                <th>-</th>
                                <th>{{ number_format($bill->items->sum('total') , 2) }}</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                @permission('items-update')
                    <a href="{{ route('bills.edit' , $bill->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                @endpermission
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush