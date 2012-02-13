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
 * Winetypes Controller
 *
 * @property Winetype $Winetype
 */
class WinetypesController extends AppController {
public $name = 'Winetypes';
public $paginate = array('limit'=>10, 'order'=>array('winetype_name'=>'asc'));
public $fk = null;

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    if ( empty($this->translatedSingularName) )
            $this->translatedSingularName = __('Wine type',true);

}

public function setRelated() {
    parent::setRelated();
    $this->loadModel('Country');
    $this->loadModel('Producer');
    $this->loadModel('Region');
    $this->loadModel('Winetype');
    $this->loadModel('Grapetype');
    $countries = $this->Country->find('list');
    $producers = $this->Producer->find('list');
    $regions = $this->Region->find('list');
    $winetypes = $this->Winetype->find('list');
    $grapetypes = $this->Grapetype->find('list');
    $this->set(compact('countries','producers','regions','winetypes','grapetypes'));    
}

public function view($id = null) {
    parent::view($id);
    $this->setRelated();
}

}
