<?php

class Order extends Eloquent {

    protected $table = 'orders';
    public $timestamps = false;
    private $rules = array(
        'itemName' => 'required|min:3',
        'quantity'  => 'required|Integer|Min:1',
        'MSRP'  => 'required',
        'charges'  => 'required|Numeric',
    );
    private $errors;
    public function validate($data){
        $v = Validator::make($data, $this->rules);
        if ($v->fails()) {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    public function errors() {
        return $this->errors;
    }

}