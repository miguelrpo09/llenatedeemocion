<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	class Home extends Controllers{
		use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home()
		{
			$personaid_p=!isset($_SESSION['idUser'])? 0 :$_SESSION['idUser'];
			$pageContent = getPageRout('inicio');
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;
			$data['page_name'] = "Llénate de emoción ";
			$data['page'] = $pageContent;
			$data['slider'] = $this->getCategoriasT(CAT_SLIDER);
			$data['banner'] = $this->getCategoriasT(CAT_BANNER);
			$data['productos'] = $this->getProductosT($personaid_p);
			$this->views->getView($this,"home",$data); 
		}

	}
 ?>
