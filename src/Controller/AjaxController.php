<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ajax Controller
 *
 * @property \App\Model\Table\AjaxTable $Ajax
 */
class AjaxController extends AppController
{

    //sales list by client_id
    public function sales_list($client_id = null)
    {        
        $this->loadModel('CashReceipts');
        //return $client_id;
        $this->layout = 'ajax';
        $sales = $this->CashReceipts->Sales->find('all', [
            'conditions' => ['Sales.client_id' => $client_id],
            'limit' => 200
            ]);

        $this->loadModel('Masters');

        $cash_type = $this->Masters->find('item', [
            'name' => 'Cash type',
            ]);       

        $this->set(compact('sales','cash_type'));
        //$this->set('_serialize', ['cashReceipt']);
    }

    //item pricing by item_id
    public function item_pricing($item_id = null)
    {        
        $this->loadModel('Items');
        //return $client_id;
        $this->layout = 'ajax';
        $items = $this->Items->get($item_id);
        
        $this->set(compact('items'));
        //$this->set('_serialize', ['cashReceipt']);
    }

    
}
