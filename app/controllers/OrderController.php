<?php

class OrderController extends BaseController {


    /**
     * Show all orders
     * @return response
     */
    public function index() {
        $orders = Order::all();
        return View::make('order.index');
        // get the POST data
        $input_data = Input::all();
        $order = new Order();
        if ($order->validate($input_data)){
            //save data to order
        }else {
            $errors = $b->errors();
        }
    }

}
