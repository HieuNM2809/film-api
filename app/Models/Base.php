<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model{
    // public function unsetDataTime($data){
    //     try{
    //         unset($data['created_at']);
    //         unset($data['deleted_at']);
    //         return $data;
    //     }catch(Exception $e){
    //         return $data;
    //     }
    // }
    public function updateCondition($table ,$data ,$condition){
        $sql = $table;
        $sql = $sql->where('id' ,$condition['id']);
        // if(isset($condition['id']) ){
        //     $sql = $sql->where('id' ,$condition['id']);
        // }
        return $sql->update($data);
    }
    public function getByCondition($table, $condition){
        $sql = $table;
        if(isset($condition['id_user']) ){
            $sql = $sql->where('id_user' ,$condition['id_user']);
        }
        if(isset($condition['id']) ){
            $sql = $sql->where('id' ,$condition['id']);
        }
        return $sql->get();
    }
    public function createByTable($table, $data){
        $sql = $table;
        // if(isset($condition['id_user']) ){
        //     $sql = $sql->where('id_user' ,$condition['id_user']);
        // }
        // if(isset($condition['id']) ){
        //     $sql = $sql->where('id' ,$condition['id']);
        // }
        return $sql->create($data);
    }
}
