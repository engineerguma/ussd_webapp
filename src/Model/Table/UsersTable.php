<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    public function initialize(array $config): void {
        $this->setTable('sm_user_accounts');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator) : Validator{
        return $validator
                        ->notEmptyString('username', 'A username is required')
                        ->notEmptyString('password', 'A password is required');
    }

}
