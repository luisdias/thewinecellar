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
App::uses('Controller', 'Controller');

class AppController extends Controller {
public $name = null;
public $fk = null;
public $singularName = null;
public $translatedSingularName = null; // portuguese singular name for view

public $components = array('Session','Auth','Prg');    

public $helpers = array('Html','Form','Session','Js','ExPaginator');

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    $this->singularName = ucfirst(Inflector::singularize($this->name));
}

public function beforeFilter() {    
    $this->Auth->authenticate = array('Form'=>array('userModel'=>'Member'));    
    $this->Auth->userModel = 'Member';
    $this->Auth->loginAction=array('controller'=>'members','action'=>'login');
    $this->Auth->loginRedirect=array('controller'=>'cellars','action'=>'index');
    $this->Auth->logoutRedirect=array('controller'=>'members','action'=>'login');
    $this->Auth->loginError=__('Invalid login or password',true);     
    $this->Auth->authError=__('Without access permission',true); 
    $this->Auth->authorize = array('Controller');
}

public function index() {
    if (isset($this->passedArgs['fkfield']) && isset($this->passedArgs['fkid'])) {
        $childPage = true;
        $fkField = $this->passedArgs['fkfield'];
        $fkId = $this->passedArgs['fkid'];            
        $this->paginate = array('conditions'=> array($this->modelClass.'.'.$fkField . ' LIKE '=>$fkId));
    } else {
        $childPage = false;
    }
    $this->set('childPage',$childPage);
    $this->{$this->modelClass}->recursive = 0;
    $this->set(strtolower($this->name), $this->paginate());
}

public function view($id = null) {
        $this->{$this->modelClass}->id = $id;
        if (!$this->{$this->modelClass}->exists()) {
                throw new NotFoundException(__('Invalid '.$this->name));
        }
        $this->set(strtolower($this->singularName), $this->{$this->modelClass}->read(null, $id));
}

public function add() {
    $this->form();
    $this->render('form');
}
public function edit($id = null) {
    if (!$id && empty($this->data)) {
        $this->_flash(__('Invalid ', true).$this->name,'error',array('class'=>'error-msg'));                        
        $this->redirect(array('action'=>'index'));
    }
    $this->form($id);
    $this->render('form');
}
public function form($id = null) {
    $this->beforeForm();

    // view variables
    if ( $this->action == 'add' )
        $this->set('theAction',__('New',true));
    else
        $this->set('theAction',__('Edit',true));

    if ( isset($this->passedArgs['fkid']) && isset($this->passedArgs['fkfield']) ) {
        $childForm = true;
        if ( $this->action == 'add' )
            $theAction = $this->action;
        else
            $theAction = $this->action .'/'. $this->passedArgs[0];
        $options = array ('url'=>$theAction.'/'.
                            'fkfield:'.
                            $this->passedArgs['fkfield'].'/'.
                            'fkid:'.$this->passedArgs['fkid']);            
    } else {
        $options = array();
        $childForm = false;
    }                    
    $this->set('childForm',$childForm);
    $this->set('formOptions',$options);

    // end: view variables

    if (!empty($this->data)) {
           $this->{$this->modelClass}->create();               
           if ($this->{$this->modelClass}->save($this->data)) {
                   $this->Session->setFlash($this->translatedSingularName . __(' has been saved', true),'default',array('class'=>'success-msg')); 
                   // se existe o parametro fk como campo hidden no form entao redirecionar para index com fk
                   //if ( isset($this->data[$this->singularName]['fkfield']) && isset($this->data[$this->singularName]['fkid']))                       
                   if ( isset($this->passedArgs['fkid']) && isset($this->passedArgs['fkfield']) )                        
                        $this->redirect(array('action'=>'index',
                            'fkfield' => $this->passedArgs['fkfield'],
                            'fkid' => $this->passedArgs['fkid']
                           ));
                   $this->redirect(array('action'=>'index'));
           } else {
                   $this->Session->setFlash($this->translatedSingularName . __(' could not be saved. Please, try again.', true),'default',array('class'=>'error-msg'));
           }
    } else {
           if ( $this->params['action'] == 'add' ) {
                   // existe o parametro fk sendo passado ?
                   if (isset($this->passedArgs['fk'])) {
                           $fk_id = $this->passedArgs['fk'];
                           $this->data[$this->singularName][$this->fk] = $fk_id;
                   }
           }
    }
    if (empty($this->data)) {
           $this->data = $this->{$this->modelClass}->read(null, $id);
    }
    $this->setRelated();
}

/**
 * se existe o parametro fk na url entao redirecionar para index com fk
 * @param type $id 
 */        
public function delete($id = null) {
    if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
    }
    $this->{$this->modelClass}->id = $id;
    if (!$this->{$this->modelClass}->exists()) {
           $this->Session->setFlash(__('Invalid ', true).$this->translatedSingularName,'default',array('class'=>'error-msg'));
           if ( isset($this->passedArgs['fkid']) && isset($this->passedArgs['fkfield']) )                        
                $this->redirect(array('action'=>'index',
                    'fkfield' => $this->passedArgs['fkfield'],
                    'fkid' => $this->passedArgs['fkid']
                   ));
           $this->redirect(array('action'=>'index'));
    }
    
    try {    
        if ($this->{$this->modelClass}->delete($id)) {
               $this->Session->setFlash($this->translatedSingularName . __(' deleted', true),'default',array('class'=>'success-msg'));
               if ( isset($this->passedArgs['fkid']) && isset($this->passedArgs['fkfield']) )                        
                    $this->redirect(array('action'=>'index',
                        'fkfield' => $this->passedArgs['fkfield'],
                        'fkid' => $this->passedArgs['fkid']
                       ));
               $this->redirect(array('action'=>'index'));
        }
    } catch (Exception $e) {
        $this->Session->setFlash(__("There are related records. Record was not deleted.",true),'default',array('class'=>'error-msg'));
        if ( isset($this->passedArgs['fkid']) && isset($this->passedArgs['fkfield']) )                        
            $this->redirect(array('action'=>'index',
                'fkfield' => $this->passedArgs['fkfield'],
                'fkid' => $this->passedArgs['fkid']
               ));
        $this->redirect(array('action'=>'index'));	               
    }
    
}

/**
 * método que corre nas actions add,edit e view
 */
public function setRelated() {
}   

/**
 * método necessário quando $this->Auth->authorize = 'controller';
 * @return type 
 */
public function isAuthorized($member) {
    return true;
}   

/**
 * Corre antes do form
 */
public function beforeForm() {

}

/**
 * find method using CakeDC Searchable component
 */
public function find() {
    $this->setRelated();
    $this->Prg->commonProcess();
    $this->paginate['conditions'] = $this->{$this->modelClass}->parseCriteria($this->passedArgs);
    $this->set(strtolower($this->name), $this->paginate());
    $this->render('index');
}
  
}