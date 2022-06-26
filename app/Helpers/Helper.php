<?php

if(!function_exists('uploadImage'))
{
    function uploadImage($request, $nameInput, $folder){
        if(!$request->hasFile($nameInput)) {
            //Nếu chưa có file upload thì báo lỗi
            return false;
        }
        else {
            //Xử lý file upload
            $image = $request->file($nameInput);
            //Lưu trữ file tại public/images
            $name = date('Y_m_d_H_i_s_').$image->getClientOriginalName();
            $imagePath = $image->move($folder, $name);
            return $name;
         }
    }
}
if(!function_exists('randomString'))
{
    function randomString($soLuong)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $soLuong; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if(!function_exists('convertListMonth'))
{
    // [
    //     {
    //     "month": 3,
    //     "year": 2022,
    //     "count": 1
    //     },
    //     {
    //     "month": 4,
    //     "year": 2022,
    //     "count": 1
    //     },
    // ]
    function convertListMonth($data)
    {
        $arrayMonth = [];
        for ($i= 0; $i < 12 ; $i++) {
            $check = 0;
            foreach ($data as $key => $value) {
                if(isset($value['month']) &&  $value['month'] == ($i+1)){
                    $check = 1;
                    array_push( $arrayMonth, $value['count']);
                    break;
                }
            }
            if($check == 0)
              array_push( $arrayMonth, 0);
        }
        return $arrayMonth;
    }
}
if(!function_exists('convertListYear'))
{
    // {
    //     "year": 2020,
    //     "count": 1
    //     },
    //     {
    //     "year": 2021,
    //     "count": 1
    //     },
    //     {
    //     "year": 2022,
    //     "count": 40
    //     }
    function convertListYear($data)
    {
        $listYear = [date('Y') -3, date('Y')- 2, date('Y') - 1 , (int)date('Y')];
        $arrayDataYear = [];
        for ($i= (date('Y') -3); $i <= (int)date('Y') ; $i++) {
            $check = 0;
            foreach ($data as $key => $value) {
                if(isset($value['year']) &&  $value['year'] == ($i)){
                    $check = 1;
                    array_push( $arrayDataYear, $value['count']);
                    break;
                }
            }
            if($check == 0)
              array_push( $arrayDataYear, 0);
        }
        return $arrayDataYear;
    }
}

if(!function_exists('insertTable')){
    function insertTable($table = '', $param = []){
        try {
            $param['created_at'] = $param['updated_at'] = now();
            $data = DB::table($table)->insert($param);
            return $data;
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('updateTable')) {
    function updateTable($table = '', $param = [], $where = ''){
        try{
            $param['updated_at'] = now();
            $data = DB::table($table)->where('id', $where)->update($param);
            return $data;
        }catch(Exception $e){
            return false;
        }
    }
}

if (!function_exists('deleteTable')) {
    function deleteTable($table = '', $id = '')
    {
        try {
            return DB::table($table)->where('id', $id)->delete();
        } catch (Exception $e) {
            return $e->getMessage();
            return false;
        }
    }
}

if (!function_exists('selectByWhere')) {
    function selectByWhere($table = '', $where = '')
    {
        try {
            return DB::table($table)->where($where)->get();
        } catch (Exception $e) {
            // return $e->getMessage();
            return false;
        }
    }
}
