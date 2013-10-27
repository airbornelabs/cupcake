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
class UsersController extends AppController {

	public function users() {

		// query for all users in database
		$this->set('users', $this->Users->find('all'));
		$this->render('/Admin/Users/users');
	}

	public function create() {

		$this->render('/Admin/Users/add');
	}

	public function update($id=null) {

		// query for user
		$user = $this->Users->find('all', array(
			'conditions' => array(
				'Users.id' => $id
				)
			)
		);

		// if no user is found, redirect
		if(empty($user)) {
			$this->session->setFlash('User cannot be found');
			$this->redirect('/dashboard');
		}

		if($this->request->isPost()) {

			// md5 password
			if(!empty($this->request->data['user']['password'])) {
				$this->request->data['user']['password'] = md5($this->request->data['user']['password']);
			}

			// update user
			if($this->Users->save($this->request->data['user'])){
				$this->session->setFlash('User has been updated!');
				$this->redirect('/dashboard');
			}
		}


		$this->set('user', $user);
		$this->render('/Admin/Users/edit');
	}

	public function destroy() {

	}
}
