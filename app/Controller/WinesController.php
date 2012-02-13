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
 * Wines Controller
 *
 * @property Wine $Wine
 */
class WinesController extends AppController {
public $name = 'Wines';
public $paginate = array('limit'=>10, 'order'=>array('wine_name'=>'asc'));
public $fk = null;
public $presetVars = array(
    array('field' => 'country_id', 'type' => 'value'),
    array('field' => 'producer_id', 'type' => 'value'),
    array('field' => 'region_id', 'type' => 'value'),
    array('field' => 'winetype_id', 'type' => 'value'),
    array('field' => 'grapetype_id', 'type' => 'value')
    );

public function __construct( $request = NULL, $response = NULL ) {
    parent::__construct($request,$response);
    if ( empty($this->translatedSingularName) )
            $this->translatedSingularName = __('Wine',true);

}
public function setRelated() {	
    $countries = $this->Wine->Country->find('list');
    $producers = $this->Wine->Producer->find('list');
    $regions = $this->Wine->Region->find('list');
    $winetypes = $this->Wine->Winetype->find('list');
    $grapetypes = $this->Wine->Grapetype->find('list');
    $this->set(compact('countries','producers','regions','winetypes','grapetypes'));
}

public function index() {
    $this->setRelated();
    parent::index();
}

public function view($id = null) {
    parent::view($id);
    
    $this->loadModel('Cabinet');
    $this->Cabinet->contain(array('Cellar'=>array('cellar_name','id'),'Storage'=>array('line_number','column_number','wine_id')));
    $cabinets = $this->Cabinet->find('all', array('contain' => 'Storage.wine_id ='.$id));
    $this->set(array('cabinets'=>$cabinets));
}

// TODO: ajax method to render filtered wines on the left bar
// parameters: country_id, producer_id, region_id, winetype_id and grapetype_id
public function renderWines() {
    $conditions = array();
    Configure::write('debug',0);
    $this->autoRender = false;
    $this->layout = false;
    if ($this->request->is('ajax')) {
        $country_id = $this->request->data('country_id');
        $producer_id = $this->request->data('producer_id');
        $region_id = $this->request->data('region_id');
        $winetype_id = $this->request->data('winetype_id');
        $grapetype_id = $this->request->data('grapetype_id');

        if (!empty($country_id))
            $conditions[] = array('Wine.country_id'=>$country_id);
        if (!empty($producer_id))
            $conditions[] = array('Wine.producer_id'=>$producer_id);        
        if (!empty($region_id))
            $conditions[] = array('Wine.region_id'=>$region_id);        
        if (!empty($winetype_id))
            $conditions[] = array('Wine.winetype_id'=>$winetype_id);        
        if (!empty($grapetype_id))
            $conditions[] = array('Wine.grapetype_id'=>$grapetype_id);        
        
        $wines = $this->Wine->find('all',array('conditions'=>$conditions,'order'=>'Wine.wine_name'));
        $this->set(array('wines'=>$wines));
        echo $this->render('display');
    }
    exit();    
}

public function editPicture($id = null) {

$this->Wine->id = $id;
if (!$this->Wine->exists()) {
   throw new NotFoundException(__('Invalid wine'));
}
if ($this->request->is('post') || $this->request->is('put')) {    
    if ($this->request->data['Wine']['picture']['error']==0) {
        $files = array();
        $files[] = $this->request->data['Wine']['picture'];
        $fileOK = $this->uploadFiles('img/wines', $files);  
    } else {
        $fileOk = array();
    }
    //print_r($fileOK); die();
    if(array_key_exists('urls', $fileOK)) {
        $this->Wine->saveField('picture',$fileOK['urls'][0]);
        $this->Session->setFlash(__('The wine picture has been saved'));
        $this->redirect(array('action' => 'index'));            					
    } else {  
        $this->Session->setFlash(__('The wine picture could not be saved. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }    
} else {
   $this->request->data = $this->Wine->read(null, $id);
   $this->setRelated();
}

}

/**
 * http://www.jamesfairhurst.co.uk/posts/view/uploading_files_and_images_with_cakephp
 * uploads files to the server
 * @params:
 *		$folder 	= the folder to upload the files e.g. 'img/files'
 *		$formdata 	= the array containing the form files
 *		$itemId 	= id of the item (optional) will create a new sub folder
 * @return:
 *		will return an array with the success of each file upload
 */
public function uploadFiles($folder, $formdata, $itemId = null) {    
// setup dir names absolute and relative
$folder_url = WWW_ROOT.$folder;
$rel_url = $folder;

// create the folder if it does not exist
if(!is_dir($folder_url)) {
    mkdir($folder_url);
}

// if itemId is set create an item folder
if($itemId) {
    // set new absolute folder
    $folder_url = WWW_ROOT.$folder.'/'.$itemId; 
    // set new relative folder
    $rel_url = $folder.'/'.$itemId;
    // create directory
    if(!is_dir($folder_url)) {
            mkdir($folder_url);
    }
}

// list of permitted file types, this is only images but documents can be added
$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');

// loop through and deal with the files
foreach($formdata as $file) {
    // replace spaces with underscores
    $filename = str_replace(' ', '_', $file['name']);
    // assume filetype is false
    $typeOK = false;
    // check filetype is ok
    foreach($permitted as $type) {
        if($type == $file['type']) {
                $typeOK = true;
                break;
        }
    }

    // if file type ok upload the file
    if($typeOK) {
        // switch based on error code
        switch($file['error']) {
            case 0:
                // check filename already exists
                if(!file_exists($folder_url.'/'.$filename)) {
                        // create full filename
                        $full_url = $folder_url.'/'.$filename;
                        $url = $rel_url.'/'.$filename;
                        // upload the file
                        $success = move_uploaded_file($file['tmp_name'], $url);
                } else {
                        // create unique filename and upload file
                        ini_set('date.timezone', 'Europe/London');
                        $now = date('Y-m-d-His');
                        $full_url = $folder_url.'/'.$now.$filename;
                        $url = $rel_url.'/'.$now.$filename;
                        $success = move_uploaded_file($file['tmp_name'], $url);
                }
                // if upload was successful
                if($success) {
                        // save the url of the file
                        $result['urls'][] = $url;
                } else {
                        $result['errors'][] = __("Error uploaded $filename. Please try again.",true);
                }
                break;
            case 3:
                // an error occured
                $result['errors'][] = __("Error uploading $filename. Please try again.",true);
                break;
            default:
                // an error occured
                $result['errors'][] = __("System error uploading $filename. Contact webmaster.",true);
                break;
        }
    } elseif($file['error'] == 4) {
        // no file was selected for upload
        $result['nofiles'][] = __("No file Selected",true);
    } else {
        // unacceptable file type
        $result['errors'][] = __("$filename cannot be uploaded. Acceptable file types: gif, jpg, png.",true);
    }
}
return $result;
}

}
