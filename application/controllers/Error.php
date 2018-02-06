<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ErrorController extends Yaf_Controller_Abstract {

	/**
	 * 也可通过$request->getException()获取到发生的异常
	 */
	public function errorAction($exception) {
		$str = var_export($exception, true);
		$str = "error controller:\r\n" . $str;
		echo "<pre>";
		var_dump($str);
		echo "</pre>";
		 //return true;
		 if(PRODUCT_SERVER){
		 	//Func_Functions::getLogger("error")->log($str);
		 	header( "HTTP/1.1 404 Not Found" );
		 	header("Status: 404 Not Found ");
		 	echo "Not Found" . $str;
		 }else{
		 	echo "<pre>";
		 	var_dump($str);
		 	echo "</pre>";
		 }
		/*
		switch ($exception->getCode()) {
			case YAF_ERR_LOADFAILD:
			case YAF_ERR_LOADFAILD_MODULE:
			case YAF_ERR_LOADFAILD_CONTROLLER:
			case YAF_ERR_LOADFAILD_ACTION:
				//404
				header("Not Found");
				break;

			case CUSTOM_ERROR_CODE:
				//自定义的异常
				break;
			default :
				header( "HTTP/1.1 404 Not Found" );
				header( "Status: 404 Not Found" );
				echo "Not Found";
				break;
		}
		 * */
	}

}