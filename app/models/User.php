<?php
class User {
    /**
     * @param : array $data
     * @return array
     */
    public function login($data){
        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
        $results = DB::select($query, $data);
        $response = array('status'=> false);
        if(count($results)> 0){
            $user = $results[0];
            $response['id'] = $user->id;
            $response['name'] = $user->name;
            $response['email'] = $user->email;
            $response['status'] = true;
        }
        return $response;
    }
    /**
     * @param : bolean $redirect
     * @return mixed
     */
    public static function checkUserLoggedIn($redirect=true){
        $userData = Session::get('user_data');
        $response = true;
        if(!is_array($userData) && count($userData) < 1){
            if($redirect == true){
                Redirect::to('/')->send();

            }else {
                $response = false;
            }
        }
        return $response;
    }
    public static function logout(){
        Session::forget('user_data');
        Redirect::to('/')->send();
    }
    public static function getUserId(){
        $userData = Session::get('user_data');
        $userId = 0;
        if(is_array($userData)){
            $userId = $userData['id'];
        }
        return $userId;
    }


}
