<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SessionstateTable extends Table
{
    public function initialize(array $config) : void
    {
        parent::initialize($config);
        $this->setTable('vnd_log_current_state');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Sessions'); 
    }
}