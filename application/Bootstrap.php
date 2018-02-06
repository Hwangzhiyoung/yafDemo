<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bootstrap extends Yaf_Bootstrap_Abstract {
    public function _initConfig() {
        $config = Yaf_Application::app()->getConfig();
	Yaf_Registry::set("YafConfig", $config);	        
    }
    
    	/**
	* 自定义视图引擎
	*/

    public function _initView(Yaf_Dispatcher $dispatcher) {
		Yaf_Dispatcher::getInstance()->disableView();//关闭其自动渲染
//		$smarty = new Smarty_Adapter();
//		Yaf_Dispatcher::getInstance()->setView($smarty);
                echo "This is _initView<br>";
    }
    
    //默认的模块、默认的控制器、默认的动作
    public function _initDefaultName(Yaf_Dispatcher $dispatcher) {
	$dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
    
    //如果application.dispatcher.catchException = false 
    public function _initErroHandler(Yaf_Dispatcher $dispatcher){
		$dispatcher->setErrorHandler("myErrorHandler");
    }
    
    //注册插件
    public function _initPlugin(Yaf_Dispatcher $dispatcher){
	//参数过滤插件
	$oTest = new TestPlugin();
	$dispatcher1 = $dispatcher->registerPlugin($oTest);
//        print_r($dispatcher1);
    }
    
    //自动加载类库
    public function _initNamespaces(){
	$oLoader = Yaf_Loader::getInstance();
        $oLoader->registerLocalNameSpace(array("Base"));
//        $oLoader->registerLocalNameSpace(array("Cache", "Func", "Base", "Curl"));
		Yaf_Loader::import(Yaf_Registry::get("YafConfig")->application->library . "/Base/Controller.php");
//		Yaf_Loader::import(Yaf_Registry::get("YafConfig")->application->library . "/Base/Model.php");
//		Yaf_Loader::import(Yaf_Registry::get("YafConfig")->application->library . "/Base/Router.php");
        //Yaf_Loader::import(Yaf_Registry::get("YafConfig")->application->library . "/log4php/LoggerAppender.php");
		//$oLoader->autoload("Base_Controller");
    }
    
    function myErrorHandler($errno, $errstr, $errfile, $errline) {
	$str = "{$errno}\r\n{$errstr}\r\n{$errfile}\r\n{$errline}\r\n";
	$str = "error handler:\r\n" . $str;
	echo "<pre>global\n";
	var_dump($str);
	echo "</pre>";
	return;
	if (PRODUCT_SERVER) {
            
	} else {
		echo "<pre>";
		var_dump($str);
		echo "</pre>";
	}

	/*
	switch ($errno) {
		case YAF_ERR_NOTFOUND_CONTROLLER:
		case YAF_ERR_NOTFOUND_MODULE:
		case YAF_ERR_NOTFOUND_ACTION:

			break;

		default:
			//echo "Unknown error type: [$errno] $errstr<br />\n";
			//echo "Unknown error type: [$errfile] $errline<br />\n";
			header( "HTTP/1.1 404 Not Found" );
		    header( "Status: 404 Not Found" );
			echo "Not Found";
			break;
	}
	*/
	return true;
    }
}