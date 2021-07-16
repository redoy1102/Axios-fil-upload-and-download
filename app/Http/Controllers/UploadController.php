<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function fileUpload(Request $request){

        $result = $request->file('FileKey')->store('images');
        
        return $result;
    }

    function fileUploadC(Request $request){
        $result = $request->file('FileKeyc')->store('bkash');
        return $result;
    }
}
