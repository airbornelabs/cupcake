<?php
/**
 * Static content controller.
 *
 * This file will render views from views/admin/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdminController extends AppController {

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

	public function logout() {
		$this->session->destroy();
		$this->session->setFlash('You have been logged out!');
		$this->redirect('/');
	}

	public function dashboard() {
		$total['Pages'] = $this->Pages->find('count');

		$this->set('total', $total);
	}
}
