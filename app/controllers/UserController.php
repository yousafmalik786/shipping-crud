<?php

class UserController extends BaseController {


    /**
     * Show all orders
     * @return response
     */
    public function index() {

        //check if user login

        return View::make('user.login');

       /* $orders = Order::all();
        return View::make('order.index');
        // get the POST data
        $input_data = Input::all();
        $order = new Order();
        if ($order->validate($input_data)){
            //save data to order
        }else {
            $errors = $b->errors();
        }*/
    }
    public function login(){
        $data = Request::only('email', 'password');
        $rules = array(
           'email' => 'required|email',
           'password' => 'required|alphaNum|min:6',
           );
        $validator = Validator::make($data, $rules);
        if ($validator->fails() !== true){
            $user = new User();
            $response = $user->login($data);
            if($response['status'] == true){
                $sessionData = array(
                          'id' => $response['id'],
                          'name' => $response['name']
                );
                Session::put('user_data', 'value');
            }
        }
    }

}
