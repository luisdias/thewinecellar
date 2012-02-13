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
 * Wine Model
 *
 * @property Country $Country
 * @property Producer $Producer
 * @property Region $Region
 * @property Winetype $Winetype
 * @property Grapetype $Grapetype
 * @property Storage $Storage
 */
class Wine extends AppModel {
    public $actsAs = array('Searchable');
    public $displayField = 'wine_name';
    public $filterArgs = array(
        array('name' => 'country_id', 'type' => 'value'),
        array('name' => 'producer_id', 'type' => 'value'),
        array('name' => 'region_id', 'type' => 'value'),
        array('name' => 'winetype_id', 'type' => 'value'),
        array('name' => 'grapetype_id', 'type' => 'value'),
        
    );
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'wine_name' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Wine name is required',true)
                ),
            'country_id' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Select the country',true)
                ),
            'producer_id' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Select the producer',true)
                ),
            'region_id' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Select the region',true)
                ),
            'winetype_id' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Select the wine type',true)
                ),            
            'grapetype_id' => array(                
                            'rule' => 'notEmpty',
                            'message' => __('Select the grape type',true)
                )                        
        );
    }        
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Producer' => array(
			'className' => 'Producer',
			'foreignKey' => 'producer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Winetype' => array(
			'className' => 'Winetype',
			'foreignKey' => 'winetype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grapetype' => array(
			'className' => 'Grapetype',
			'foreignKey' => 'grapetype_id',
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
			'foreignKey' => 'wine_id',
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
