<?php

class OrderController extends BaseController {

    function __construct(){
        User::checkUserLoggedIn();
    }
    /**
     * Show all orders
     * @return response
     */
    public function index() {
        $user = Session::get('user_data');
        $userId = $user['id'];
        $orders = Order::getAll($userId);
        $data = ['orders' => $orders,'user' => $user];
        return View::make('order.index',$data);
    }
    public function show(){
        return View::make('order.order');
    }
    public function insert(){
        // get the POST data
        $input_data = Input::all();
        $order = new Order();
        if ($order->validate($input_data)){
            //save data to order
        }else {
            $errors = $b->errors();
        }
    }
    public function update(){
        // get the POST data
        $input_data = Input::all();
        $order = new Order();
        if ($order->validate($input_data)){
            //save data to order
        }else {
            $errors = $b->errors();
        }
    }
    public function delete(){

    }


}
