<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MenusTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('palm_ussd_states');
        $this->setPrimaryKey('state_id');       
        $this->addBehavior('Timestamp');
        $this->hasOne('Menutexts');
        $this->belongsTo('Menuchoices');
        
    }
}