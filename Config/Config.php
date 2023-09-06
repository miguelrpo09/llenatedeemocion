<?php 

	const BASE_URL = "http://localhost/llenatedeemocion";

	//const BASE_URL = "https://llenatedeemocion.disandina.com";



	//Zona horaria

	date_default_timezone_set('America/Bogota');



	//Datos de conexión a Base de Datos

	const DB_HOST = "localhost";

	const DB_NAME = "disanweb_llenatedeemocion";

	const DB_USER = "root";

	//const DB_USER = "disanweb_miguel";

	const DB_PASSWORD = "";
	
	//const DB_PASSWORD = "Colombia40.";

	const DB_CHARSET = "utf8";


	//Para envío de correo

	const ENVIRONMENT = 0; // Local: 0, Produccón: 1;



	//Deliminadores decimal y millar Ej. 24,1989.00

	const SPD = ".";

	const SPM = ",";



	//Simbolo de moneda

	const SMONEY = "";

	const CURRENCY = "COP";



	//Api PayPal

	//SANDBOX PAYPAL

	const URLPAYPAL = "https://api-m.sandbox.paypal.com";

	const IDCLIENTE = "";

	const SECRET = "";

	//LIVE PAYPAL

	//const URLPAYPAL = "https://api-m.paypal.com";

	//const IDCLIENTE = "";

	//const SECRET = "";



	//Datos envio de correo

	const NOMBRE_REMITENTE = "Llénate de Emoción";

	const EMAIL_REMITENTE = "no-reply@disandina.com";

	const NOMBRE_EMPESA = "Disandina Llénate de Emoción";

	const WEB_EMPRESA = "www.disandina.com";



	const DESCRIPCION = "Con el fin de fomentar tu bienestar y calidad de vida Disandina otorga varios beneficios al año para que 

	atiendas tus compromisos personales, compartas fechas especiales.";

	const SHAREDHASH = "Llenatedeemocion";



	//Datos Empresa

	const DIRECCION = "Calle 80sur # 47D - 65 Bodega 108 Sabaneta, Antioquia";

	const TELEMPRESA = "+(057)6044442404 Ext 235";

	const WHATSAPP = "Valeria: 3136980444 - Yudy: 3215529358";

	const EMAIL_EMPRESA = "vroldan@disandina.com ysanchez@disandina.com";

	const EMAIL_PEDIDOS = "mrestrepo@disandina.com,ysanchez@disandina.com"; 

	const EMAIL_SUSCRIPCION = "mrestrepo@disandina.com";

	const EMAIL_CONTACTO = "mrestrepo@disandina.com,ysanchez@disandina.com,vroldan@disandina.com";



	const CAT_SLIDER = "1,2,3,4";

	const CAT_BANNER = "1";

	const CAT_FOOTER = "1,2,3,4,5";



	//Datos para Encriptar / Desencriptar

	const KEY = 'abelosh';

	const METHODENCRIPT = "AES-128-ECB";



	//Envío

	const COSTOENVIO = 0;



	//Módulos

	const MDASHBOARD = 1;

	const MUSUARIOS = 2;

	const MCLIENTES = 3;

	const MPRODUCTOS = 4;

	const MPEDIDOS = 5;

	const MCATEGORIAS = 6;

	const MSUSCRIPTORES = 7;

	const MDCONTACTOS = 8;

	const MDPAGINAS = 9;



	//Páginas

	const PINICIO = 1;

	const PTIENDA = 2;

	const PCARRITO = 3;

	const PCONVENIOS = 4;

	const PCONTACTO = 5;

	const PPREGUNTAS = 6;

	const PTERMINOS = 7;

	const PSUCURSALES = 8;

	const PERROR = 9;



	//Roles

	const RADMINISTRADOR = 1;

	const RSUPERVISOR = 2;

	const RCLIENTES = 3;



	const STATUS = array('Completo','Aprobado','Cancelado','Pendiente');

	//const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');



	//Productos por página

	const CANTPORDHOME = 8;

	const PROPORPAGINA = 4;

	const PROCATEGORIA = 4;

	const PROBUSCAR = 4;



	//REDES SOCIALES

	const FACEBOOK = "https://www.facebook.com/DisandinaSA/";

	const INSTAGRAM = "https://www.instagram.com/disandina/";

	



 ?>