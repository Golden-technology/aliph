@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <td>
                                <th class="border-top-0">{{ translate('الاسم') }}</th>
                                <td>{{ $user->name }}</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <th class="border-top-0">{{ translate('البريد الالكتروني') }}</th>
                                <td>{{ $user->name }}</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <th class="border-top-0">{{ translate('رقم الهاتف') }}</th>
                                <td>{{ $user->phone }}</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                                <td>
                                    @permission('users-update')
                                    <a 
                                    class="btn btn-warning btn-sm user update"
                                    href="{{ route('users.edit', $user->id) }}"
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                    </a>
                                    @endpermission
                                </td>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection