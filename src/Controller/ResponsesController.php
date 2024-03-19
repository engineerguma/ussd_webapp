<?php

namespace App\Controller;

use App\Controller\AppController;

class ResponsesController extends AppController {

    public function index() {

        $this->Authorization->skipAuthorization();       

        $this->paginate = array(
            'limit' => 25,
            'order' => array(
                'menu_id' => 'ASC'
        ));
        $responses = $this->Responses->find('all');
        $this->set('responses', $responses);
    }
    
    public function add(){
        $this->Authorization->skipAuthorization();       

        $response = $this->Responses->newEmptyEntity();
        if ($this->request->is('post')) {
            $menu = $this->Responses->patchEntity($response, $this->request->getData());
            if ($this->Responses->save($response)) {
                $this->Flash->success(__('Menu Option created successfully.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to create New Menu Option.'));
        }
        $this->set('response', $response);
    }
    
    public function edit($id=false) {

        $this->Authorization->skipAuthorization();       

        $response = $this->Responses->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Responses->patchEntity($response, $this->request->getData());
            if ($this->Responses->save($response)) {
                $this->Flash->success(__('Your Menu Option has been updated.'), array('key' => 'response'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Menu Option Info.'));
        }
        $this->set('response', $response);
    }

    public function isAuthorized($user) {
        $base = 'responses/';
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
