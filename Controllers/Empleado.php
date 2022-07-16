<?php 

class Empleado extends Controllers{
	public function __construct()
	{
		parent::__construct();
	}

	public function Empleado()
	{
		$data['page_tag'] = "Empleado";
		$data['page_title'] = "Empleado <small>test</small>";
		$data['page_name'] = "Empleado";
		$data['page_functions_js'] = "functions_empleado.js";
		$data['roles'] = $this->model->selectEmpleados();
		$this->views->getView($this,"empleado",$data);
	}

	public function setEmpleado(){
		error_reporting(0);

		// dep($_POST);
		// exit();
		if($_POST){
			
				$idUsuario = intval($_POST['idUsuario']);

				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strEmail = strtolower(strClean($_POST['txtEmail']));
				$charSexo = strClean($_POST['sexoRadios']);
				$strArea = strClean($_POST['listArea']);
				$strDescripcion = strClean($_POST['txtDescripcion']);
				$strBoletin = isset($_POST['checkBoletin']);
				$checkProfesional = strClean($_POST['checkProfesional']);
				$checkGerente = strClean($_POST['checkGerente']);
				$checkAuxiliar = strClean($_POST['checkAuxiliar']);

				$request_user = "";
				if($idUsuario == 0)	
				{
					$option = 1;
					//  dep($_POST);
					// exit();
						$request_user = $this->model->insertEmpleado($strNombre, 
																	$strEmail,
																	$charSexo,
																	$strArea, $strDescripcion,
																	$strBoletin
																	);
																	// 
																	// $checkProfesional,
																	// $checkGerente,$checkAuxiliar);
				}else{
					$option = 2;
					// dep($_POST);
					// exit();
						$request_user = $this->model->updateEmpleado($idUsuario,
																	$strNombre, 
																	$strEmail,
																	$charSexo,
																	$strArea, 
																	$strDescripcion,
																	$strBoletin);
																	// $checkProfesional,
																	// $checkGerente,$checkAuxiliar);
					
				}

				if($request_user > 0 )
				{
					if($option == 1){
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');

					}else{
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				}
				// else if($request_user == 'exist'){
				// 	$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			// }
			// dep($request_user);

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		// }
		die();
	}

	public function getEmpleados()
	{
		// dep($_POST);
		// exit();
			$arrData = $this->model->selectEmpleados();
			for ($i=0; $i < count($arrData); $i++) {
				$btnEdit = '';
				$btnDelete = '';
					
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar cliente"><i class="fas fa-pencil-alt"></i></button>';
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar cliente"><i class="far fa-trash-alt"></i></button>';

				$arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnDelete.'</div>';
			}
			// dep($arrData);
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getEmpleado($id){
		// dep($_POST);
		// exit();
			$idusuario = intval($id);
		
				$arrData = $this->model->selectEmpleado($idusuario);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	
		die();
	}

	public function delEmpleado()
	{
		if($_POST){
				$intId = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteEmpleado($intId);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el cliente');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al cliente.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// $btnRoles = '';
	// 				$arrRoles = $this->model->selectRoles();
	// 				for ($i=0; $i < count($arrData); $i++) {
	// 						// $btnRoles.innerHTML = $arrData[$i]'';
	// 						$btnRoles .= '<div class="form-check">
	// 						<label class="form-check-label">
	// 						  <input class="form-check-input" type="checkbox" value="'.$arrData[$i]['id'].'"id="checkGerente" name="checkGerente">'.$arrData[$i]['nombre'].'
	// 						</label></div>';
		
	// 				}
}

?>