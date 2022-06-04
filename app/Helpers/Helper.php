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
