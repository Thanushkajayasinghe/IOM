<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
  public function store(Request $request)
  {

    //$name = "";
    $file = $request->file('upload');


        $name = $file->getClientOriginalName();
        $name = strtotime("now") . "_" . $name;
        //using the array instead of object
        $image['filePath'] = $name;
        $file->move(public_path() . '/tempFileUpload/', $name);
        //$name = public_path() . '/tempFileUpload/'. $name;

    return response()->json(['result' => $name]);
  }






}
