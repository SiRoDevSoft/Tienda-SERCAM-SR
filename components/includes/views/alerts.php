<?php
	        			if(isset($_SESSION['warning'])):?>
	        				
						<div class='callout callout-warning '>
							<img src="<?=$url?>/assets/img/icons/check-alert-white.png" alt=""  width="50">  
							<p><?=$_SESSION['warning']?></p>
						</div>
	        				
	        			<?php unset($_SESSION['warning']);
						endif;
	        			?>
	        		<?php
	        			if(isset($_SESSION['error'])):?>
	        				
						<div class='callout callout-danger '>
							<img src="<?=$url?>/assets/img/icons/check-cross-white.png" alt=""  width="50">  
							<p><?=$_SESSION['error']?></p>
						</div>

	        				
	        			<?php unset($_SESSION['error']);
						endif;
	        			?>

	        			<?php if(isset($_SESSION['success'])): ?>
	        				
						<div class='callout callout-success '>
							<img src="<?=$url?>/assets/img/icons/check-good-white.png" alt=""  width="50">   
							<p><?=$_SESSION['success']?></p>
						</div>
	        			
	        			<?php	unset($_SESSION['success']);
								endif;
	        			?>