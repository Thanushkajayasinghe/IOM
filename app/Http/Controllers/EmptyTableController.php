<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmptyTableController extends Controller
{
    //View Page
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TableEmpty')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function Truncate(Request $request)
    {

        $function = $request->function;
        foreach ($function as $items) {
            DB::table($items)->truncate();
        }

        return response()->json(['result' => true]);

    }
}
