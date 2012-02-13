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
 * Regions Controller
 *
 * @property Region $Region
 */
class RegionsController extends AppController {
public $name = 'Regions';
public $paginate = array('limit'=>10, 'order'=>array('region_name'=>'asc'));
public $fk = null;

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    if ( empty($this->translatedSingularName) )
            $this->translatedSingularName = __('Region',true);

}
function setRelated() {	
    $countries = $this->Region->Country->find('list');
    $this->loadModel('Producer');
    $this->loadModel('Winetype');
    $this->loadModel('Grapetype');
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

public function ajaxGetCountryRegions() {
    $this->layout = null;
    $country_id = $this->request->data('country_id');
    if ($country_id > 0) {
        $regions = $this->Region->find('list',array('conditions'=>array('Region.country_id = '=>$country_id)));
        $this->set(compact('regions'));
    }        
}
}
