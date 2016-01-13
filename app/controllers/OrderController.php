<?php

class OrderController extends BaseController {


    /**
     * Show all orders
     * @return response
     */
    public function index() {
        $orders = Order::all();
        return View::make('order.index');
    }

}
