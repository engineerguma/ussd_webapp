<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
class MenusController extends AppController {

    public function index() {
       // $this->Authorization->skipAuthorization();
        $menus = $this->Menus->find('all');
        //$menus = $this->paginate($this->Menus);
        $this->set('menus', $menus);
    }

    public function createmenu() {
        $this->Authorization->skipAuthorization();
        $menu = $this->Menus->newEmptyEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('Menu Option created successfully.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to create New Menu Option.'));
        }
        $this->set('menu', $menu);
    }

    public function Editmenu($id = null) {
        $this->Authorization->skipAuthorization();
        $menu = $this->Menus->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('Your Menu Option has been updated.'), array('key' => 'response'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Menu Option Info.'));
        }
        $this->set('menu', $menu);
    }

    public function managemenu($id = null) {
        $this->Authorization->skipAuthorization();
        $menu = $this->Menus->get($id);
        $mtexts = $this->Menus->Menutexts->find('all', array(
            'conditions' => array(
                'Menutexts.state_id' => $id
            )
        ));
        $mchoices = $this->Menus->Menuchoices->find('all', array(
            'conditions' => array(
                'Menuchoices.ussd_state' => $id
            ),
            'contain' => array('ToState')
        ));
        $this->set('mtexts', $mtexts);
        $this->set('mchoices', $mchoices);
        $this->set(compact('menu'));
    }
    

    public function beforeFilter(EventInterface $event) {
        $base = 'menus/';
        $parameters = $this->request->getAttribute('params');
        //print_r($this->user);die();
        if($parameters['action'] == 'index'){
            $method = $base;
        }else{
            $method = $base . $this->request->action.'/';
        }
        if (isset($this->user) && in_array($method, $this->_aclist)) {
            return $this->Authorization->authorize($this);
         // return true;

        }

    }

}
