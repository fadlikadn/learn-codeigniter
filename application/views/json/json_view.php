<?php   
  $this->output->set_header('Content-Type: application/json; charset=utf-8');
  $data['jsonres']	=	$json;
  echo json_encode($data);
?>