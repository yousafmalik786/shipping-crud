<?php
use DB;
class User {
    /**
     * @param : array $data
     * @return array
     */
    public function login($data){
        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
        $results = DB::select($query, $data);
        $response = array('userName'=> '','status'=> false);
        if(count($results)> 0){
            $response['id'] = $results->id;
            $response['name'] = $results->name;
            $response['status'] = true;
        }
        return $response;
    }

}
