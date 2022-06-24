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

