<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhpbbUsers Controller
 *
 * @property \App\Model\Table\PhpbbUsersTable $PhpbbUsers
 */
class PhpbbUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [];
        
        $phpbbUsers = $this->paginate($this->PhpbbUsers);

        $this->set(compact('phpbbUsers'));
        $this->set('_serialize', ['phpbbUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Phpbb User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phpbbUser = $this->PhpbbUsers->get($id);

        $this->set('phpbbUser', $phpbbUser);
        $this->set('_serialize', ['phpbbUser']);
    }
    
    /**
     * Login method
     * 
     * This action is responsible for showing the login form and validating users.
     * For information about the AuthComponent configuration, see the AppController superclass.
     * @return \Cake\Network\Response|NULL
     */
    public function login()
    {
    	if($this->request->is('post')){ //try to authenticate the user
    		$user = $this->Auth->identify();
    		if($user){ //TODO: check if user is banned or should be denied access
    			//Set user as authenticated
    			$this->Auth->setUser($user);
    			//This piece of logic redirects the user to different pages depending on his privileges
    			$prevUrl = $this->Auth->redirectUrl();
    			if($prevUrl === "/"){ //if the user logged in in the public homepage, let's send him to a specific page
    				/* TO BE IMPLEMENTED, TODO
    				switch($this->Auth->user('role')){
    					case 'admin':
    						$this->redirect([
    						'controller' => 'AdminBackend',
    						'action'=>'index'
    								]);
    						break;
    					case 'operatore':
    						$this->redirect([
    						'controller' => 'OperatorBackend',
    						'action'=>'index'
    								]);
    						break;
    				}
    				*/
    			} //else redirect to the page the user was trying to access
    			return $this->redirect($prevUrl);
    		}
    		$this->Flash->error(__('Wrong username or password! Try again.'));
    	}
    }
    
	/**
	 * Logout method
	 * 
	 * This action is responsible for terminating a user's session.
	 * See AppController superclass for configuration of Auth's logoutRedirect.
	 * @return \Cake\Network\Response|NULL
	 */
    public function logout()
    {
    	return $this->redirect($this->Auth->logout());
    }
}
