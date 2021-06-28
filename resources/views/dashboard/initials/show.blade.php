@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض فاتورة') }}
@endsection

@section('content')

<!-- breadcrumb -->
<x-bread-crumb
:breads="[
    ['url' => url('/') , 'title' => translate('لوحة التحكم') , 'isactive' => false],
    ['url' => route('initials.index') , 'title' => translate('العروض') , 'isactive' => false],
    ['url' => route('initials.show', $initial->id) , 'title' =>  translate('عرض رقم ') . $initial->id , 'isactive' => true],
]">
</x-bread-crumb>
<!-- /breadcrumb -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ translate('رقم الفاتورة') }} : {{$initial->id }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ translate('العميل') }}</th>
                                <td>{{ $initial->customer->name }}</td>
                                <th>{{ translate('المبلغ') }}</th>
                                <td>{{ number_format($initial->total , 2) }}</td>
                                <th>{{ translate('الحالة') }}</th>
                                <td>{{ $initial->status }}</td>
                                <th>{{ translate('تاريخ الانشاء') }}</th>
                                <td>{{ $initial->created_at->format('Y-m-d') }}</td>
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
                                @foreach ($initial->items as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->itemStore->item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->tax }}%</td>
                                        <td>{{ $item->quantity * $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ translate('الاجمالى') }}</th>
                                    <th>{{ count($initial->items) }}</th>
                                    <th>{{ $initial->items->sum('quantity') }}</th>
                                    <th>{{ number_format($initial->items->sum('price') , 2) }}</th>
                                    <th>-</th>
                                    <th>{{ number_format($initial->items->sum('total') , 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                @permission('items-update')
                    <a href="{{ route('initials.edit' , $initial->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                @endpermission
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush