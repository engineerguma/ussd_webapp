<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

class SessionsController extends AppController {

    public function Index() {
        $this->paginate = array(
            'limit' => 25,
            'order'=> array('record_id'=>'DESC')
        );
        $options = array(
            "contain" => array('InState', 'ToState'),
        );
        $sessions = $this->Sessions->find('all');
        $this->set(compact('sessions', $this->paginate($sessions)));
    }

    public function View($id = false) {
        $session = $this->Sessions->get($id);
        $this->set(compact('session'));
        $sinputs = $this->Sessions->Inputs->find('all', array(
            'conditions' => array(
                'Inputs.session_id' => $session['session_id']
            ),
            'contain' => array('Menus')
        ));
        $this->set('sinputs', $sinputs);
    }

    public function LogFile($id = false) {
        $session = $this->Sessions->get($id);
        $this->set(compact('session'));
        $file = new File($session['session_execution_log_file']);
        $file_contents = $file->read(true, 'r');
        $this->set('filestring', $file_contents);
    }

    public function Search() {
        if ($this->request->is(['post', 'put'])) {
            return $this->redirect(array(
                        'controller' => 'sessions',
                        'action' => 'history',
                        $this->request->data['telephone_number'])
            );
        }
    }

    public function History($id = false) {
        $this->paginate = array(
            'limit' => 25
        );
        $options = array(
            "conditions" => array('Sessions.telephone_number' => $id)
        );
        $sessions = $this->Sessions->find('all', $options);
        $this->set(compact('sessions', $this->paginate($sessions)));
    }

    public function isAuthorized($user) {
        $base = 'sessions/';
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
