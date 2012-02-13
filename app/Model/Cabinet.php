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
App::uses('AppModel', 'Model');
/**
 * Cabinet Model
 *
 * @property Cellar $Cellar
 * @property Storage $Storage
 */
class Cabinet extends AppModel {
    
    public $actsAs = array('Containable');
    
    public $displayField = 'cabinet_code';
    
    public $validate = null;

    /** 
     * http://cakephp.1045679.n5.nabble.com/in-array-definition-td1296363.html
     * With the additional caveat that a class variable can only be declared   
     * with a constant value, so         
     * is invalid PHP. I suppose this is the problem OP encountered. 
     * Of the top of my head I'd say you could try to redeclare these vars in   
     * __construct(), where it would be allowed to use function calls:
     * 
     */    
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'cabinet_code' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Cabinet code is required',true)
                ),
            'lines' => array(                
                    'between' => array(
                        'rule'    => array('range', 2, 31), //The range lower/upper are not inclusive
                        'message' => __('Between 3 to 30 lines',true)
                    )
                ),
            'columns' => array(                
                    'between' => array(
                        'rule'    => array('range', 2, 11), //The range lower/upper are not inclusive
                        'message' => __('Between 3 to 10 columns',true)
                    )
                ),
            'cellar_id' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Select the cellar',true)
                ),            
            
        );
    }
    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cellar' => array(
			'className' => 'Cellar',
			'foreignKey' => 'cellar_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Storage' => array(
			'className' => 'Storage',
			'foreignKey' => 'cabinet_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
