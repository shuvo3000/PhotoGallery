<?php

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/28/2017
 * Time: 7:01 PM
 */
class Db_objects
{

     public $upload_directory = "images";
     public $img_placehoder = "http://placehold.it/400x400&text=IMAGE MISSING";

//    Always delare veriable name according to database coulumn name
//    protected static $db_table;
//    protected static $db_table_fields_names = array();


    public static function findAll(){

        return static::findThisQuery("SELECT * FROM ".static::$db_table); //require_once ("Database.php");

    }

    public static function findByID($id){

        //echo "<br> SELECT * FROM users WHERE id = $id LIMIT 1";
        $result = static::findThisQuery("SELECT * FROM ".static::$db_table." WHERE id = $id LIMIT 1");

        return !empty($result) ? array_shift($result) : false;

    }


    public static function findThisQuery($sql){

        global $database;

        $result = $database->query($sql);



        $object = array();

        while($row  = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $object[] = static::instantation($row);
        }

        return $object;

    }


    public static function instantation($record){

        $calledClass = get_called_class();
        $the_object = new $calledClass;

        foreach ($record as $item => $val) {

            if ($the_object->hasTheAttribute($item)){
                $the_object->$item = $val;
            }
        }

        /*      echo "<pre>";
                print_r($the_object);
                echo "</pre>";*/

        return $the_object;
    }

    /**
     * @param $attribute
     * @return bool
     */
    private function hasTheAttribute($attribute){
        $objectProperties = get_object_vars($this);

        return array_key_exists($attribute, $objectProperties);
    }


    public function create(){
        global $database;

        $properties = $this->cleanPropertiesValues();

        $sql = "INSERT INTO ".static::$db_table." ( ".implode(",", array_keys($properties))." ) ";
        $sql .= "VALUES('".implode("','", array_values($properties))."')";


        if($database->query($sql)){
            $this->id = $database->theInsertID();
            return true;
        }else{
            return false;
        }

    }

    public function update(){
        global $database;

        $properties = $this->cleanPropertiesValues();
        $properties_str = array();

        foreach ($properties as $property => $value) {
            $properties_str[] = "$property= '$value'";
        }

        $sql = "UPDATE ".static::$db_table." SET ";
        $sql .= implode(", ", $properties_str);
        $sql .= " WHERE id = ".$this->id;

        //echo $sql;

        $database->query($sql);

        return (mysqli_affected_rows($database->getConn())==1) ? true : false;
    }

    public function delete(){
        global $database;

        $sql = "DELETE FROM ".static::$db_table." WHERE id =".$database->escapeString($this->id)." LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->getConn())==1) ? true : false;
    }

    public  function save(){

        return isset($this->id) ? $this->update() : $this->save();
    }

    public function getProperties(){

        // return get_object_vars($this); // will return all fields

        $properties = array();

        foreach (static::$db_table_fields_names as $db_field) {
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    protected  function cleanPropertiesValues(){
        global  $database;

        $cleanProperties = array();

        foreach ($this->getProperties() as $property => $value) {

            $cleanProperties[$property] = $database->escapeString($value);
        }

        return $cleanProperties;
    }
    public function picturePath(){
        return empty($this->filename) ? $this->img_placehoder : $this->upload_directory.DS.$this->filename;
    }



}