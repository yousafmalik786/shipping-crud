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
    public function show($id){
        $user = Session::get('user_data');
        $userId = $user['id'];
        $order = Order::get($id,$userId);
        if(count($order) < 1) return;
        $data = array('order' => $order[0]);
        return View::make('order.order',$data);
    }
    public function showCreateForm(){
        return View::make('order.create');
    }
    public function showUpdateForm($id){
        if(!is_numeric($id))return;
        $userId = User::getUserId();
        $order = Order::get($id,$userId);
        if(count($order) < 1) return;
        $data = array('order' => $order[0]);
        return View::make('order.update',$data);
    }
    public function saveOrder(){
        $inputShipFrom = Input::get('shipFrom');
        $inputShipFrom = $this->jsonToInputArray($inputShipFrom);
        $inputshipTo = Input::get('shipTo');
        $inputshipTo = $this->jsonToInputArray($inputshipTo);
        $inputItem = Input::get('itemDetail');
        $inputItem = $this->jsonToInputArray($inputItem);
        $inputCompany = Input::get('companyInfo');
        $inputCompany = $this->jsonToInputArray($inputCompany);
        $result = array('errors' => '','result' =>'');
        $foundErrors = false;
        //validate ship from info.
        $shipFrom = new ShipFrom();
        if($shipFrom->validate($inputShipFrom) === false){
            $foundErrors = true;
            $messages = $shipFrom->messages();
            if(count($messages)){
                foreach($messages as $message){
                    $result['errors'] .= "<li>$message</li>";
                }
            }
        }
        //validate ship to information
        $shipTo = new ShipTo();
        if($shipTo->validate($inputshipTo) === false){
            $foundErrors = true;
            $messages = $shipTo->messages();
            if(count($messages)){
                foreach($messages as $message){
                    $result['errors'] .= "<li>$message</li>";
                }
            }
        }
        //validate item information
        $item = new Item();
        if($item->validate($inputItem) === false){
            $foundErrors = true;
            $messages = $item->messages();
            if(count($messages)){
                foreach($messages as $message){
                    $result['errors'] .= "<li>$message</li>";
                }
            }
        }
        //validate company information
        $company = new Company();
        if($company->validate($inputCompany) === false){
            $foundErrors = true;
            $messages = $company->messages();
            if(count($messages)){
                foreach($messages as $message){
                    $result['errors'] .= "<li>$message</li>";
                }
            }
        }
        if($foundErrors == true) {
            echo json_encode($result);
            return;
        }
        $data = array(
            'shipFrom' => $inputShipFrom,
            'shipTo' => $inputshipTo,
            'item' => $inputItem,
            'company' => $inputCompany,
            );
        $action = Input::get('action');
        if($action == 'update'){
            $orderId = Input::get('order_id');
            if(Order::update($orderId,$data) == true){
                $result['result'] = 'success';
            }else{
                $result['errors'] = "<li>There was a problem with record update.Please try later.</li>";
            }

        }else{
            //create new order
            $newOrderId = Order::insert($data);
            if(is_numeric($newOrderId) && $newOrderId > 0){
                $result['result'] = 'success';
            }
        }

        echo json_encode($result);
    }
    function  jsonToInputArray($inputJson){
        $input = json_decode($inputJson);
        $inputArray = array();
        if(count($input)){
            foreach($input as $element){
                $inputArray[$element->name] = $element->value;
            }
        }
        return $inputArray;
    }

    public function delete($id){
        $result = array('errors' => '','result' =>'');
        $userId = User::getUserId();
        if(Order::delete($id,$userId) === true){
            $result['result'] = 'success';
        }else{
            $result['errors'] = "There is an error. Please try again later.";
        }
        echo json_encode($result);
    }


}
