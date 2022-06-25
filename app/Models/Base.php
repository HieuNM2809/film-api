<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
    public function updateCondition($table ,$data ,$condition=[]){
        $sql = $table;
        $sql = $sql->where('id' ,$condition['id']);
        // if(isset($condition['id']) ){
        //     $sql = $sql->where('id' ,$condition['id']);
        // }
        return $sql->update($data);
    }
    public function getByCondition($table, $condition=[]){
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
    public function toSqlString($sql){
        $sqlJoin = str_replace(array('?'), array('\'%s\''), $sql->toSql());
        return vsprintf($sqlJoin, $sql->getBindings());
    }
    public function countByCondition($table, $condition, $column = 'created_at'){

        $sql = $table;
        if(isset($condition['curentYear']) ){
            $sql = $sql->whereYear($column ,$condition['curentYear']);
        }
        if(isset($condition['curentMonth']) ){
            $sql = $sql->whereMonth($column ,$condition['curentMonth']);
        }
        if(isset($condition['curentDay']) ){
            $sql = $sql->whereDay($column ,$condition['curentDay']);
        }
        return $sql->count();
    }

    public function countListMonthByCondition($table, $condition, $column = 'created_at'){
        return $table->selectRaw('month('. $column.') month, year('. $column.') year, count(*)  count')
                    ->groupBy('month','year')
                    ->having('year', date('Y'))
                    ->get();
    }
    public function countListYearByCondition($table, $condition, $column = 'created_at'){
        return $table->selectRaw('year('. $column.') year, count(*)  count')
                    ->groupBy('year')
                    // ->having('year', date('Y'))
                    ->get();
    }

    // name: 'Đăng ký mới',
    // data: [3, 2, 1, 3, 4, 3, 2, 1, 3, 4 , 4, 5 ]
    public function chartMonth($table, $condition, $column = 'created_at'){
        $userModel = new User();
        $postModel = new Post();
        $commentModel = new Comment();
        $dataResponse['userNew'] = convertListMonth($this->countListMonthByCondition($userModel, $condition, $column = 'created_at'));
        $dataResponse['postNew'] = convertListMonth($this->countListMonthByCondition($postModel, $condition, $column = 'created_at'));
        $dataResponse['commentNew'] = convertListMonth($this->countListMonthByCondition($commentModel, $condition, $column = 'created_at'));
        $dataResponse['reportNew'] = convertListMonth($this->countListMonthByCondition($postModel, $condition, $column = 'updated_at'));
        return  $dataResponse;
    }
    // name: 'Năm 2019',
    // data: [107, 31, 635, 203]
    public function chartYear($table, $condition, $column = 'created_at'){
        $userModel = new User();
        $postModel = new Post();
        $commentModel = new Comment();
        $dataResponse['userNew'] = convertListYear($this->countListYearByCondition($userModel, $condition, $column = 'created_at'));
        $dataResponse['postNew'] = convertListYear($this->countListYearByCondition($postModel, $condition, $column = 'created_at'));
        $dataResponse['commentNew'] = convertListYear($this->countListYearByCondition($commentModel, $condition, $column = 'created_at'));
        $dataResponse['reportNew'] = convertListYear($this->countListYearByCondition($postModel, $condition, $column = 'updated_at'));
        return  $dataResponse;
    }



}
