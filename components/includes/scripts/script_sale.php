<script>
var totalsale = 0;
$(function(){

		$(document).on('click', '.save_info', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			var address = $('#address').val();
			var contact = $('#contact').val();
			$.ajax({
				type: 'POST',
				url: '../sales/update_info_user.php',
				data: { 
					id:id,
					address:address, 
					contact:contact
				},
				dataType: 'json',
				success: function(response){
					if(!response.error){
						getDetailsSale(); //Cuando se presiona esta funcion acciona las demas funciones VER ESO...
						getSale(); 
						getTotalsale();
						
						
					}
				}
			});
		});
	

	getDetailsSale();
	getTotalsale();


		$(document).on('click', '.confirm', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: '../sales/transactions.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(!response.error){
						getDetailsSale(); //Cuando se presiona esta funcion acciona las demas funciones VER ESO...
						getSale(); 
						getTotalsale();
						
						
					}
				}
			});
		});
	

	getDetailsSale();
	getTotalsale();



	

});



function getDetailsSale(){
	$.ajax({
		type: 'POST',
		url: '../sales/sale_detail.php',
		dataType: 'json',
		success: function(response){
			$('#tbodysale').html(response);
			getSale();
		}
	});
} 


</script>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: '../sales/transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.Fecha);
        $('#transid').html(response.Transacción);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>