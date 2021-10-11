<?php
        if(isset($_SESSION['error'])): ?>

        <div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <div class="text-alert">
          <h4><i class="icon fa fa-exclamation-circle"></i><?=$_SESSION['status']=(isset($_SESSION['status']))?$_SESSION['status']:'Error!'?></h4>
          <?=$_SESSION['error']?>
          </div>
        
        </div>

        <?php    
          unset($_SESSION['error']);
          unset($_SESSION['status']);
        endif;?>
        <!-- Warning -->
        <?php
        if(isset($_SESSION['warning'])): ?>

        <div class='alert alert-warning alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-warning'></i><?=$_SESSION['status']=(isset($_SESSION['status']))?$_SESSION['status']:'Alerta!'?></h4>
          <?=$_SESSION['warning']?>
        </div>

        <?php    
          unset($_SESSION['warning']);
          unset($_SESSION['status']);
        endif;?>
        <!-- correcto -->
        <?php
        if(isset($_SESSION['success'])): ?>

        <div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-check'></i><?=$_SESSION['status']=(isset($_SESSION['status']))?$_SESSION['status']:'Excelente!'?></h4>
          <?=$_SESSION['success']?>
        </div>

        <?php    
          unset($_SESSION['success']);
          unset($_SESSION['status']);
        endif;?>


        