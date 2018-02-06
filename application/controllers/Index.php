<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends Yaf_Controller_Abstract {
   public function indexAction() {//默认Action
       echo "123";
       $this->getView()->assign("content", "Hello World");
   }
   
}