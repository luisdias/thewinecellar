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
 * Member Model
 */
class Member extends AppModel {
    
    var $displayField = 'username';
    
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'username' => array(
                        'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'message' => __('User name is required',true)
                        ),
                         'unique' => array(
                                'rule' => 'isUnique',
                                'message' => __('User name already in use',true),
                        ),                         
                        'length' => array(
                            'rule' => array('minLength', 5),  
                            'message' => __('Minimun size : 5 characters',true)
                        )),
            'new_password' => array(
                    'notempty' => array(
                            'rule' => array('notempty'),
                            'message' => __('Password is required',true),
                            'on' => 'udpate'
                    ),
                    'length' => array(
                        'rule' => array('minLength', 5),  
                        'message' => __('Minimun size : 5 characters',true),
                        'on' => 'update'
                    ),                    
                    'passwordConfirm' => array(
                        'rule' => 'checkPasswords',
                        'message' => __('Passwords do not match',true),
                        'on' => 'update'
                    )
            )            
            
        );
    }         
    
    function checkPasswords() {
        if ($this->data['Member']['new_password'] == $this->data['Member']['password_confirm'])  {
            $this->data['Member']['password'] = $this->data['Member']['tmp_password'];
            return true; 
        }

        else
            return false; 
    }     
    
//    public function beforeSave($options = array()) {
//        parent::beforeSave($options);
//        echo $this->data['Member']['password']
//        if (isset($this->data['Member']['password'])) {
//            $this->data['Member']['password'] = AuthComponent::password($this->data['Member']['password']);
//        }
//        return true;
//    }
}
