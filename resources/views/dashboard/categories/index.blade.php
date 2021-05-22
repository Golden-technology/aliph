@extends('dashboard.layouts.master', ['modals' => ['category'] ])

@section('title')
    {{ translate('قائمة الاقسام') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ translate('قائمة الاقسام') }}
                    @permission('categories-create')
                        <a 
                        class="btn btn-primary float-left category"
                        href="#"
                        data-toggle="modal" 
                        data-target="#categoryModal"
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
                                <th class="border-top-0">{{ translate('الاسم') }}</th>
                                <th class="border-top-0">{{ translate('خيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @permission('categories-update')
                                            <button href="#" class="btn btn-warning btn-sm text-white update category" data-toggle="modal" data-target="#categoryModal" data-action="{{ route('categories.update', $category->id) }}" data-name="{{ $category->name }}"><i class="fa fa-edit"></i> {{ translate('تعديل') }}</button>
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