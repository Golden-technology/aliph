<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>
<!-- parsley  js -->
<script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script src="{{ asset('assets/plugins/parsleyjs/i18n/ar.js')}}"></script>
<!-- select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #0162e8;
        color: #fff;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Rating js-->
<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
<!-- data table  js -->
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
{{-- <script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/fnFilterClear.js') }}"></script> --}}
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<!-- render  js libs -->
<script>
    $(document).ready(function() {
        $('select').select2();
        $('form').parsley();
    });
</script>

<script>
    $.extend( true, $.fn.dataTable.defaults, {
        'paging'      : false,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true,
        'oLanguage'    : {
            "sEmptyTable" : "{{ translate('لا توجد بيانات في هذا الجدول') }}",
            "sInfo" : "عرض _START_ الى _END_ من _TOTAL_ صفوف",
            "sInfoEmpty" : "عرض 0 الى 0 من 0 صفوف",
            "sInfoFiltered" : "(تصفية من _MAX_ مجموع صفوف)",
            "sInfoPostFix" :    "",
            "sInfoThousands" :  ",",
            "sLengthMenu" :     "عرض _MENU_ صفوف",
            "sLoadingRecords" : "تحميل ...",
            "sProcessing" :     "معالجة ...",
            "sSearch" :         "بحث:",
            "sZeroRecords" :    "لا توجد نتائج مطابقة",
            "oPaginate": {
                "sFirst" : "الاول",
                "sLast" : "الاخير",
                "sNext" : "التالي",
                "sPrevious" : "السابق",
            },
            "oAria": {
                "sSortAscending" :  " => تفعيل الترتيب تنازليا",
                "sSortDescending" : " => تفعيل الترتيب تصاعديا"
            }
        },
    } );
    $(function(){
        if (!$.fn.DataTable.isDataTable('table') ) {
            $('table').dataTable({
                'dom': 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: '{{ translate("طباعة") }} <i class="fa fa-print"></i>', 
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                            stripHtml: false
                        },
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '15pt' )
                                .css( 'background-image', 'url("{{ asset("images/Setting/invoice.png") }}")' )
                                .css( 'background-size', 'cover' )
                                .css( 'padding', '200px 50px' )
                                .css( 'direction', 'rtl' )
                            $(win.document.body).find( 'table' )
                                .addClass('compact')
                                .css( 'font-size', 'inherit' );
                        }
                    },
                    {
                        extend: 'excel',
                        text: '{{ translate("اكسل") }} <i class="fa fa-file-excel"></i>', 
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                            stripHtml: false
                        }, 
                        footer: true
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '{{ translate("pdf") }} <i class="fa fa-file-pdf"></i>', 
                        className: 'btn btn-info',
                        download : 'open',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                            stripHtml: true
                        }, 
                        footer: true
                    },
                ],
            });
        }
        if (!$.fn.DataTable.isDataTable( 'table.datatable' ) ) {
            $('table.table-ordered').dataTable({
                'ordering' : true,
            });
        }
        if (!$.fn.DataTable.isDataTable( 'table.table-print' ) ) {
            $('table.table-print').dataTable({
                'paging' : false,
                'searching' : false,
                'dom': 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: '{{ translate("طباعة") }} <i class="fa fa-print"></i>', 
                        className: 'btn btn-default',
                        footer: true
                    },
                    {
                        extend: 'excel',
                        text: '{{ translate("اكسل") }} <i class="fa fa-file-excel"></i>', 
                        className: 'btn btn-success',
                        footer: true
                    },
                    
                ]
            });
        }
        if (!$.fn.DataTable.isDataTable( 'table.table-search')) {
            $('table.table-search').dataTable({
                'searching' : true,
            });
        }
    })
</script>

@stack('js')





