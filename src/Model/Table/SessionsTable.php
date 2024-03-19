<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SessionsTable extends Table
{
    public function initialize(array $config) : void
    {
        parent::initialize($config);
        $this->setTable('vnd_log_session_data');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Inputs');
    }
}