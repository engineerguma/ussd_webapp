<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MenutextsTable extends Table {

    public function initialize(array $config) : void {
        $this->setTable('palm_ussd_states_text');
        $this->setPrimaryKey('record_id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Menus', array(
            'foreignKey' => 'state_id',
        ));
    }

}
