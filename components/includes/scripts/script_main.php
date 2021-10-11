<script src="<?=$url?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=$url?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=$url?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=$url?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=$url?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$url?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$url?>/assets/dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="<?=$url?>/assets/bower_components/ckeditor/ckeditor.js"></script> 

<!-- Paypal Express -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script> 
<script src='https://www.google.com/recaptcha/api.js'></script>



<script>
  $(function () {  
    // Datatable
    $('#example1').DataTable()
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script> 


<!--Magnify -->
<script src="<?=$url?>/assets/magnify/magnify.min.js"></script>

<script>
$(function(){
	$('.zoom').magnify();
});
</script>

<!-- Function in Javascript -->

<script type="text/javascript">
                                            
    var actionCheckbox = document.getElementById('check');
    actionCheckbox.addEventListener('click',function show(){
        if(actionCheckbox.checked){
            document.getElementById('btn').disabled=false;
        }else{
            document.getElementById('btn').disabled=true;
        }

    });

    function collapse() {
         var lead = document.getElementById('lead');
         var up= document.getElementById('up-angle');
         var down= document.getElementById('down-angle');
     
        
         if (down.style.display === "none" ) {
          down.style.display = "flex";
          lead.style.display = "none";
          up.style.display = "none";
         } else {
          down.style.display = "none";
          lead.style.display = "block";
          up.style.display = "flex";
         }
     };

     function likeProduct(){
         var like= document.getElementById('Like');
        var empty= document.getElementById('Empty'); 
        if(empty.style.display === "none") {
            empty.style.display = "flex";    
            like.style.display="none";        
        }else{
            empty.style.display = "none";
            like.style.display="flex";
        } 
    };
     function coupon(){
         var cou= document.getElementById('cardCoupon');
         
        if(cou.style.display === "none") {
            cou.style.display = "block";    
            // like.style.display="none";        
        }else{
            cou.style.display = "none";
        //     like.style.display="flex";
        } 
    }; 
     function editname(){
         var save= document.getElementById('save');
         
        if(save.style.display === "none") {
            document.getElementById('nameUser').disabled=false;    
            save.style.display = "block"      
        }else{
            document.getElementById('nameUser').disabled=true; 
            save.style.display = "none"  
        //     like.style.display="flex";
        } 
    };
     function editaddress(){
         var save= document.getElementById('save');
         
        if(save.style.display === "none") {
            document.getElementById('address').disabled=false;    
            save.style.display = "block"      
        }else{
            document.getElementById('address').disabled=true; 
            save.style.display = "none"  
        //     like.style.display="flex";
        } 
    };
     function editphone(){
         var save= document.getElementById('save');
         
        if(save.style.display === "none") {
            document.getElementById('contact').disabled=false;    
            save.style.display = "block"      
        }else{
            document.getElementById('contact').disabled=true; 
            save.style.display = "none"  
        //     like.style.display="flex";
        } 
    };
    
    function save(){
        var redir = window.location="../pages/venta.php"
        setTimeout(redir,3000);
    }
    
   
</script>


<?php include('script_cart.php'); ?>
<?php //include('script-paypal.php'); ?>
<?php include('script-profile.php'); ?> 
