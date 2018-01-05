<?php

class UsersController extends Controller {
	/**
 	* Show users page
 	*/
  public function index() {
  	$this->render('users/index');
  }

  /**
 	* Get all users data
 	*/
  public function getUsers() {
  	$model = $this->loadModel('UsersModel');
    $users = $model->getAll();

    if ($users) {
    	$result = ['status' => 'success', 'data' => $users, 'msg' => 'Data found.'];
    }else{
    	$result = ['status' => 'error', 'data' => '', 'msg' => 'Data not found.'];
    }
    header('Content-Type: application/json');
		echo json_encode($result);
  }

  /**
 	* Insert users
 	*/
  public function save() {
  	$first_name = $_POST['first_name'];
  	$last_name = $_POST['last_name'];
  	$email = $_POST['email'];
  	$telephone = $_POST['telephone'];

  	$model = $this->loadModel('UsersModel');
  	$user = $model->addUser($first_name, $last_name, $email, $telephone);
    
    if ($user) {
    	$result = ['status' => 'success'];
    }else{
    	$result = ['status' => 'error'];
    }
    header('Content-Type: application/json');
		echo json_encode($result);
  }

  /**
 	* Delete users
 	*/
  public function delete($id) {
  	$model = $this->loadModel('UsersModel');
  	$user = $model->deleteUser($id);
      
    if ($user) {
    	$result = ['status' => 'success'];
    }else{
    	$result = ['status' => 'error'];
    }
    header('Content-Type: application/json');
		echo json_encode($result);
  }

  /**
 	* Check unique validation for email field
 	*/
  public function checkEmail() {
  	$email = $_POST['email'];
  	$model = $this->loadModel('UsersModel');

  	$user = $model->whereUser(['email'=> $email]);
  	
  	if (empty($user)) {
  		$result = false;
  	}else{
  		$result = true;
  	}
  	
  	echo $result;
  }
}
