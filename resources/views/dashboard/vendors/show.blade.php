@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض مورد') }}
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ translate(' المورد') }} : {{ $vendor->name }}</h4>
            </div>
            <div class="card-body">
                <x-tab :headers="$headers">
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
                                                        <td>{{ $vendor->name }}</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">{{ translate('رقم الهاتف') }}</td>
                                                        <td>{{ $vendor->phone }}</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <td class="border-top-0">العنوان</td>
                                                        <td>{{ $vendor->address }}</td>
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
                                                        <td>0</td>
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

                        <div class="tab-pane fade {{ $contents['bills']['active'] ? 'show active' : ''  }}" id="{{ $contents['bills']['name'] }}">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">{{ translate('المورد') }}</th>
                                        <th class="border-top-0">{{ translate('المبلغ') }}</th>
                                        <th class="border-top-0">{{ translate('الحالة') }}</th>
                                        <th class="border-top-0">{{ translate('تاريخ الانشاء') }}</th>
                                        <th class="border-top-0">{{ translate('خيارات') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendor->bills as $bill)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $bill->vendor->name }}</td>
                                            <td>{{ $bill->total }}</td>
                                            <td>{{ translate($bill->status) }}</td>
                                            <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @permission('bills-read')
                                                    <a href="{{ route('bills.show' , $bill->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ translate('عرض') }}</a>
                                                @endpermission
                                                @permission('bills-update')
                                                    <a href="{{ route('bills.edit' , $bill->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</a>
                                                @endpermission
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-tab>
            </div>
        </div>
    </div>
</div>
@endsection