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
    public static function get($id,$userId){
        $query = "SELECT  o.reference_no, o.created_on,
        sf.email as sf_email,sf.frist_name as sf_first_name,sf.last_name as sf_last_name,
        sf.phone_no as sf_phone_no, sf.address as sf_address,sf.country as sf_country,
        st.email as st_email,st.frist_name as st_first_name,st.last_name as st_last_name,
        st.phone_no as st_phone_no, st.address as st_address,st.country as st_country,
        c.company_name as c_company_name,c.address as c_address,
        c.contact_person as c_contact_person,c.contact_person_phone as c_contact_person_phone,
        i.`name` as i_name, i.description as i_description, i.charges, i.quantity
        FROM `order` o
        LEFT JOIN `company` c
        ON c.id = o.company_id
        LEFT JOIN ship_from sf
        ON sf.id = o.ship_from
        LEFT JOIN ship_to st
        ON st.id = o.ship_to
        LEFT JOIN item i
        ON i.id = o.item_id
        WHERE o.user_id = :user_id
        AND o.id = :id";
        $param = array('user_id' => $userId,'id' => $id);
        $result = DB::select($query, $param);
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