<?php

namespace App\Controller;

use App\Controller\AppController;

class MenutextsController extends AppController {

    public function index() {
        $this->Authorization->skipAuthorization();
     
        $this->paginate = array(
            'limit' => 10
        );
        $options = array(
            "contain" => array('Menus'),
            "conditions"=>array(
                'Menus.fxn_call_flag'=>0
                )
        );
        $menutexts = $this->Menutexts->find('all', $options);
        //$this->set(compact('menutexts', $this->paginate($menutexts)));

        $this->set('menutexts', $menutexts);
    }

    public function edit($id = false) {
        $this->Authorization->skipAuthorization();

        $menutext = $this->Menutexts->get($id, array(
            'contain' => array('Menus')
        ));
        if ($this->request->is(['post', 'put'])) {
            $this->Menutexts->patchEntity($menutext, $this->request->getData());
            if ($this->Menutexts->save($menutext)) {
                $this->Flash->success(__('Your Menu Text has been updated.'), array('key' => 'response'));
                return $this->redirect(array(
                            'controller' => 'menus',
                            'action' => 'managemenu',
                            $menutext['state_id'])
                );
            }
            $this->Flash->error(__('Unable to update your Menu Text Info.'));
        }
        $this->set('menutext', $menutext);
    }

    public function CreateText($id = false) {

        $this->Authorization->skipAuthorization();

        $menu = $this->Menutexts->Menus->get($id);
        $this->set('menu', $menu);
        $menutext = $this->Menutexts->newEmptyEntity();
        if ($this->request->is('post')) {
            $this->request->getData()['state_id'] = $id;
            $menutext = $this->Menutexts->patchEntity($menutext, $this->request->getData());
            if ($this->Menutexts->save($menutext)) {
                $this->Flash->success(__('Menu Option created successfully.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to create New Menu Option.'));
        }
        $this->set('menutext', $menutext); /**/
    }

    public function isAuthorized($user) {
        $base = 'menutexts/';
        if ($this->request->action == 'index') {
            $method = $base;
        } else {
            $method = $base . $this->request->action . '/';
        }
        if (isset($user['role']) && in_array($method, $this->_aclist)) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
