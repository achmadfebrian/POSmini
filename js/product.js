$('.editProduct').on('click', function() {
  const id = $(this).data('id');
  const url = $(this).data('url');

  $.ajax({
    url: url,
    data: {id:id},
    method: 'post',
    dataType: 'json',
    success: function (data) {
      const result = data.data;

      $('#_id').val(result.id);
      $('#_old-image').val(result.image);
      $('#_product-name').val(result.product_name);
      $('#_category').val(result.category_id);
      $('#_price').val(result.price);
      $('#_description').val(result.description);
    }
  })

})