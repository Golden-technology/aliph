@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">
                قائمة الاصناف
                @permission('items-create')
                <button 
                class="btn btn-primary btn-sm left item"
                data-bs-toggle="modal"
                data-bs-target="#itemModal">
                <i class="fa fa-plus"> اضافة</i>
                </button>
                @endpermission
            </h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">الاسم</th>
                            <th class="border-top-0">الكمية</th>
                            <th class="border-top-0">التكلفة</th>
                            <th class="border-top-0">سعر البيع</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->cost }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    {{-- @permission('items-read')
                                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>
                                    @endpermission --}}
                                    @permission('items-update')
                                    <button 
                                    class="btn btn-warning btn-sm item update"
                                    data-bs-toggle="modal"
                                    data-bs-target="#itemModal"
                                    data-name="{{ $item->name }}"
                                    data-quantity="{{ $item->quantity }}"
                                    data-cost="{{ $item->cost }}"
                                    data-price="{{ $item->price }}"
                                    data-action="{{ route('items.update', $item->id) }}"
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                    </button>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('dashboard.modals.item')
    </div>
</div>
@endsection