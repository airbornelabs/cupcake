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
class PostsController extends AppController {

	public function posts() {

		$this->set('posts', $this->Posts->find('all'));
		$this->render('/Admin/Posts/posts');
	}

	public function create() {
	
		// catch POST variables
		if($this->request->isPost()) {
			// if successfully saved to the database, redirect with flash
			if($this->Posts->save($this->request->data['post'])) {
				$this->session->setFlash($this->request['data']['post']['title'].' has been saved!');
				$this->redirect('/dashboard/posts');
			}
		}

		$this->render('/Admin/Posts/add');
	}

	public function update($id=null) {

		// query the posts table based on id
		$post = $this->Posts->find('all', array(
			'conditions' => array(
				'Posts.id' => $id
				)
			)
		);

		// if no post was found, redirect with flash
		if(empty($post)) {
			$this->session->setFlash('Sorry no post was found');
			$this->redirect('/dashboard/posts');
		}

		$this->set('post', $post);
		$this->render('/Admin/Posts/edit');

	}
}
