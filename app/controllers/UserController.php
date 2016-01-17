<?php

class UserController extends BaseController {


    /**
     * Show all orders
     * @return response
     */
    public function index() {

        if(User::checkUserLoggedIn(false) == true){
            Redirect::to('/orders')->send();
            exit;
        }
        return View::make('user.login');
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
