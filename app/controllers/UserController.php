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
        $data['password'] = md5($data['password']);
        $rules = array(
           'email' => 'required|email',
           'password' => 'required|alphaNum|min:6',
           );
        $validator = Validator::make($data, $rules);
        $result = array('errors' => '','result' =>'');
        if($validator->fails()){
            $messages = $validator->messages();
            foreach ($messages->all() as $message){
                $result['errors'] .= "<li>$message</li>";
            }
            return json_encode($result);

        }
        $user = new User();
        $response = $user->login($data);
        if($response['status'] === true){
            $sessionData = array();
            $sessionData['id'] = $response['id'];
            $sessionData['email'] = $response['email'];
            $result['result'] = 'success';
            Session::put('user_data', $sessionData);
        }else {
            $result['errors'] = 'Username or password incorrect. Please try again';
        }
        return json_encode($result);

    }
    public  function logout(){
        User::logout();
    }

}
