<?php

/**
 * Our homepage.
 * 
 * Present a summary of the completed orders.
 * 
 * controllers/welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['title'] = 'Jim\'s Joint!';
        $this->data['pagebody'] = 'welcome';

        // Get all the completed orders
        //FIXME
        $completed = $this->orders->some('status', 'c');
        
        // Build a multi-dimensional array for reporting
        $orders = array();
        foreach ($completed as $order) {
            $orders[] = $this->orders->details($order->num);
        }

        // and pass these on to the view
        $this->data['orders'] = $orders;
        
        $this->render();
    }

}
