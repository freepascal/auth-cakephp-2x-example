<?php

App::uses('AppController', 'Controller');

// users have to login to see the user list
// guest always uses adding user function
class UsersController extends AppController {
	var $helpers = array(
		'Form',
		'Html'
	);
	
	var $components = array(
		'Session',
		'Flash',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'username',
						'password' => 'password'
					),
					'passwordHasher' => 'Blowfish'
				)
			),
			'authorize' => 'Controller',
		)		
	);
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}
	
	function index() {
		$this->set('users', $this->User->find('all'));	
		
		if ($this->Auth->loggedIn()) {
			$this->set('logged_user', $this->Auth->user());
		}
	}
	
	function profile() {
		if ($this->Auth->loggedIn()) {
			$this->set('logged_user', $this->Auth->user());
		}
	}
	
	function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Flash->success(__('Your are logged in as %s', $this->Auth->user('username')));
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$this->Flash->error(__('Loggin failed'));
		}
	}
	
	function logout() {
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
	}
	
	function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Add successfully'));
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$this->Flash->error(__('Add failed'));
		}
	}
	
	function isAuthorized($user) {		
		return isset($user['username'])? true: false;
	}
}

?>
