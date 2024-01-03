<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChangeProcessOrderController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.FloorManagerChangeProcessOrder')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function Insert(Request $request)
    {
        $selectedOrder = $request->selectedOrder;
        $createdBy = Session::get('id');
        $datetime = date('Y-m-d H:i:s');

        $countX = DB::table('change_process_order')->count();

        if ($countX > 0) {

            DB::table('change_process_order')->update([
                'type' => $selectedOrder,
                'updated_at' => $datetime
            ]);

        } else {

            DB::table('change_process_order')->insert(
                ['type' => $selectedOrder, 'created_by' => $createdBy, 'created_at' => $datetime, 'updated_at' => $datetime]
            );
        }

        return response()->json(['result' => true]);
    }

    public function Load(Request $request)
    {
        $res = DB::table('change_process_order')->get();

        return response()->json(['result' => $res]);
    }
}
