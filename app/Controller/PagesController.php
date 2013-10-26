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
class PagesController extends AppController {

	public function pages() {
		$pages = $this->Pages->find('all');

		$this->set('pages', $pages);
		$this->render('/Admin/Pages/pages');
	}

	public function add() {

		if($this->request->isPost()) {
			if($this->Pages->save($this->request->data['page'])) {
				$this->session->setFlash($this->request['data']['page']['title'].' has been saved!');
				$this->redirect('/dashboard/pages');
			}
		}

		$this->render('/Admin/Pages/add');
	}

	public function edit($id) {
		$page = $this->Pages->find('all', array(
			'conditions' => array(
				'Pages.id' => $id
				)
			)
		);

		if(empty($page)) {
			$this->session->setFlash('Page could not be found');
			$this->redirect('/dashboard/pages');
		}

		$this->set('page', $page);
		$this->render('/Admin/Pages/edit');
	}
}
