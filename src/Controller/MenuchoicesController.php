<?php

namespace App\Controller;

use App\Controller\AppController;

class MenuchoicesController extends AppController {
    
    public function index() {
        $this->Authorization->skipAuthorization();       
        $this->paginate = array(
            'limit' => 25
        );
        $options = array(
            "contain" => array('InState', 'ToState'),
        );
        $menuchoices = $this->Menuchoices->find('all', $options);
        $this->set('menuchoices', $menuchoices);
    }

    public function linkmenu($id = false) {
        $this->Authorization->skipAuthorization();       
        $menus = $this->Menuchoices->Menus->find('all');
        $this->set('menus', $menus);
        $mchoice = $this->Menuchoices->newEmptyEntity();
        if ($this->request->is('post')) {
            $this->request->getData()['ussd_state'] = $id;
            $mchoice = $this->Menuchoices->patchEntity($mchoice, $this->request->getData());
            if ($this->Menuchoices->save($mchoice)) {
                $this->Flash->success(__('Loan Product Linked successfully.'));
                return $this->redirect(array(
                            'controller' => 'menus',
                            'action' => 'managemenu',
                            $id)
                );
            }
            $this->Flash->error(__('Unable to Link New Loan Product.'));
        }
        $this->set('mchoice', $mchoice);
    }
    
    public function editmenulink($id=false){

        $this->Authorization->skipAuthorization();
        $menus = $this->Menuchoices->Menus->find('all');
        $this->set('menus', $menus);
        $menuchoice = $this->Menuchoices->get($id, array(
            'contain' => array('Menus')
        ));
        if ($this->request->is(['post', 'put'])) {
            $this->Menuchoices->patchEntity($menuchoice, $this->request->getData());
            if ($this->Menuchoices->save($menuchoice)) {
                $this->Flash->success(__('Your Menu Text has been updated.'), array('key' => 'response'));
                return $this->redirect(array(
                            'controller' => 'menus',
                            'action' => 'managemenu',
                            $menuchoice['ussd_state'])
                );
            }
            $this->Flash->error(__('Unable to update your Menu Text Info.'));
        }
        $this->set('menuchoice', $menuchoice);
    }
    
    public function isAuthorized($user) {
        $base = 'menuchoices/';
        if ($this->request->action == 'index') {
            $method = $base;
        } else {
            $method = $base . $this->request->action . '/';
            ;
        }
        if (isset($user['role']) && in_array($method, $this->_aclist)) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}
