<?php

namespace App\Controller;

use App\Controller\AppController;

class DashboardController extends AppController {

    public function index() {
       // print_r($this->user);die();
        $this->Authorization->skipAuthorization();
    }
    
    public function isAuthorized($user) {
		print_r($this->user);die();
        if (isset($user['role'])) {
            return true;
        }
        // Default deny
        return false;
    }

}
