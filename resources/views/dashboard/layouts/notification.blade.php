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

