$(function () {

    let count = 0
    $('#add-store').click(function () {
        count++

        let stores
        let units
        let row 
        
        stores  = $(this).data('stores')
        units   = $(this).data('units')

        row = `
            <tr>
                <td>`+ count +`</td>
                <td>
                    <select class="form-control" name="stores[]">
                    `+
                        stores.forEach(store => {
                            `<option>` +  store['name'] +`</option>`
                        });
                    +`
                    </select>
                <td>
            </tr>
        `

        $('#stores tbody').append(row)
    })

})