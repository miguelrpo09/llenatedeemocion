<?php 
require_once("Libraries/Core/Mysql.php");
trait TProducto{
	private $con;
	private $strCategoria;
	private $intIdcategoria;
	private $intIdProducto;
	private $strProducto;
	private $cant;
	private $option;
	private $strRuta;
	private $strRutaCategoria;

	
	public function getProductosT($personaid=0,$idproducto=0){

		$this->con = new Mysql();

	if ($personaid > 0) {
		
		$sql = "SELECT p.idproducto,
				p.codigo,
				p.nombre,
				p.descripcion,
				p.categoriaid,
				c.nombre as categoria,
				p.precio,
				p.ruta,
				p.stock,
				p.cantxdia,
				p.cantxmes,
				p.cantxannio,

				(COALESCE((SELECT
				SUM(CAST(tdp.cantidad as INT)) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE YEAR(tp.fecha) = YEAR(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaAnno,
				
				(COALESCE((SELECT
				SUM(CAST(tdp.cantidad as INT)) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE MONTH(tp.fecha) = MONTH(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaMes,
				
				(COALESCE((SELECT
				SUM(CAST(tdp.cantidad as INT)) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE DATE (tp.fecha) = DATE(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaDia

				FROM producto p 
				INNER JOIN categoria c 
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 ".(($idproducto > 0)?" AND p.idproducto=".$idproducto: "")." ORDER BY p.idproducto DESC LIMIT ".CANTPORDHOME;
	}else{

		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.cantxdia,
						p.cantxmes,
						p.cantxannio
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 ORDER BY p.idproducto DESC LIMIT ".CANTPORDHOME;
	}
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
						$arrImg = $this->con->select_all($sqlImg);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$request[$c]['images'] = $arrImg;
					}
				}
		return $request;
	}

	public function getProductosPage($desde, $porpagina, $personaid=0){
		$this->con = new Mysql();
	
	if ($personaid > 0) {

		$sql = "SELECT p.idproducto,
				p.codigo,
				p.nombre,
				p.descripcion,
				p.categoriaid,
				c.nombre as categoria,
				p.precio,
				p.ruta,
				p.stock,
				p.cantxdia,
				p.cantxmes,
				p.cantxannio,
				(COALESCE((SELECT
				SUM(tdp.cantidad) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE YEAR(tp.fecha) = YEAR(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaAnno,
				(COALESCE((SELECT
				SUM(tdp.cantidad) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE MONTH(tp.fecha) = MONTH(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaMes,
				(COALESCE((SELECT
				SUM(tdp.cantidad) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE DATE(tp.fecha) = DATE(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaDia

				FROM producto p 
				INNER JOIN categoria c 
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 ORDER BY p.idproducto DESC LIMIT $desde,$porpagina;";
	}else{

		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.cantxdia,
						p.cantxmes,
						p.cantxannio
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status = 1 ORDER BY p.idproducto DESC LIMIT $desde,$porpagina";
		}
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
						$arrImg = $this->con->select_all($sqlImg);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$request[$c]['images'] = $arrImg;
					}
				}
			
		return $request;
	}


	public function getProductosCategoriaT(int $idcategoria, string $ruta, $desde = null, $porpagina = null){
		$this->intIdcategoria = $idcategoria;
		$this->strRuta = $ruta;
		$where = "";
		if(is_numeric($desde) AND is_numeric($porpagina)){
			$where = " LIMIT ".$desde.",".$porpagina;
		}

		$this->con = new Mysql();
		$sql_cat = "SELECT idcategoria,nombre,ruta FROM categoria WHERE idcategoria = '{$this->intIdcategoria}'";
		$request = $this->con->select($sql_cat);

		if(!empty($request)){
			$this->strCategoria = $request['nombre'];
			$this->strRutaCategoria = $request['ruta'];
			$sql = "SELECT p.idproducto,
							p.codigo,
							p.nombre,
							p.descripcion,
							p.categoriaid,
							c.nombre as categoria,
							p.precio,
							p.ruta,
							p.stock,
							p.cantxdia,
							p.cantxmes,
							p.cantxannio
					FROM producto p 
					INNER JOIN categoria c
					ON p.categoriaid = c.idcategoria
					WHERE p.status != 0 AND p.categoriaid = $this->intIdcategoria AND c.ruta = '{$this->strRuta}'
					ORDER BY p.idproducto DESC ".$where;
					$request = $this->con->select_all($sql);
					if(count($request) > 0){
						for ($c=0; $c < count($request) ; $c++) { 
							$intIdProducto = $request[$c]['idproducto'];
							$sqlImg = "SELECT img
									FROM imagen
									WHERE productoid = $intIdProducto";
							$arrImg = $this->con->select_all($sqlImg);
							if(count($arrImg) > 0){
								for ($i=0; $i < count($arrImg); $i++) { 
									$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
								}
							}
							$request[$c]['images'] = $arrImg;
						}
					}
			$request = array('idcategoria' => $this->intIdcategoria,
								'ruta' => $this->strRutaCategoria,
								'categoria' => $this->strCategoria,
								'productos' => $request
							);

		}
		return $request;
	}

	public function getProductoT(int $idproducto, string $ruta, $personaid=0){
		$this->con = new Mysql();
		$this->intIdProducto = $idproducto;
		$this->strRuta = $ruta;

		if ($personaid > 0) {

			$sql = "SELECT p.idproducto,
				p.codigo,
				p.nombre,
				p.descripcion,
				p.categoriaid,
				c.nombre as categoria,
				c.ruta as ruta_categoria,
				p.precio,
				p.ruta,
				p.stock,
				p.cantxdia,
				p.cantxmes,
				p.cantxannio,
				(COALESCE((SELECT
				SUM(tdp.cantidad) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE YEAR(tp.fecha) = YEAR(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaAnno,
				(COALESCE((SELECT
				SUM(tdp.cantidad) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE MONTH(tp.fecha) = MONTH(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaMes,
				(COALESCE((SELECT
				SUM(tdp.cantidad) 
				FROM pedido tp
				INNER JOIN detalle_pedido tdp
				ON tdp.pedidoid = tp.idpedido
				WHERE DATE(tp.fecha) = DATE(NOW())
				AND tp.personaid = $personaid
				AND tdp.productoid = p.idproducto
				AND tp.status IN ('Completo', 'Aprobado', 'Pendiente')),0)) as CantTotalUtilizadaDia

				FROM producto p 
				INNER JOIN categoria c 
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 AND p.idproducto = '{$this->intIdProducto}' AND p.ruta = '{$this->strRuta}' ";
	}else{

		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						c.ruta as ruta_categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.cantxdia,
						p.cantxmes,
						p.cantxannio
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 AND p.idproducto = '{$this->intIdProducto}' AND p.ruta = '{$this->strRuta}' ";
	}
				$request = $this->con->select($sql);
				if(!empty($request)){
					$intIdProducto = $request['idproducto'];
					$sqlImg = "SELECT img
							FROM imagen
							WHERE productoid = $intIdProducto";
					$arrImg = $this->con->select_all($sqlImg);
					if(count($arrImg) > 0){
						for ($i=0; $i < count($arrImg); $i++) { 
							$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
						}
					}else{
						$arrImg[0]['url_image'] = media().'/images/uploads/product.png';
					}
					$request['images'] = $arrImg;
				}
				
		return $request;
		
	}

	public function getProductosRandom(int $idcategoria, int $cant, string $option){
		$this->intIdcategoria = $idcategoria;
		$this->cant = $cant;
		$this->option = $option;

		if($option == "r"){
			$this->option = " RAND() ";
		}else if($option == "a"){
			$this->option = " idproducto ASC ";
		}else{
			$this->option = " idproducto DESC ";
		}

		$this->con = new Mysql();
		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.cantxdia,
						p.cantxmes,
						p.cantxannio
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 AND p.categoriaid = $this->intIdcategoria
				ORDER BY $this->option LIMIT  $this->cant ";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
						$arrImg = $this->con->select_all($sqlImg);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$request[$c]['images'] = $arrImg;
					}
				}
		return $request;
	}	

	public function getpedidosxanno(int $personaid, int $productoid){
		$sql=	"SELECT
			SUM(tdp.cantidad) as CantTotalDetallePedido
		  FROM pedido tp
			INNER JOIN detalle_pedido tdp
			  ON tdp.pedidoid = tp.idpedido
		  WHERE YEAR(tp.fecha) = YEAR(NOW())
		  AND tp.personaid = $personaid
		  AND tdp.productoid = $productoid
		  AND tp.status in ('Completo','Aprobado','Pendiente');";
		  $request = $this->con->select($sql);
	
		  return $request['CantTotalDetallePedido'];
		}

	public function getProductoIDT(int $idproducto){
		$this->con = new Mysql();
		$this->intIdProducto = $idproducto;
		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.cantxdia,
						p.cantxmes,
						p.cantxannio
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 AND p.idproducto = '{$this->intIdProducto}' ";
				$request = $this->con->select($sql);
				if(!empty($request)){
					$intIdProducto = $request['idproducto'];
					$sqlImg = "SELECT img
							FROM imagen
							WHERE productoid = $intIdProducto";
					$arrImg = $this->con->select_all($sqlImg);
					if(count($arrImg) > 0){
						for ($i=0; $i < count($arrImg); $i++) { 
							$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
						}
					}else{
						$arrImg[0]['url_image'] = media().'/images/uploads/product.png';
					}
					$request['images'] = $arrImg;
				}
		return $request;
	}

	public function cantProductos($categoria = null){
		$where = "";
		if($categoria != null){
			$where = " AND categoriaid = ".$categoria;
		}
		$this->con = new Mysql();
		$sql = "SELECT COUNT(*) as total_registro FROM producto WHERE status = 1 ".$where;
		$result_register = $this->con->select($sql);
		$total_registro = $result_register;
		return $total_registro;

	}

	public function cantProdSearch($busqueda){
		$this->con = new Mysql();
		$sql = "SELECT COUNT(*) as total_registro FROM producto WHERE nombre LIKE '%$busqueda%' AND status = 1 ";
		$result_register = $this->con->select($sql);
		$total_registro = $result_register;
		return $total_registro;
	}

	public function getProdSearch($busqueda, $desde, $porpagina){
		$this->con = new Mysql();
		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.cantxdia,
						p.cantxmes,
						p.cantxannio
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status = 1 AND p.nombre LIKE '%$busqueda%' ORDER BY p.idproducto DESC LIMIT $desde,$porpagina";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
						$arrImg = $this->con->select_all($sqlImg);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$request[$c]['images'] = $arrImg;
					}
				}
		return $request;
	}
}

 ?>