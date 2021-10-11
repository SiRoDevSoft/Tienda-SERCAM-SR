<?php
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';

 
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price_sale = $_POST['price'];
        $description = $_POST['description'];
        $iva = $_POST['iva'];

        $product = array();

		if(empty($category) || empty($iva)){
			$Pro = productCategory($conexion, $id);
			foreach($Pro as $produ){
				$product['type'] = $produ['type'];
				$IVA= (int)$produ['iva'];
			}
		}else{
			$product['type']=$category;
		}
        
        if(isset($id)){           
            // field validations
            
            // Validation name
            if (!empty($name) && strlen($name)>=5) {
                $product['name'] = $name;
            } else {
                $_SESSION['error'] = "El nombre del producto no es válido";
                $_SESSION['status'] = "Actualización de producto";
            }

            //validation price product
            if (!empty($iva) && !empty($price_sale)) {  
                $IVA= (($price_sale * $iva)/100);
                $product['iva'] = $IVA;
            } else {
                $product['iva'] = $IVA;
            }
            if (!empty($price_sale)) {

                $product['price_sale'] =  $product['iva'] + $price_sale;

            } else {
                $_SESSION['error'] = "El precio del producto no es válido";
                $_SESSION['status'] = "Actualización de producto";
            }

            // Validation desciption
            if (!empty($description) && strlen($name)>=5) {
                $product['description'] = $description;
            } else {
                $_SESSION['error'] = "La descrición del producto no es válida";
                $_SESSION['status'] = "Actualización de producto";
            }
        }
        if (!isset($category)) {
            $_SESSION['error'] = "El producto no es válido";
            $_SESSION['status'] = "Actualización de producto";
            exit();
        } 

		// Actualizar los datos del producto validado
        

		$update_Product= updateProduct($conexion, $id, $product['type'],$product['name'],$product['description'],$product['price_sale'], $product['iva'] );

		$_SESSION['success'] = "Producto actualizado correctamente";
		$_SESSION['status'] = "Actualización de producto";


    }	
	else{
		$_SESSION['error'] = 'Rellene el formulario de edición del producto primero';
		$_SESSION['status'] = "Actualización de producto";
	}

	header('location: ../products.php?section');

?>