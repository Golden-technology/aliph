<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">اضافة صنف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('items.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">الاسم :</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> الكمية :</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">التكلفة:</label>
                        <input type="number" class="form-control" name="cost" step="0.1">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">سعر البيع:</label>
                        <input type="number" class="form-control" name="price" step="0.1">
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
    $('.item').click(function () {
        if($(this).hasClass('update')) {
            
            $('#itemModal form').attr('action', $(this).data('action'))
            $('#itemModal form').append('<input type="hidden" name="_method" value="put">')

            $('#itemModal form input[name="name"]').val($(this).data('name'))
            $('#itemModal form input[name="quantity"]').val($(this).data('quantity'))
            $('#itemModal form input[name="cost"]').val($(this).data('cost'))
            $('#itemModal form input[name="price"]').val($(this).data('price'))
        }
        else {
            $('#itemModal form').attr('action', '{{ route("items.store") }}')
            $('#itemModal form input[name="_method"]').remove()

            $('#itemModal form input[name="name"]').val('')
            $('#itemModal form input[name="quantity"]').val('')
            $('#itemModal form input[name="cost"]').val('')
            $('#itemModal form input[name="price"]').val('')
        }
    })
</script>
@endpush