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
use App\Controller\DateTime;
use Cake\Cache\Cache;
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
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');

        //auth component
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ],
            'authorize' => 'Controller', //ad authorize            
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [                
                'controller' => 'Users',
                'action' => 'login'
            ],            
            'unauthorizedRedirect' => $this->referer()
        ]);


        // Allow the display action so our pages controller
        // continues to work.
        //$this->Auth->allow(['display']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['index', 'view', 'display']);

        //sales extend alert
        if (($recentExtendEndSalesCount = Cache::read('recentExtendEndSales')) === false) {
            $this->loadModel('Sales');
            $recentExtendEndSalesCount = $this->Sales->find('RecentExtendEndSales');
            Cache::write('recentExtendEndSales', $recentExtendEndSalesCount, 'short');
        }
        
        //balance sales
        if (($balanceSalesCount = Cache::read('balanceSales')) === false) {
            $this->loadModel('CashReceipts');
            $balanceSalesCount = $this->CashReceipts->find('BalanceSales');
            Cache::write('balanceSales', $balanceSalesCount, 'short');
        }        

        //balance sales
        if (($balanceInvoicesSalesCount = Cache::read('balanceInvoicesSales')) === false) {
            $this->loadModel('Invoices');
            $balanceInvoicesSalesCount = $this->Invoices->find('BalanceInvoicesSales');
            Cache::write('balanceInvoicesSales', $balanceInvoicesSalesCount, 'short');
        } 

        //appointment tasks
        if (($appointmentTasksCount = Cache::read('appointmentTasks')) === false) {
            $this->loadModel('MarketingTasks');
            $appointmentTasksCount = $this->MarketingTasks->find('AppointmentTasks');
            Cache::write('appointmentTasks', $appointmentTasksCount, 'short');
        }         

        $this->set(compact('recentExtendEndSalesCount','balanceSalesCount','balanceInvoicesSalesCount','appointmentTasksCount'));
    }

    //authorized
    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        return false;
    }
}
