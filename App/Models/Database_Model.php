<?php
namespace App\Models;


class Database_Model
{

    protected static $mysqli;
    protected static $instance;


    public static function instance(){
        if(self::$instance instanceof self) {
            return self::$instance;
        }
        return self::$instance = new self;
    }

    protected function __construct(){
        self::$mysqli = new \mysqli(HOST,USER_NAME,PASSWORD,DB_NAME);
        if(self::$mysqli->connect_error){
            throw new Exception('ошибка базы данных попробуйте попозже!!!');
        }
        self::$mysqli->query('SET NAMES UTF8');
        self::$mysqli->select_db(DB_NAME);
    }



    public static function select($sql){
        $arr = array();
        $result = self::$mysqli->query($sql);
        while($row = $result->fetch_assoc()){
            $arr[] = $row;
        }
        return $arr;
    }


    public function delete($table,$where = array(),$operand = array('=')) { // формирует sql запрос по удалению данных из базы

        //$sql = "DELETE FROM brands WHERE brand_id=28";

        $sql = "DELETE FROM ".$table;
        if(is_array($where)) {
            $i = 0;
            foreach($where as $k=>$v) {
                $sql .= ' WHERE '.$k.$operand[$i]."'".$v."'";
                $i++;

                if((count($operand) -1) < $i) {
                    $operand[$i] = $operand[$i-1];
                }
            }

        }

        //echo $sql;
        //exit();
        $result = $this->mysqli->query($sql);

        return TRUE;;
    }

    public function insert($table, $data = array(),$values = arraY(),$id = FALSE) {//метод по вставке данных в базу
        //$sql = "INSERT INTO brands (brand_name,parent_id) VALUES ('TEST','0')";

        $sql = "INSERT INTO ".$table." (";

        $sql .= implode(",",$data).") ";

        $sql .= "VALUES (";

        foreach($values as $val) {
            $sql .= "'".$val."'".",";
        }

        $sql = rtrim($sql,',').")";  //вырезаем лишнюю запятую в конце запроса

        $result = $this->mysqli->query($sql);



        if($id) {
            return $this->mysqli->insert_id;
        }
        return TRUE;
    }

    public function update($table,$data = array(),$values = array(),$where = array()) {//формирует запрос по обновлению таблицы
        //$sql = "UPDATE brands SET brand_name='TES1',parent_id='1' WHERE brand_id = 29";
        $data_res = array_combine($data,$values);


        $sql = "UPDATE ".$table." SET ";

        foreach($data_res as $key=>$val) {
            $sql .= $key."='".$val."',";
        }

        $sql = rtrim($sql,',');

        foreach($where as $k=>$v) {
            $sql .= " WHERE ".$k."="."'".$v."'";
        }
        //echo $sql;
        //exit();
        $result = $this->mysqli->query($sql);



        return TRUE;
    }




}