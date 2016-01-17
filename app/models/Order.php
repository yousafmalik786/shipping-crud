<?php
class Order  {

    /**
     * @param : int $id
     * @return array
     */
    public static function get($id,$userId){
        $query = "SELECT  o.id as o_id,o.reference_no, o.created_on,
        sf.email as sf_email,sf.frist_name as sf_first_name,sf.last_name as sf_last_name,
        sf.phone_no as sf_phone_no, sf.address as sf_address,sf.country as sf_country,
        sf.city as sf_city,sf.zip as sf_zip,
        st.email as st_email,st.frist_name as st_first_name,st.last_name as st_last_name,
        st.phone_no as st_phone_no, st.address as st_address,st.country as st_country,
        st.city as st_city,st.zip as st_zip,
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
    public static function insert($data){

        if(!is_array($data) || !count($data)) return;
        $shipFromData = $data['shipFrom'];
        $shipToData = $data['shipTo'];
        $itemData = $data['item'];
        $companyData = $data['company'];
        $shipFromId = ShipFrom::insert($shipFromData);
        $shipToId = ShipTo::insert($shipToData);
        $itemId = Item::insert($itemData);
        $companyId = Company::insert($companyData);
        $orderData = array(
                    'reference_no' => 'SPR-'.rand(),
                    'created_on' => date('Y-m-d'),
                    'user_id'  => User::getUserId(),
                    'ship_to' => $shipToId,
                    'ship_from'=> $shipFromId,
                    'item_id' => $itemId,
                    'company_id' => $companyId
            );
        $id = DB::table('order')->insertGetId($orderData);
        return $id;
    }

    /**
     * @param : int $id
     * @param : array $data
     * @return boolean
     */
    public static function update($id,$data){
        if(!is_array($data) || !count($data)) return;
        $shipFromData = $data['shipFrom'];
        $shipToData = $data['shipTo'];
        $itemData = $data['item'];
        $companyData = $data['company'];
        $query = "SELECT * FROM `order` WHERE id = :id";
        $param = array('id' => $id);
        $result = DB::select($query, $param);
        if(count($result) > 0){
            $order = $result[0];
            $shipToId = ($order->ship_to)?$order->ship_to:0;
            $shipFromId = ($order->ship_from)?$order->ship_from:0;
            $itemId = ($order->item_id)?$order->item_id:0;
            $companyId = ($order->company_id)?$order->company_id:0;
            ShipFrom::update($shipFromId,$shipFromData);
            ShipTo::update($shipToId,$shipToData);
            Item::update($itemId,$itemData);
            Company::update($companyId,$companyData);
            return true;
        }

    }

    /**
     * @param : int $id
     * @return boolean
     */
    public static function delete($id,$userId){
        $userId = ($userId)?$userId:0;
        if(is_numeric($id) && $id > 0){
            $query = "DELETE o,i,sf,st,c
                    FROM `order` o
                    LEFT JOIN item i
                    ON i.id = o.item_id
                    LEFT JOIN ship_from sf
                    ON sf.id = o.ship_from
                    LEFT JOIN ship_to st
                    ON st.id = o.ship_to
                    LEFT JOIN company c
                    ON c.id = company_id
                    WHERE  o.id = :id AND o.user_id = :user_id";
            $param = array('id' => $id,'user_id' => $userId);
            $afftectedRows = DB::delete($query,$param);
            if($afftectedRows > 0){
                return true;
            }
        }
    }

}