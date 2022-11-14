


function removeRow(MaSP, url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { MaSP },
            url: url,
            success: function (result) {

                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert('Xin vui lòng thử lại');
                }
            }
        })
    }

    // Upload File
$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            console.log(results);
        }
    });
});
}



