<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        {{-- <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div> --}}
        <ul class="side-menu">
            <li class="side-item side-item-category"></li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/') }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">الرئيسية</span></a>
            </li>

            @permission(['customers-read' , 'customers-create'])
                {{-- <li class="side-item side-item-category">{{ translate('العملاء') }}</li> --}}

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg>
                        <span class="side-menu__label">{{ translate('العملاء') }}</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                            @permission('customers-create')
                                <li><a class="slide-item" href="{{ route('customers.create') }}"> {{ translate('اضافة عميل') }}</a></li>
                            @endpermission

                            @permission('customers-read')
                                <li><a class="slide-item" href="{{ route('customers.index') }}">{{ translate('قائمة العملاء') }}</a></li>
                            @endpermission
                    </ul>
                </li>
            @endpermission

            @permission(['vendors-read' , 'vendors-create'])
                {{-- <li class="side-item side-item-category">{{ translate('الموردين') }}</li> --}}
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg>
                        <span class="side-menu__label">{{ translate('الموردين') }}</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @permission('vendors-create')
                            <li><a class="slide-item" href="{{ route('vendors.create') }}"> {{ translate('اضافة مورد') }}</a></li>
                        @endpermission

                        @permission('vendors-read')
                            <li><a class="slide-item" href="{{ route('vendors.index') }}">{{ translate('قائمة الموردين') }}</a></li>
                        @endpermission
                    </ul>
                </li>
            @endpermission

            @permission(['categories-read' , 'stores-read', 'units-read', 'taxes-read', 'items-read'])
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg>
                        <span class="side-menu__label">{{ translate('المنتجات و الخدمات') }}</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @permission('items-read')
                            <li><a class="slide-item" href="{{ route('items.index') }}">{{ translate('قائمة المنتجات') }}</a></li>
                        @endpermission

                        @permission('categories-read')
                            <li><a class="slide-item" href="{{ route('categories.index') }}">{{ translate('قائمة الاقسام') }}</a></li>
                        @endpermission

                        @permission('stores-read')
                            <li><a class="slide-item" href="{{ route('stores.index') }}">{{ translate('قائمة المخازن') }}</a></li>
                        @endpermission

                        @permission('units-read')
                            <li><a class="slide-item" href="{{ route('units.index') }}">{{ translate('قائمة الوحدات') }}</a></li>
                        @endpermission

                        @permission('taxes-read')
                            <li><a class="slide-item" href="{{ route('taxes.index') }}">{{ translate('قائمة الضرائب') }}</a></li>
                        @endpermission

                    </ul>
                </li>
            @endpermission

            @permission(['initials-read' , 'initials-create'])
                {{-- <li class="side-item side-item-category">{{ translate('العملاء') }}</li> --}}

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg>
                        <span class="side-menu__label">{{ translate('العروض') }}</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                            @permission('initials-create')
                                <li><a class="slide-item" href="{{ route('initials.create') }}"> {{ translate('اضافة عرض') }}</a></li>
                            @endpermission

                            @permission('initials-read')
                                <li><a class="slide-item" href="{{ route('initials.index') }}">{{ translate('قائمة العروض') }}</a></li>
                            @endpermission
                    </ul>
                </li>
            @endpermission

            @permission(['bills-read' , 'bills-create'])
                {{-- <li class="side-item side-item-category">{{ translate('العملاء') }}</li> --}}

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg>
                        <span class="side-menu__label">{{ translate('الفواتير') }}</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                            @permission('bills-create')
                                <li><a class="slide-item" href="{{ route('bills.create') }}"> {{ translate('اضافة فاتورة مشتريات') }}</a></li>
                            @endpermission

                            @permission('bills-read')
                                <li><a class="slide-item" href="{{ route('bills.index') }}">{{ translate('قائمة فواتير المشتريات') }}</a></li>
                            @endpermission
                    </ul>
                </li>
            @endpermission
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
