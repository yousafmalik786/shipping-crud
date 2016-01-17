<?php
class ShipFrom  {
    private $rules = array(
        'email'  => 'required|email',
        'frist_name'  => 'required',
        'last_name'  => 'required',
        'phone_no'  => 'required',
        'address'  => 'required',
        'city'  => 'required',
        'zip'  => 'required',
        'country'  => 'required',
    );
    private $messages;

    /**
     * @param : array $data
     * @return boolean
     */
    public function validate($data){
        $v = Validator::make($data, $this->rules);
        if ($v->fails()) {
            $messages = $v->messages();
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
        $result = DB::select('select * from ship_from where id = :id', array($id));
        return $result;
    }
    /**
     * @param : array $data
     * @return int $id
     */
    public static function insert($data){
        $id = DB::table('ship_from')->insertGetId($data);
        return $id;
    }

    /**
     * @param : int $id
     * @param : array $data
     * @return boolean
     */
    public static function update($id,$data){
        DB::table('ship_from')
            ->where('id', $id)
            ->update($data);
        return true;
    }

    /**
     * @param : int $id
     * @return boolean
     */
    public function delete($id){
        DB::table('ship_from')->where('id', '=', $id)->delete();
        return true;
    }

}