@if($errors->any())
    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
        <script>
            $.notify({
                message: '{{ translate("عذرا راجع البيانات المدخلة") }}' 
            },{
                element: 'body',
                type: 'danger',
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutRight'
                },
            });
        </script>
@endif


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    @if(session()->has('success'))
        Swal.fire({
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: '{{ translate("تم") }}'
        })
    @endif
</script>

