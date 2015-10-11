<?php
class indexController extends Controller{

	public function index(){
		$this->view();
	}
	
	public function login(){
		$this->view('login', array(
			'title' => 'Test Login Form',
			'username' => 'user',
			'password' => 'user'
		));
	}

	public function response_data(){	
		$month = array(
		    'January','February','March','April','May','June',
		    'July ','August','September','October','November','December',
		);
		$this->view('response_data',array(
			'month' => $month
		));
	}

}