<?php
class Item  {
    private $rules = array(
        'name'  => 'required',
        'description'  => 'required',
        'charges'  => 'required',
        'quantity'  => 'required',
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
        $result = DB::select('select * from item where id = :id', array($id));
        return $result;
    }
    /**
     * @param : array $data
     * @return int $id
     */
    public static function insert($data){
        $id = DB::table('item')->insertGetId($data);
        //DB::getPdo()->lastInsertId();
        return $id;
    }

    /**
     * @param : int $id
     * @param : array $data
     * @return boolean
     */
    public static function update($id,$data){
        DB::table('item')
            ->where('id', $id)
            ->update($data);
        return true;
    }

    /**
     * @param : int $id
     * @return boolean
     */
    public function delete($id){
        DB::table('item')->where('id', '=', $id)->delete();
        return true;
    }

}