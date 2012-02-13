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
 * Storages Controller
 *
 * @property Storage $Storage
 */
class StoragesController extends AppController {
public $name = 'Storages';
public $fk = null;

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    Configure::write('debug',0);
    if ( empty($this->translatedSingularName) )
            $this->translatedSingularName = __('Storage',true);

}
public function index() {
    parent::index();
    $this->setRelated();    
}
public function setRelated() {	
    $this->loadModel('Cellar');
    $this->loadModel('Country');
    $this->loadModel('Producer');
    $this->loadModel('Region');
    $this->loadModel('Winetype');
    $this->loadModel('Grapetype');    
    $cellars = $this->Cellar->find('list');
    $countries = $this->Country->find('list');
    $winetypes = $this->Winetype->find('list');
    $grapetypes = $this->Grapetype->find('list');
    $this->set(compact('cellars','countries','winetypes','grapetypes'));
}

// TODO: ajax method to add a wine to a cabinet from drag and drop operation
// return the storage_id ?
public function addWineToCabinet() {
    Configure::write('debug',0);
    $this->autoRender = false;
    $this->layout = false;
    $this->Storage->create();
    if ($this->Storage->save($this->request->data))    
        echo $this->Storage->getLastInsertID();
    else
        echo header("HTTP/1.0 404 Not Found"); 
}

public function delWineFromCabinet() {
    Configure::write('debug',0);
    $this->autoRender = false;
    $this->layout = false;
    $id = $this->request->data('storage_id');
    $this->Storage->id = $id;
    if ($this->Storage->delete($id)) {
        echo true;
    } else {
        echo header("HTTP/1.0 404 Not Found");
    }
}

}
