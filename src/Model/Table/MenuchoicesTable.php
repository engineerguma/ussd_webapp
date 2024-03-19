<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MenuchoicesTable extends Table {

    public function initialize(array $config) : void {
        $this->setTable('palm_ussd_choices');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Menus', array(
            'foreignKey' => 'ussd_state',
        ));

        $this->belongsTo('InState', [
            'className' => 'Menus',
            'foreignKey' => 'ussd_state',
            'propertyName' => 'InState',
        ]);
        $this->belongsTo('ToState', [
            'className' => 'Menus',
            'foreignKey' => 'ussd_new_state',
            'propertyName' => 'ToState'
        ]);
    }

}
