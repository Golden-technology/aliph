<div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="vendorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vendorModalLabel">اضافة مورد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('vendors.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">الاسم :</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">رقم الهاتف :</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script>
    $('.vendor').click(function () {
        if($(this).hasClass('update')) {
            
            $('#vendorModal form').attr('action', $(this).data('action'))
            $('#vendorModal form').append('<input type="hidden" name="_method" value="put">')

            $('#vendorModal form input[name="name"]').val($(this).data('name'))
            $('#vendorModal form input[name="phone"]').val($(this).data('phone'))
        }
        else {
            $('#vendorModal form').attr('action', '{{ route("vendors.store") }}')
            $('#vendorModal form input[name="_method"]').remove()

            $('#vendorModal form input[name="name"]').val('')
            $('#vendorModal form input[name="phone"]').val('')
        }
    })
</script>
@endpush