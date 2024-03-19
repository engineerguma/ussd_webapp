<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class InputsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('vnd_log_session_input_values');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Sessions');
        $this->belongsTo('Menus', [
            'foreignKey' => 'state_id',
        ]);
    }
}