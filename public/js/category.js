$(document).ready(function () {

    $('#parent_id').change(function () {
        if (this.value != '') {
            $('#cateogryNameTitle').empty()
            $('#cateogryNameTitle').append("Sub Category Title")
        } else {
            $('#cateogryNameTitle').empty()
            $('#cateogryNameTitle').append("Parent Category Title")
        }
    });

});

$('.edit-category').on('click', function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var url = "{{ url('category') }}/" + id;

    $('#editCategoryModal form').attr('action', url);
    $('#editCategoryModal form input[name="name"]').val(name);
});
