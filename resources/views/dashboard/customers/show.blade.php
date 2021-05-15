@extends('dashboard.layouts.master')

@section('title')
    {{ translate('عرض عميل') }}
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ translate(' عميل') }} : {{ $customer->name }}</h4>
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

                        <div class="tab-pane fade {{ $contents['phone']['active'] ? 'show active' : ''  }}" id="{{ $contents['phone']['name'] }}">
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
                    </x-slot>
                </x-tab>
            </div>
        </div>
    </div>
</div>
@endsection