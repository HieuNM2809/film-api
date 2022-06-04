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
}
