<?php
/**
    This file is part of TWC - The Wine Cellar Application.

    TWC - The Wine Cellar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    TWC - The Wine Cellar is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with TWC - The Wine Cellar.  If not, see <http://www.gnu.org/licenses/>.
 */
App::uses('AppController', 'Controller');
/**
 * Member Controller
 *
 */
class MembersController extends AppController {
public $name = 'Members';
public $paginate = array('limit'=>10, 'order'=>array('username'=>'asc'));
public $fk = null;

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    if ( empty($this->translatedSingularName) )
            $this->translatedSingularName = __('Member',true);

}

public function beforeFilter() {
    parent::beforeFilter();
    //$this->Auth->allow('index','view','passwordChange');
}

public function login() {
    $this->layout = 'login';   
    if ( $this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Your username/password combination was incorrect.'));
        }
    }
}

public function logout() {    
    $this->redirect($this->Auth->logout());    
}	 

public function passwordChange($id = null) {
    if (empty($this->request->data)) {
           $this->request->data = $this->Member->read(null, $id);
    } else {       
       if ( isset($this->request->data['Member']['tmp_password']) )
               $this->request->data['Member']['tmp_password'] = $this->Auth->password($this->request->data['Member']['new_password']);
       if ($this->Member->save($this->request->data)) {
               $this->Session->setFlash(__('Password updated successfully', true),'default',array('class'=>'success-msg')); 
               $this->redirect(array('action'=>'index'));
       } else {
               $this->Session->setFlash(__('Passwords do not match. Please try again', true),'default',array('class'=>'error-msg'));
       }            
    }        
}
}