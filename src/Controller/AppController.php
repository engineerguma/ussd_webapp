<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authorization.Authorization');
        $this->loadComponent('Authentication.Authentication', [
            'authorize' => ['Controller'], // Added this line
            'loginRedirect' => [
                'controller' => 'Dashboard',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
       $this->navigation = $this->fetchTable('Navigation');
       $this->userlevels = $this->fetchTable('UserLevels');
        $result = $this->Authentication->getIdentity();
     
       if ($result) {
       
        $u_role = $result->role;
	   // print_r($u_role);die();
       if ($u_role) {
            $this->set('user', $result);
            $this->user = $result;
            $display_menus = $this->BuildMenus($u_role);
            $this->_aclist = $this->AccessRights($u_role);
            $this->set(compact('display_menus'));
            
       }
     }

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeRender(EventInterface $event) {
        if (!$this->viewBuilder()->getVar('_serialize') && ($this->request->is('json') || $this->request->is('xml'))
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(EventInterface $event) {
        //$this->Auth->allow(['display']);
        $this->Authentication->allowUnauthenticated(['display']);

    }

    public function BuildMenus($u_role) {
      
        $allowed_rights =$this->userlevels
        ->find()
        ->where(['access_denotor' => $u_role]);
       // print_r($query);die();
        foreach ($allowed_rights as $value) {
            $menu_set = explode(',', $value['allowed_access']);
            $topmenus = $this->TopMenus($menu_set);
        }
        return $topmenus;
    }

    function TopMenus($menu_set) {
        foreach ($menu_set as $key => $value) {

            $topmenus =$this->navigation->find()
                        ->where(['parent_option' => 0,'id' => $value]);
            foreach ($topmenus as $key => $tmenu) {
                $submenus = $this->SubMenus($tmenu['id']);
                $menulist[$tmenu['id']]['Title'] = $tmenu['menu_title'];
                $menulist[$tmenu['id']]['CSS'] = $tmenu['css'];
                $menulist[$tmenu['id']]['Submenus'] = $submenus;
            }
        }
        return $menulist;
    }

    function SubMenus($id) {
        $submenulist = $this->navigation->find()
                        ->where(['parent_option' => $id,'on_menu' =>'Yes']);
        foreach ($submenulist as $key => $value) {
            $submenus[$key]['Submenus'] = $value;
        }
        return $submenus;
    }

    function AccessRights($u_role) {
        $allowed_rights = $this->userlevels->find()
        ->where(['access_denotor' => $u_role]);       
        foreach ($allowed_rights as $value) {
            $menu_set = explode(',', $value['allowed_access']);
            $aclist = $this->ACList($menu_set);
        }
        return $aclist;
    }

    function ACList($ml) {
        foreach ($ml as $key => $value) {

            $aclist = $this->navigation->find()
                      ->where(['id' => $value,]);
 
            foreach ($aclist as $key => $tmenu) {
                $accesslist[$tmenu['id']] = $tmenu['load_page'];
            }
        }
        return $accesslist;
    }   
}
