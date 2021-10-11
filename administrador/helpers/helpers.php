<?php

// Consulta en la tabla productos las categorias y si se obtiene el id del producto sus descripciones  
function showCategoryProducts($conexion, $idProduct){

	if(!isset($idProduct)){
		$stmt = $conexion->prepare("SELECT * FROM products_category WHERE status=true");
		 
	}else{ 
		$stmt = $conexion->prepare("SELECT P.id id, P.identity identity, C.title title, C.description description FROM products_category P INNER JOIN  detail_category C ON P.id=C.id WHERE P.id=$idProduct AND status=true");
		
	}
	$stmt->execute();

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}

// funcion para obtener la categoria del producto
function productCategory($conexion, $id){
	$stmt = $conexion->prepare("SELECT * FROM products WHERE id=:id AND status=true");
	$stmt->execute(['id'=> $id]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}

// Funcion para visualizar la categoria en específica
function showCategoryType($conexion, $idCat){

	if(isset($idCat)){
		$stmt = $conexion->prepare("SELECT * FROM products_category WHERE id=:id AND status=true");
		$stmt->execute(['id'=> $idCat]);
	}else{
		$stmt = $conexion->prepare("SELECT * FROM products_category");
		$stmt->execute();
	}
	

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}

function showIva($conexion){
	$stmt = $conexion->prepare("SELECT * FROM iva");
	$stmt->execute();

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}

// Funcion para mostrar todos los productos de una categoria

function showProductbyCategory($conexion, $idcat){

	if(isset($idcat)){
		$stmt = $conexion->prepare("SELECT * FROM products WHERE type=$idcat AND status=true");
	}else{
		$stmt = $conexion->prepare("SELECT * FROM products WHERE status=true");
	}
	
	$stmt->execute();

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}


// Funcion para buscar si existe el produto
function searchnameProduct($conexion, $name){

	$stmt = $conexion->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE name=:name");

	$stmt->execute(['name'=>$name]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}

// Buscar si el producto tiene imagen
function searchProductPhoto($conexion, $id){

	$stmt = $conexion->prepare("SELECT photo FROM products WHERE id=$id AND status=true");
    $stmt-> execute();                                    
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;	
}

function searchProductmostView($conexion){
	$stmt = $conexion->prepare("SELECT * FROM products 
	WHERE counter>= 10 AND status=true ORDER BY counter DESC LIMIT 6");
	$stmt->execute();
	
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

// Actuaización de imagen del producto

function updateProductImg($conexion, $id, $photo){
	
	$stmt = $conexion -> prepare("UPDATE products SET photo= :photo WHERE id= :id");
	$stmt -> execute(['id'=>$id, 'photo'=>$photo]);

}


// Agregar productos en la base de datos
function addProducts($conexion, $type, $name, $description, $photo, $price_init, $price_sale,$iva)
{

	$stmt = $conexion->prepare("INSERT INTO products (type, name, description, photo, price_init, price_sale,iva, date, status) VALUES (:type, :name, :description, :photo, :price_init, :price_sale, :iva, :date, true)");
	$stmt->execute(['type'=>$type, 'name'=>$name, 'description'=>$description, 'photo'=>$photo, 'price_init'=>$price_init, 'price_sale'=>$price_sale, 'iva'=>$iva, 'date'=>date('Y-m-d') ]);
}
// Agregar productos en la base de datos
function addProductsStock($conexion, $type, $name, $description, $photo,$stock, $price_init, $price_sale,$iva){

	$stmt = $conexion->prepare("INSERT INTO products (type, name, description, photo,stock, price_init, price_sale,iva, date, status) VALUES (:type, :name, :description, :photo, :stock, :price_init, :price_sale, :iva, :date, true)");
	$stmt->execute(['type'=>$type, 'name'=>$name, 'description'=>$description, 'photo'=>$photo, 'stock'=>$stock, 'price_init'=>$price_init, 'price_sale'=>$price_sale, 'iva'=>$iva, 'date'=>date('Y-m-d') ]);
}

// Obtener todos los datos de un producto
function productProperty($conexion, $id){

	$stmt = $conexion->prepare("SELECT *, P.id AS prodid, P.photo AS photo, P.stock AS stock,P.price_sale AS price, P.name AS prodname,C.id AS catId, C.identity AS catname, P.date_view AS view FROM products P LEFT JOIN products_category C ON C.id=P.type WHERE P.id=:id AND P.status=true");
	$stmt->execute(['id'=>$id]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;	  
}

// Actualizar datos de productos en lista
function updateProduct($conexion, $id, $type, $name, $description, $price, $iva ){
    $stmt = $conexion->prepare("UPDATE products SET type= :type, name= :name, description= :description, price_sale= :price, iva= :iva WHERE id=:id");

    $stmt->execute(['type'=>$type,'name'=>$name,'description'=>$description,'price'=>$price, 'iva'=>$iva, 'id'=>$id]);
}

// Borrar productos de lista de productos
function deleteProduct($conexion, $id){

    $stmt = $conexion->prepare("UPDATE products SET status= :status WHERE id=:id");
    $stmt->execute(['status'=>false, 'id'=>$id]);
}

// Función para cargar vistas realizadas al producto
function updateViewProduct($conexion, $idProduct,$count, $date){

	if(isset($count)){
		$stmt = $conexion->prepare("UPDATE products SET counter=counter+$count, date_view= :date WHERE id=:id AND status=true");
		$stmt->execute(['id'=>$idProduct, 'date'=> $date]);
	}
	else{
		$stmt = $conexion->prepare("UPDATE products SET date_view=:date WHERE id=:id AND status=true");
		$stmt->execute(['id'=>$idProduct, 'date'=>$date]);
	}

}

// Consulta en la tabla usuarios segun id
function showUser($conexion, $id){
 
    $stmt = $conexion->prepare("SELECT * FROM users WHERE id=$id AND status=true");
    $stmt-> execute();                                    
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;	
}

// Consulta en la tabla usuarios segun id y verifica existenca
function countUsers($conexion, $id){
 
    $stmt = $conexion->prepare("SELECT *, concat(firstname,' ',lastname) as name, count(*) numrows FROM users WHERE id=:id AND status=true");
    $stmt-> execute(['id'=>$id]);                                    
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;	
}

// Buscar todos los usuarios registrados segun su tipo de usuario
function showUsertype($conexion, $type){

	$stmt = $conexion->prepare("SELECT * FROM users WHERE type=:type AND status=true");
    $stmt->execute(['type'=>$type]);

	$result =$stmt ->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

function showcustomers($conexion){
	$stmt = $conexion->prepare("SELECT COUNT(*) numrows,U.id as idUser, CONCAT(U.firstname,' ',u.lastname) as Name, U.email as email, S.date_sale as sale_date, U.photo as photo, U.status as status FROM users U INNER JOIN sales S ON S.user_id=U.id WHERE U.type=2 AND U.status=true GROUP BY S.user_id ASC HAVING count(s.user_id>=1)");
    $stmt->execute();

	$result =$stmt ->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

// Consulta en la tabla detail
function showDetail($conexion){
   
    $stmt = $conexion->prepare("SELECT * FROM detail LEFT JOIN products ON products.id=detail.product_id");
    $stmt->execute();

    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;	
}
function showtotalsales($conexion){
	$stmt = $conexion->prepare("SELECT SUM(full_payment) as total FROM sales;");
    $stmt->execute();

    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;	
}

function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}
  // Eliminar ceros innecesarios después del decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intencionalmente no afecta parciales, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}
	return $n_format . $suffix;
}

// Consulta la cantidad de productos en la tabla de productos
function countProducts($conexion){
    $stmt = $conexion->prepare("SELECT COUNT(*) AS numrows FROM products");
    $stmt->execute();

    $result= $stmt->fetchAll(PDO::FETCH_ASSOC); //Verificar si este metodo nos permite retornar un valor contable 
    
    return $result;	

}

// Consulta la cantidad de usuarios y sus datos
function countUser($conexion){
    $stmt = $conexion->prepare("SELECT COUNT(*) AS numrows FROM users");
    $stmt->execute();

    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// Consulta la ventas del dia
function salesToday($conexion, $date){
    $stmt = $conexion->prepare("SELECT * FROM detail LEFT JOIN sales ON sales.id=detail.sales_id LEFT JOIN products ON products.id=detail.product_id WHERE sales.date_sale=:sales_date");
    $stmt->execute(['sales_date'=>$date]);

    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// Consulta existencia de usuario en la tabla usuarios segun email
function loginuserEmail($conexion, $email){

	$stmt = $conexion->prepare("SELECT * FROM users WHERE email = :email");
	$stmt->execute(['email'=>$email]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
// Comprobar si existe cart de usuario
function searchCartUser($conexion, $user){
	$stmt = $conexion->prepare("SELECT COUNT(*) AS numrows FROM cart WHERE user_id = :id");
	$stmt->execute(['id'=>$user]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
// Comprobar carro de compras usuario
function CartUser($conexion, $user){
	$stmt = $conexion->prepare("SELECT * FROM cart C WHERE user_id = :id GROUP by C.product_id desc;");
	$stmt->execute(['id'=>$user]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// consulta en la tabla de carro de compras segun usuario
function cartFetch($conexion, $id){



        $stmt = $conexion->prepare("SELECT *,P.name AS prodname,C.name AS catname FROM cart K LEFT JOIN products P ON  K.product_id=P.id LEFT JOIN products_category C ON P.type = C.id WHERE K.user_id =:user_id");

        $stmt->execute(['user_id'=>$id]);

		$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;

	
}

function countViewCart($conexion, $id){

    // if (isset($id)) {
        $stmt = $conexion->prepare("SELECT *, P.name AS prodname, C.name AS catname FROM products P LEFT JOIN products_category C ON C.id=P.type WHERE P.id=:id");

        $stmt->execute(['id'=>$id]);
    //     // 	$product = $stmt->fetch();
    // }else{
	// 	$stmt=array();
	// }
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}

function cartUsercount($conexion, $id_User, $id_Product){
 
	$stmt = $conexion->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
	$stmt->execute(['user_id'=>$id_User, 'product_id'=>$id_Product]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}

function addCart_User($conexion, $id_User, $id_Product, $quantity){
	
	$stmt = $conexion->prepare("INSERT INTO cart (user_id, product_id, quantity,status) VALUES (:user_id, :product_id, :quantity,1)");
	$stmt->execute(['user_id'=>$id_User, 'product_id'=>$id_Product, 'quantity'=>$quantity]);

	// $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    // return $result;

}
		
function deleteCart_User($conexion, $id){
	//UPDATE productos SET estado=:estado WHERE id=:id
	$stmt = $conexion->prepare("UPDATE cart SET WHERE id=:id");
	$stmt->execute(['id'=>$id]);
}

function totalCart_User($conexion, $id){
	$stmt = $conexion->prepare("SELECT *, C.id AS cartid FROM cart C INNER JOIN products P ON P.id=C.product_id WHERE user_id=:user_id");
	$stmt->execute(['user_id'=>$id]); 

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// Total a pagar del carro de compras
function totalPay_cart($conexion, $id){
	$stmt = $conexion->prepare("SELECT (SUM(P.price_sale*C.quantity))*1.05 total FROM cart C INNER JOIN products P ON C.product_id=P.id INNER JOIN users U ON C.user_id=U.id WHERE U.id=:user_id");
	$stmt->execute(['user_id'=>$id]); 
 
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// Actualizar carrito de compras
function updateQuantityCart($conexion, $user, $quantity, $product_Id ){
	$stmt = $conexion->prepare("UPDATE cart SET quantity=:quantity, status=true WHERE user_id= :user_id AND product_id= :product_id");
	$stmt->execute(['quantity'=>$quantity, 'user_id'=>$user, 'product_id'=>$product_Id]);
}


// Verificar existencia de email registrado
function verifyEmail($conexion, $email){
	$stmt = $conexion->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
	$stmt->execute(['email'=>$email]);

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

// Actualizacion de datos de administrador del sitio

function updateAdmin($conexion, $id, $name, $surname, $email, $photo, $pass ){
	$stmt = $conexion -> prepare("UPDATE users SET firstname= :firstname, lastname= :lastname, email= :email, photo= :photo, password= :password WHERE id =:id");
	$stmt->execute(['id'=>$id, 'firstname'=>$name, 'lastname'=>$surname, 'email' => $email, 'photo'=>$photo, 'password'=>$pass]);
		
}
// Actualizacion de datos de usuario del sitio

function updateUser($conexion, $id, $name, $surname, $email, $address, $contact, $photo, $pass ){
	$stmt = $conexion -> prepare("UPDATE users SET firstname= :firstname, lastname= :lastname, email= :email, address= :address, contact_info= :contact, photo= :photo, password= :password WHERE id =:id");
	$stmt->execute(['id'=>$id, 'firstname'=>$name, 'lastname'=>$surname, 'email' => $email, 'address' => $address,'contact' => $contact,'photo'=>$photo, 'password'=>$pass]);
		
}

// Buscar en cuenta de administradores si existe foto de usuario

function searchPhotoAdmin($conexion, $id){
	$querySELECT= $conexion -> prepare("SELECT photo FROM users WHERE id=:id");
	$querySELECT -> bindParam(':id', $id);
	$querySELECT -> execute();

	$element= $querySELECT -> fetch(PDO::FETCH_LAZY);

	return $element;
}

//Edicion de usuarios desde administrador
function updateUserData($conexion, $id, $name, $surname, $email, $address, $contact, $pass){
	$stmt = $conexion -> prepare("UPDATE users SET firstname= :firstname, lastname= :lastname, email= :email, address= :address, contact_info= :contact, password= :password WHERE id =:id");
	$stmt->execute(['id'=>$id, 'firstname'=>$name, 'lastname'=>$surname, 'email' => $email, 'address' => $address,'contact' => $contact,'password'=>$pass]);
		
}

//actualizacion de foto de usuario
function updatePhotouser($conexion, $id, $photo){
	$stmt = $conexion -> prepare("UPDATE users SET photo= :photo WHERE id= :id");
	$stmt -> execute(['id'=>$id, 'photo'=>$photo]);

}
//Delete Users

function delete_User($conexion, $id){
	$stmt = $conexion->prepare("UPDATE users SET status = :status WHERE id=:id");
	$stmt->execute(['status'=>false, 'id'=>$id]);
}

// Nuevo Usuario habilitado por el administrador
function newUseradd($conexion, $firstname, $lastname, $email, $address, $contact, $pass, $date){
	$queryAdd = $conexion->prepare("INSERT INTO users (type, firstname, lastname, email, address, contact_info, password, date, status) VALUES (:type, :firstname, :lastname, :email, :address, :contact_info, :password, :date, :status)");
	$queryAdd->execute(['type'=>2, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'address'=>$address, 'contact_info'=>$contact, 'password'=>$pass, 'date'=>$date, 'status'=>1]);

	$result= $queryAdd->fetchAll(PDO::FETCH_ASSOC);

	return $result;

}

// Slugify
function slugify($string){
	$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
		$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
		$string = preg_replace($pattern, '', $string);
	$string = preg_replace('~[^\\pL\d]+~u', '-', $string);
	$string = trim($string, '-');
	$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
	$string = strtolower($string);
	$string = preg_replace('~[^-\w]+~', '', $string);
	
	return $string;
	
	}
	
	// Visualizaciones de productos por dia
function mostViews($conexion, $date){
	$stmt = $conexion->prepare("SELECT * FROM products WHERE date_view= :date ORDER BY counter DESC LIMIT 10");
	$stmt->execute(['date'=>$date]);
	
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;


}

function totalpresaleUser($conexion, $id){
	$stmt = $conexion->prepare("SELECT COUNT(*) numrows FROM presale WHERE user_id= :user_id AND status= true");
	$stmt->execute(['user_id'=>$id]);
	
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}
function createpresale($conexion,$id){
	$stmt = $conexion->prepare("INSERT INTO presale (user_id,date,status)VALUES(:user_id, :date, true)");
	$stmt->execute(['user_id'=>$id, 'date'=>date('Y-m-d')]);
	
	
}
function detailnewpresale($conexion,$id){
	$stmt = $conexion->prepare("SELECT PS.id as id_presale,C.id as cartid, P.id as proid, P.name as name, SUM(C.quantity) as quantity, (P.price_sale * C.quantity) price_itemcart, (SUM(P.price_sale*C.quantity))*1.05 total FROM presale PS INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id WHERE PS.user_id=:user_id AND C.status= true;");
	$stmt->execute(['user_id'=>$id]);
	
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

function detailpresaleinprocess($conexion, $idPresale,$product,$total){
	$stmt = $conexion->prepare("INSERT INTO detail_presale (presale_id,products,total) VALUES(:presale_id, :products, :total)");
	$stmt->execute(['presale_id'=>$idPresale, 'products'=>$product, 'total'=>$total]);
}
// function detailpresaleinprocess($conexion, $idPresale,  $producQuantity,$totalPresale){
// 	$stmt = $conexion->prepare("INSERT INTO detail_presale (presale_id,products,total)VALUES(:presale_id, :products, :total)");
// 	$stmt->execute(['presale_id'=>$idPresale, 'products'=>$producQuantity, 'total'=>$totalPresale]);
// }

function Showpresale($conexion){
	$stmt = $conexion->prepare("SELECT * FROM presale WHERE status=true ORDER BY date DESC");
	$stmt -> execute();
	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;

}

function totaldetailPresale($conexion, $id){
	$stmt=$conexion-> prepare("SELECT PS.id as idPresale, PS.date as date, CONCAT(U.firstname,' ',U.lastname) as name, PS.status as transac, DP.products as quantity, sum(P.price_sale*C.quantity) as net_pay, SUM(P.price_sale*C.quantity)*1.05 as total FROM presale PS INNER JOIN users U ON PS.user_id=U.id INNER JOIN detail_presale DP ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id WHERE PS.user_id = :user_id and PS.status=true ORDER BY PS.date DESC");
	$stmt -> execute(['user_id'=>$id]);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
function totaldetailPresales($conexion, $id){
	$stmt=$conexion-> prepare("SELECT PS.id as idPresale, PS.date as date, CONCAT(U.firstname,' ',U.lastname) as name, PS.status as transac, DP.total as quantity, (P.price_sale*DP.total) as net_pay, (P.price_sale*DP.total)*1.05 as total FROM presale PS INNER JOIN users U ON PS.user_id=U.id INNER JOIN detail_presale DP ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id WHERE PS.user_id = :user_id and PS.status=true GROUP BY P.name ORDER BY PS.date DESC;");
	$stmt -> execute(['user_id'=>$id]);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
// antes
function ShowpresaleUser($conexion, $id){
	$stmt = $conexion->prepare("SELECT *,PS.id AS idpresale, PS.status as transac,PS.date AS presaleDate,(P.price_sale*C.quantity) AS priceCart, P.name AS nameProduct, C.quantity AS quantityProduct FROM detail_presale DP INNER JOIN presale PS ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id INNER JOIN products_category PC ON P.type=PC.id INNER JOIN users U ON PS.user_id=U.id WHERE DP.presale_id=:id AND PS.status=true");
	$stmt->execute(['id'=>$id]);


	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
function ShowpresaleUs($conexion, $id){
	$stmt = $conexion->prepare("SELECT PS.id AS idpresale, PS.status as transac,PS.date AS presaleDate,P.price_sale AS price,(P.price_sale*DP.total) AS priceCart, P.name AS nameProduct, DP.total AS quantityProduct FROM detail_presale DP INNER JOIN presale PS ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id INNER JOIN products_category PC ON P.type=PC.id INNER JOIN users U ON PS.user_id=U.id WHERE PS.id=:id AND PS.status=true GROUP BY nameProduct DESC");
	$stmt->execute(['id'=>$id]);


	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
// Despues

function ShowpresaleUsers($conexion, $id){
	$stmt = $conexion->prepare("SELECT PS.id AS idpresale, PS.status as transac,PS.date AS presaleDate,(P.price_sale*DP.total) AS subtotal, P.name AS nameproduct, DP.total AS quantity FROM detail_presale DP INNER JOIN presale PS ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id INNER JOIN products_category PC ON P.type=PC.id INNER JOIN users U ON PS.user_id=U.id WHERE DP.presale_id=:id AND PS.status=true GROUP BY nameproduct DESC");
	$stmt->execute(['id'=>$id]);


	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
// detalles de productos presale
function showdetailpresale($conexion, $id){
	$stmt = $conexion->prepare("SELECT PS.id AS idpresale, P.id as productID, P.name AS nameProduct, DP.total AS quantityProduct FROM detail_presale DP INNER JOIN presale PS ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id INNER JOIN products_category PC ON P.type=PC.id INNER JOIN users U ON PS.user_id=U.id WHERE PS.user_id= :id AND PS.status=true GROUP BY nameProduct DESC");
	$stmt->execute(['id'=>$id]);


	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
 //function historySaleuser($conexion, $id){
// 	$stmt = $conexion->prepare("SELECT *,PS.id AS idpresale, PS.status as transac,PS.date AS presaleDate,(P.price_sale*C.quantity) AS priceCart, P.name AS nameProduct, C.quantity AS quantityProduct FROM detail_presale DP INNER JOIN presale PS ON DP.presale_id=PS.id INNER JOIN cart C ON C.user_id=PS.user_id INNER JOIN products P ON C.product_id=P.id INNER JOIN products_category PC ON P.type=PC.id INNER JOIN users U ON PS.user_id=U.id WHERE DP.presale_id=:id AND PS.status=true");
// 	$stmt->execute(['id'=>$id]);


// 	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	return $result;
// }

function presaleUser($conexion,$id){
	$stmt = $conexion->prepare("SELECT *, COUNT(*) numrows FROM presale WHERE user_id=:user_id and status=true");
    $stmt->execute(['user_id'=>$id]);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

}
function deletepresaleDetail($conexion, $id){
	$stmt = $conexion->prepare("DELETE FROM detail_presale WHERE presale_id = :presale_id");
    $stmt->execute(['presale_id'=>$id]);
}

function updatepresale($conexion, $id){
	$stmt = $conexion->prepare("UPDATE presale SET status = false WHERE user_id = :user_id");
    $stmt->execute(['user_id'=>$id]);
}

// Eliminar el carrito de compras del usuario
function cartdeleteUser($conexion,$id){
	$stmt = $conexion->prepare("DELETE FROM cart WHERE user_id = :user_id and status=true");
    $stmt->execute(['user_id'=>$id]);
}

/************************************************************************ */
/************************************************************************ */
/************************************************************************ */
// 								SALE
function createSale($conexion,$idUser,$code, $neto,$tax, $total, $datePre){
	$stmt = $conexion->prepare("INSERT INTO sales (user_id,code,net_pay,tax,full_payment,date_sale,created,status)VALUES(:user_id,:code,:net_pay,:tax,:full_payment,:date_sale,:datePre, true)");
	$stmt->execute(['user_id'=>$idUser,'code'=>$code,'net_pay'=>$neto,'tax'=>$tax,'full_payment'=>$total,'date_sale'=>date('Y-m-d'), 'datePre'=>$datePre]);
	
	
}

function salealeUser($conexion,$id,$code){
	$stmt = $conexion->prepare("SELECT *, COUNT(*) numrows FROM sales WHERE user_id=:user_id and code= :code");
    $stmt->execute(['user_id'=>$id, 'code'=>$code]);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

}


function detailsale($conexion, $idsale,$idproduct,$quantity){
	$stmt = $conexion->prepare("INSERT INTO detail(sales_id,product_id,quantity,status) VALUES(:sales_id,:product_id,:quantity,true)");
	$stmt->execute(['sales_id'=>$idsale,'product_id'=>$idproduct,'quantity'=>$quantity]);
}


function dataSaleshow($conexion){
	$stmt=$conexion->prepare("SELECT *,S.id AS idsale, P.id as idProduct, D.quantity as quantysale, CONCAT(U.firstname,' ',U.lastname) AS nameUser, S.date_sale AS dateSale 
	FROM sales S INNER JOIN users U ON S.user_id=U.id
	INNER JOIN detail D ON D.sales_id=S.id
	INNER JOIN products P ON D.product_id=P.id WHERE S.status=true GROUP BY S.id ORDER BY S.date_sale DESC;
	");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function infotransactionsUser($conexion,$id){
	$stmt=$conexion->prepare("SELECT *,S.id AS idsale, P.id as idProduct, D.quantity as quantysale, CONCAT(U.firstname,' ',U.lastname) AS nameUser, S.date_sale AS dateSale, S.status as statusSale FROM sales S INNER JOIN users U ON S.user_id=U.id INNER JOIN detail D ON D.sales_id=S.id INNER JOIN products P ON D.product_id=P.id WHERE S.user_id= :id AND S.status=true ORDER BY S.date_sale DESC;
	");
	$stmt->execute(['id'=>$id]);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
function infotransactionsUsers($conexion,$id){
	$stmt=$conexion->prepare("SELECT *,S.id AS idsale, P.id as idProduct, D.quantity as quantysale, CONCAT(U.firstname,' ',U.lastname) AS nameUser, S.date_sale AS dateSale, S.status as statusSale FROM sales S INNER JOIN users U ON S.user_id=U.id INNER JOIN detail D ON D.sales_id=S.id INNER JOIN products P ON D.product_id=P.id WHERE S.user_id= :id AND S.status=true GROUP BY idsale ORDER BY S.date_sale ASC");
	$stmt->execute(['id'=>$id]);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function dataSaleshowUser($conexion, $id){
	$stmt=$conexion->prepare("SELECT *,S.id AS idsale, P.id as idProduct, D.quantity as quantysale, CONCAT(U.firstname,' ',U.lastname) AS nameUser, S.date_sale AS dateSale 
	FROM sales S INNER JOIN users U ON S.user_id=U.id
	INNER JOIN detail D ON D.sales_id=S.id
	INNER JOIN products P ON D.product_id=P.id WHERE S.user_id=:id and S.status=true GROUP BY S.id ORDER BY S.date_sale DESC;
	");
	$stmt->execute(['id'=>$id]);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

// Funcion para mostrar todos los productos de una categoria eliminados

function showProductDrop($conexion){
	$stmt = $conexion->prepare("SELECT * FROM products WHERE status=false");
	
	$stmt->execute();

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}
function showUsersDrop($conexion){
	$stmt = $conexion->prepare("SELECT * FROM users WHERE status=false");
	
	$stmt->execute();

	$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;	
}

?>