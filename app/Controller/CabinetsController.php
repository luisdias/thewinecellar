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
 * Cabinets Controller
 *
 * @property Cabinet $Cabinet
 */
class CabinetsController extends AppController {
public $name = 'Cabinets';
public $paginate = array('limit'=>10, 'order'=>array('cabinet_code'=>'asc'));
public $fk = null;

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    if ( empty($this->translatedSingularName) )
            $this->translatedSingularName = __('Cabinet',true);

}
public function setRelated() {	
    $cellars = $this->Cabinet->Cellar->find('list');
    $wines =  $this->Cabinet->Storage->Wine->find('list');
    $this->set(compact('cellars','wines'));
}

public function view($id = null) {
    parent::view($id);
    $this->setRelated();
}

// TODO: ajax method to render the cabinet as a table
public function renderCabinet() {
    Configure::write('debug',0);
    // http://nuts-and-bolts-of-cakephp.com/2008/09/05/example-of-cakephps-containable-for-deep-model-bindings/
    $this->Cabinet->contain(array('Storage'=>array('Wine.picture','Wine.wine_name','Wine.vintage')));
    $this->autoRender = false;
    $this->layout = false;
    if ($this->request->is('ajax')) {
        $cellar_id = $this->request->data('cellar_id');
        $cabinet_id = $this->request->data('cabinet_id');
        $cabinet = $this->Cabinet->findById($cabinet_id);
        $this->set(array('cabinet'=>$cabinet,'cabinet_id'=>$cabinet_id));
        echo $this->render('display');
    }
    exit();
}
public function ajaxGetCellarCabinets() {
    $this->layout = null;
    $cellar_id = $this->request->data('cellar_id');
    if ($cellar_id > 0) {
        $cabinets = $this->Cabinet->find('list',array('conditions'=>array('Cabinet.cellar_id = '=>$cellar_id)));
        $this->set(compact('cabinets'));
    }        
}
}
