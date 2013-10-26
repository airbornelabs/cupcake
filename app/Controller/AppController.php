<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array('session');
	public $helpers = array('Form');
	public $uses = array('Users', 'Pages');

	public function beforeFilter() {
		// if no user session is set && url is set to an admin page
		if(!$this->session->check('User.loggedin') && strstr($this->here, '/dashboard')) {
			$this->session->setFlash('Login required to access dashboard');
			$this->redirect('/login');
		}
	}

	public function login() {
		// if already loggedin redirect to dashboard
		if($this->session->check('User.loggedin')) {
			$this->redirect('/dashboard');
		}

		// catch POST variables
		if($this->request->isPost()) {
			$user = $this->Users->find('all', array(
				'conditions' => array(
					'Users.username' => $this->request['data']['login']['username'],
					'Users.password' => md5($this->request['data']['login']['password'])
					)
				)
			);
		}

		// if user is found
		if(!empty($user)) {
			// write session variables && redirect to dashboard with flash
			$this->session->write('User.name', $this->request['data']['login']['username']);
			$this->session->write('User.loggedin', TRUE);
			$this->session->setFlash('Logged in!');
			$this->redirect('/dashboard');
		}
	}
}
