<?php

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users(){

      return  self::find_this_query('select * from users');

    }

    public static function find_user_by_id($id){
        global $database ;
        $result_array = self::find_this_query("SELECT * from users where id = $id") ;

    return !empty($result_array) ?  $result_array[0] :  false ;

     
        
    }

    public static function find_this_query($sql){
        global $database ;
        $result_set = $database->query($sql);
        $object_array = array();

        while($row = mysqli_fetch_assoc($result_set)){
            $object_array[] = self::instantiation($row);
        }

        
        return $object_array ;
    }

    public static function instantiation($result){

        $user = new self;

        foreach($result as $key => $value){

            if($user->has_the_attribute($key)){
                $user->$key = $value ;
            }


        }

        return $user ;
    }

private function has_the_attribute($key){

    $object_properties = get_object_vars($this);

  return  array_key_exists($key , $object_properties);

}

}