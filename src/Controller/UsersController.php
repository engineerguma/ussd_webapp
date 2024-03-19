<?php

// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class UsersController extends AppController {

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
    $this->Authentication->addUnauthenticatedActions(['add', 'logout','login']);
    }

    public function index() {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id) {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add() {
  
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function login() {

        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $this->viewBuilder()->setLayout('auth');

        if ($this->request->is('post')) {
         
            $user = $this->Authentication->getResult();
			//print_r($user);die();
           if ($user && $user->isValid()) {
  
            $target = $this->Authentication->getLoginRedirect() ?? '/home';

                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Dashboard',
                    'action' => 'index',
                ]);

                return $this->redirect($redirect);     
            }
             // display error if user submitted and authentication failed
            if ($this->request->is('post') && !$user->isValid()) {
                $this->Flash->error(__('nvalid username or password, try again'));
            }           
        }
    }

    public function logout() {

        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }else{
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);       
        }
    }

 

}
