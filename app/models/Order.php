<?php
use DB;
class Order  {
    private $rules = array(
        'name'  => 'required',
        'description'  => 'required',
        'charges'  => 'required|Numeric',
        'quantity'  => 'required|Numeric',
    );
    private $messages;

    /**
     * @param : array $data
     * @return boolean
     */
    public function validate($data){
        $v = Validator::make($data, $this->rules);
        if ($v->fails()) {
            $messages = $validator->messages();
            $this->messages = $messages->all();
            return false;
        }
        return true;
    }
    /**
     * @return array
     */
    public function messages() {
        return $this->messages;
    }
    /**
     * @param : int $id
     * @return array
     */
    public function get($id){
        $result = DB::select('select * from order where id = :id', array($id));
        return $result;
    }
    /**
     * @param : int $id
     * @return array
     */
    public static function getAll($userId){
        $query = "SELECT  o.id, o.reference_no,
                  o.created_on,i.`name`,i.description,
                  i.quantity,i.charges
                  FROM `order` o
                  LEFT JOIN item i
                  ON i.id = o.item_id
                  WHERE o.user_id = :user_id";
        $result = DB::select($query, array('user_id' => $userId));
        return $result;
    }
    /**
     * @param : array $data
     * @return int $id
     */
    public function insert($data){
        $id = DB::table('order')->insertGetId($data);
        //DB::getPdo()->lastInsertId();
        return $id;
    }

    /**
     * @param : int $id
     * @param : array $data
     * @return boolean
     */
    public function update($id,$data){
        DB::table('order')
            ->where('id', $id)
            ->update($data);
        return true;
    }

    /**
     * @param : int $id
     * @return boolean
     */
    public function delete($id){
        DB::table('order')->where('id', '=', $id)->delete();
        return true;
    }

}