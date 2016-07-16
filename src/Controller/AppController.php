<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use App\Model\Entity\PhpbbUser;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

	/**
	 * Configura i nuovi helper definiti dal plugin Bootstrap come predefiniti.
	 */
	public $helpers = [
			'Html' => [
					'className' => 'Bootstrap.BootstrapHtml'
			],
			'Form' => [
					'className' => 'Bootstrap.BootstrapForm'
			],
			'Paginator' => [
					'className' => 'Bootstrap.BootstrapPaginator'
			],
			'Modal' => [
					'className' => 'Bootstrap.BootstrapModal'
			],
			'Flash' => [
					'className' => 'Bootstrap.BootstrapFlash'
			]
	];
	
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    	
        $this->loadComponent('Auth', [
        	'authorize' => 'Controller',
        	'unauthorizedRedirect' => false, //solleva forbiddenException in caso di tentativo di accesso non autorizzato
       		/* settare unauthorizedRedirect all'url a cui rimandare in caso di operazione non consentita.
       		 * Di default si viene rimandati alla pagina di provenienza.	 */
      		'authError' => __('Authentication required to continue.'),
        	'loginAction' => [
        		'controller'=>'PhpbbUsers',
        		'action' => 'login'
        	],
       		/*
       		 'loginRedirect' => [
     	 		'controller' => 'Articles',
     	 		'action' => 'index'
       		 ],
        	*/
        	'logoutRedirect' => [
        		'controller' => 'Pages',
        		'action' => 'display',
        		'home'
        	],
        	'authenticate' => [
        		'Form' => [
        			'userModel' => 'phpbb_users',
        			'fields'	=> ['password'=>'user_password']
        		]
        	],
        ]);    	
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    /**
     * Determines whether $user is authorized to access actions in controllers.
     * 
     * @param PhpbbUser $user
     * @return boolean
     */
    public function isAuthorized($user) 
    {
    	return true; //temporarily allow everyone
    }
}
