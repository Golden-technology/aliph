<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">اضافة عميل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('customers.store') }}" method="POST">
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
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">العنوان:</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">تم الاتفاق:</label>
                        <select class="form-control" name="status">
                            <option value="1">نعم</option>
                            <option value="0">لا</option>
                        </select>
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
    $('.customer').click(function () {
        if($(this).hasClass('update')) {
            
            $('#customerModal form').attr('action', $(this).data('action'))
            $('#customerModal form').append('<input type="hidden" name="_method" value="put">')

            $('#customerModal form input[name="name"]').val($(this).data('name'))
            $('#customerModal form input[name="phone"]').val($(this).data('phone'))
            $('#customerModal form input[name="address"]').val($(this).data('address'))
        }
        else {
            $('#customerModal form').attr('action', '{{ route("customers.store") }}')
            $('#customerModal form input[name="_method"]').remove()

            $('#customerModal form input[name="name"]').val('')
            $('#customerModal form input[name="phone"]').val('')
            $('#customerModal form input[name="address"]').val('')
        }
    })
</script>
@endpush