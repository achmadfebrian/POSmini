$('.editCategory').on('click', function() {
  const id = $(this).data('id');
  const url = $(this).data('url');

  $.ajax({
    url: url,
    data: {id:id},
    method: 'post',
    dataType: 'json',
    success: function (data) {
      const result = data.data;
      console.log($('#_category-name'));
      $('#_id').val(result.id);
      $('#_category-name').val(result.category_name);
    }
  })

})