@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض فاتورة') }}
@endsection

@section('content')
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
                                <td>{{ $initial->total }}</td>
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
                                    <th>{{ translate('الوحدة') }}</th>
                                    <th>{{ translate('الكمية') }}</th>
                                    <th>{{ translate('السعر') }}</th>
                                    <th>{{ translate('الضريبة') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($initial->items as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->item->name }}</td>
                                        <td>{{ $item->unit->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->tax }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
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