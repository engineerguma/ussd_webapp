<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class UserLevelsTable extends Table {

    public function initialize(array $config): void {
        $this->setTable('sm_user_levels');
        $this->addBehavior('Timestamp');
    }

}
