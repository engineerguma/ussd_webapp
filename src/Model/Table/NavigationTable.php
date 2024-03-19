<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class NavigationTable extends Table {

    public function initialize(array $config) : void{
        $this->setTable('sm_access_rights');
        $this->addBehavior('Timestamp');
    }

}
