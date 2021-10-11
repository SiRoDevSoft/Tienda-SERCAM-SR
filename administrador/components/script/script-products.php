<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
    
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
    
  });

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php?section';
    }
    else{
      window.location = 'products.php?section&category='+val;
    }
  }); 

  // Agregas las funciones de categoria e iva
  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
    getIva();
  });  

  // Abre la ventana modal de nuevo producto
  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });
 
}); 
 
function getRow(id){
  $.ajax({
    type: 'POST',
    url: '../sections/products/products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.catId).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description); 
      getCategory();
      getIva();
      
    }
  });
}
function getCategory(){ 
  $.ajax({ 
    type: 'POST',
    url: '../sections/category/category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
function getIva(){ 
  $.ajax({
    type: 'POST',
    url: '../sections/iva/iva_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#iva').append(response);
      $('#edit_iva').append(response);
    }
  });
}
</script>

