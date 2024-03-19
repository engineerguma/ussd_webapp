<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SessionactivityTable extends Table
{
    public function initialize(array $config) : void
    {
        parent::initialize($config);
        $this->setTable('vnd_log_session_activity');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Sessions');
    }
}