<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *

    */

    public function change()
    {
        $users = $this->table('users');
        $users->addColumn('username', 'string', ['limit' => 50])
            ->addColumn('password', 'string', ['limit' => 255])
            ->addColumn('role', 'string', ['limit' => 50])            
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();

        $countries = $this->table('countries');
        $countries->addColumn('name', 'string', ['limit' => 50])                                            
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();

        $states = $this->table('states');
        $states->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('country_id', 'integer', ['null' => true, 'default' => null])                                            
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->addForeignKey('country_id', 'countries', 'id')
            ->save();

        $cities = $this->table('cities');
        $cities->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('parent_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('state_id', 'integer', ['null' => true, 'default' => null])                                 
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->addForeignKey('state_id', 'states', 'id')
            ->save();   


        $clients = $this->table('clients');
        $clients->addColumn('name', 'string', ['limit' => 50])            
            ->addColumn('contact_person', 'string', ['limit' => 50])
            ->addColumn('contact_phone_number', 'string', ['limit' => 50])
            ->addColumn('contact_email', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('contact_address', 'string', ['limit' => 255])
            ->addColumn('city_id', 'integer', ['null' => true, 'default' => null])           
            ->addColumn('state_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('zip', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('country_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('comment', 'text', ['null' => true, 'default' => null])                        
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->addForeignKey('city_id', 'cities', 'id')
            ->addForeignKey('state_id', 'states', 'id')
            ->addForeignKey('country_id', 'countries', 'id')
            ->save();

        $categories = $this->table('categories');
        $categories->addColumn('parent_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('lft', 'integer', ['null' => true, 'default' => null])
            ->addColumn('rght', 'integer', ['null' => true, 'default' => null])
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('description', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();

        $items = $this->table('items');
        $items->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('category_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('item_number', 'string', ['limit' => 50])                  
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('item_cost_price', 'decimal', ['limit' => 15, 'null' => true, 'default' => 0.00])
            ->addColumn('item_extend_price', 'decimal', ['limit' => 15, 'null' => true, 'default' => 0.00])                       
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->addForeignKey('category_id', 'categories', 'id')
            ->save();            

        $sales = $this->table('sales');
        $sales->addColumn('item_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('client_id', 'integer', ['null' => true, 'default' => null])  
            ->addColumn('name', 'string', ['limit' => 50])                            
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('sale_item_cost_price', 'decimal', ['limit' => 15, 'default' => 0.00])
            ->addColumn('sale_item_extend_price', 'decimal', ['limit' => 15, 'null' => true, 'default' => 0.00])
            ->addColumn('item_extend_start_date', 'date', ['null' => true, 'default' => null])
            ->addColumn('item_extend_end_date', 'date', ['null' => true, 'default' => null])
            ->addColumn('item_domain_url', 'string', ['limit' => 50, 'null' => true, 'default' => null])                      
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->addForeignKey('item_id', 'items', 'id')
            ->addForeignKey('client_id', 'clients', 'id')
            ->save();      

        
    }
    
    /**
     * Migrate Up.
     */
    public function up()
    {
    
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}