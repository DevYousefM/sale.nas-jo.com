<?php

namespace App\Traits;



Trait CustomFunctions
{

    public function StoreFiles($file , $path , $name){
        $file_extention = $file->getClientOriginalExtension();
        $file_name = $name.'.'.$file_extention;
        $file->move($path , $file_name);
        return $path.'/'.$file_name;
    }

}
