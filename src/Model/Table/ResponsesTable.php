<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ResponsesTable extends Table {

    public function initialize(array $config) : void {
        $this->setTable('palm_ussd_response_codes');
        $this->addBehavior('Timestamp');
    }

}
