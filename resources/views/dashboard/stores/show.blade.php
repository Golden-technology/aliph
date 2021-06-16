@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض مخزن') }}
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ translate(' مخزن') }} : {{ $store->name }}</h4>
            </div>
            <div class="card-body">
                <div>
                    <table class="table table-bordred">
                        <thead class="bg-white">
                            <tr>
                                <td>
                                    <td class="">{{translate('الاسم')}}</td>
                                    <td>{{ $store->name }}</td>
                                    <td class="">{{translate('عدد المنتجات')}}</td>
                                    <td>0</td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                {{-- <x-tab :headers="$headers">
                    <x-slot name="content">
                        <div class="tab-pane fade {{ $contents['content']['active'] ? 'show active' : ''  }} " id="{{ $contents['content']['name'] }}" >
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">{{translate('الاسم')}}</td>
                                                        <td>{{ $customer->name }}</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">{{ translate('رقم الهاتف') }}</td>
                                                        <td>{{ $customer->phone }}</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">العنوان</td>
                                                        <td>{{ $customer->address }}</td>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">{{translate('الإجمالي للفواتير	')}}</td>
                                                        <td>{{ number_format($customer->invoices->sum('total') , 2) }}</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">{{ translate('مجموع المبالغ المدفوعة') }}</td>
                                                        <td>0</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">{{ translate('مجموع الرصيد	') }}</td>
                                                        <td>0</td>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade {{ $contents['initial']['active'] ? 'show active' : ''  }}" id="{{ $contents['initial']['name'] }}">
                            <div>
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">{{ translate('رقم الفاتورة') }}</th>
                                            <th class="border-top-0">{{ translate('المبلغ') }}</th>
                                            <th class="border-top-0">{{ translate('الحالة') }}</th>
                                            <th class="border-top-0">{{ translate('تاريخ الانشاء') }}</th>
                                            <th class="border-top-0">{{ translate('خيارات') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->initials as $initial)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $initial->id }}</td>
                                                <td>{{ $initial->total }}</td>
                                                <td>{{ translate($initial->status) }}</td>
                                                <td>{{ $initial->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    @permission('initials-read')
                                                        <a href="{{ route('initials.show' , $initial->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                                    @endpermission
                                                    @permission('initials-update')
                                                        <a href="{{ route('initials.edit' , $initial->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                                                    @endpermission
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade {{ $contents['invoices']['active'] ? 'show active' : ''  }}" id="{{ $contents['invoices']['name'] }}">
                            <div>
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">{{ translate('المخزن') }}</th>
                                            <th class="border-top-0">{{ translate('المبلغ') }}</th>
                                            <th class="border-top-0">{{ translate('الحالة') }}</th>
                                            <th class="border-top-0">{{ translate('تاريخ الانشاء') }}</th>
                                            <th class="border-top-0">{{ translate('خيارات') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->invoices as $invoice)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $invoice->customer->name }}</td>
                                                <td>{{ number_format($invoice->total , 2) }}</td>
                                                <td>{{ translate($invoice->status) }}</td>
                                                <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    @permission('invoices-read')
                                                        <a href="{{ route('invoices.show' , $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                                    @endpermission
                                                    @permission('invoices-update')
                                                        <a href="{{ route('invoices.edit' , $invoice->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                                                    @endpermission
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </x-slot>
                </x-tab> --}}
            </div>
        </div>
        <div class="card">
            <form action="{{ route('prices.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>
                        {{ translate(' المنتجات') }} 
                        <button type="submit" class="btn btn-primary float-left"><i class="fa fa-save"></i> {{ translate('حفظ الاسعار') }}</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center align-items-md-baseline">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ translate('الاسم') }}</th>
                                <th>{{ translate('الكمية') }}</th>
                                <th>{{ translate('سعر الشراء') }}</th>
                                <th>{{ translate('سعر البيع') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($store->items as $item)
                                <tr>
                                    <input type="hidden" name="itemstore[]" value="{{ $item->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price_sale }}</td>
                                    <td style="width: 16%"><input type="number" step="0.1" name="price_purchase[]" class="form-control" value="{{ $item->price_purchase ?? 0 }}"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection