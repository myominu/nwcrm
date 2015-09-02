<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Print Controller
 *
 * @property \App\Model\Table\PrintTable $Print
 */
class PrintController extends AppController
{

    public function cash_receipt_view($id = null)
    { 
        $this->layout = 'print';

        $this->loadModel('CashReceipts');

        $cashReceipt = $this->CashReceipts->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        $this->set('cashReceipt', $cashReceipt);
        $this->set('_serialize', ['cashReceipt']);
    }

    public function balance_cash_receipt_view($id = null)
    { 
        $this->layout = 'print';

        $this->loadModel('CashReceipts');

        $cashReceipt = $this->CashReceipts->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        $this->set('cashReceipt', $cashReceipt);
        $this->set('_serialize', ['cashReceipt']);
    }

    public function invoice_view($id = null)
    { 
        $this->layout = 'print';

        $this->loadModel('Invoices');

        $invoice = $this->Invoices->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    public function balance_invoice_view($id = null)
    { 
        $this->layout = 'print';

        $this->loadModel('Invoices');

        $invoice = $this->Invoices->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }
}
