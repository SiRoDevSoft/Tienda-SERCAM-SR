<?php
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';
	

	$product=array();


	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price_init = $_POST['price'];
		$price_sale =$_POST['price_sale'];
		$iva = $_POST['iva'];
		$stock = $_POST['stock'];
		$description = $_POST['description'];
		//$filename = $_FILES['photo']['name'];

		

		$stmt = searchnameProduct($conexion, $slug);
		foreach($stmt as $row){

			$count=$row['numrows'];
		}

		if($count > 0){
			$_SESSION['error'] = 'Producto ya existe';
			$_SESSION['status'] = 'Altas de producto';
		}
		else{
			// field validations
			
			if (isset($_FILES['photo']['name'])  && !empty($_FILES['photo']['name'])) { 
               
                $img=(isset($_FILES['photo']['name'])) ? $_FILES['photo']['name']: "";

                $date=new DateTime();
                $nameFile=($img!="")?$date->getTimestamp()."_".$_FILES["photo"]["name"]:"product.png";
      
                $tmpImg=$_FILES["photo"]["tmp_name"];
      
                if (!empty($tmpImg)) {
                  
                  // Creamos la imagen en la carpeta del sitio
                    move_uploaded_file($tmpImg, "../../../assets/img/products/".$nameFile);

                    $product['photo']=$nameFile;

                }

            } else {               				
                $product['photo']='';
            } 

			// Validation name
			if(!empty($name) && strlen($name)>=5){
				$product['name'] = $name;
			}else{
				$_SESSION['error'] = "El nombre del producto no es válido";
				$_SESSION['status'] = "Alta de producto";
			}

			//validation price product

			if(!empty($price_init)){
				$product['price_init'] = $price_init;
			}else{
				$_SESSION['error'] = "El precio compra del producto no es válido";
				$_SESSION['status'] = "Alta de producto";
			}
			if(!empty($price_sale)){
				$priceValidation= $price_sale;
			}else{
				$_SESSION['error'] = "El precio venta del producto no es válido";
				$_SESSION['status'] = "Alta de producto";
			}
			if(!empty($iva)){
				$ivaValidation= $iva;

			}else{
				$_SESSION['error'] = "El iva seleccionado no es válido";
				$_SESSION['status'] = "Alta de producto";
			}
			if($priceValidation>0){
				$product['iva'] = (($priceValidation * $ivaValidation)/100);
				$product['price_sale'] = $product['iva'] + $priceValidation;
			}else{
				$_SESSION['error'] = "El valor del producto no es real";
				$_SESSION['status'] = "Alta de producto";
			}


			// Validation desciption
			if(!empty($description)){
				$product['description'] = $description;
			}else{
				$_SESSION['error'] = "La descrición del producto no es válida";
				$_SESSION['status'] = "Alta de producto";
			}
		}
		if(!isset($category) || empty($category)){
			$_SESSION['error'] = "El producto no es válido";
			$_SESSION['status'] = "Alta de producto";
			exit();
		}else{
			$product['type'] = (int) $category;
		}
		if(!isset($stock) || empty($stock)){
			$_SESSION['error'] = "El stock del producto no es válido";
			$_SESSION['status'] = "Alta de producto";
			exit();
		}else{
			$product['stock'] = (int) $stock;
		}

		 

		$new_Product= addProductsStock($conexion,$product['type'],$product['name'],$product['description'],$product['photo'],$product['stock'],$product['price_init'],$product['price_sale'],$product['iva']);

		$_SESSION['success'] = "Producto agregado correctamente";
		$_SESSION['status'] = "Alta de producto";

		
	}
	else{
		$_SESSION['error'] = 'Rellene el formulario del producto primero';
	}

	header('location: ../stock.php?section');

?>