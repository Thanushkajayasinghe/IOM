<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentSettingController extends Controller
{

    public function ViewPage(Request $request)
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.paymentSetting')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllData(Request $request)
    {
        $function = $request->function;

        if ($function == "Save") {

            $date = $request->date;
            $amount = $request->amount;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            $da = DB::table('payment_setting')
                ->where('Effective_Date', '=', $date)
                ->first();


            if (empty($da)) {
                DB::table('payment_setting')->insert(
                    ['Effective_Date' => "$date", 'Amount' => "$amount", 'Cby' => "$createdBy", 'created_at' => "$datetime"]
                );
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }


        } else if ($function == "load") {
            $date = date('Y-m-d');

            $res = DB::table('payment_setting')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->first();

            $dat = $res->Effective_Date;
            $amount = $res->Amount;
            $idd = $res->id;

            return response()->json(['date' => $dat, 'amount' => $amount, 'id' => $idd]);


        } else if ($function == "Update") {
            $id = $request->id;
            $amount = $request->amount;

            DB::table('payment_setting')
                ->where('id', '=', $id)
                ->update(['Amount' => $amount]);

            return response()->json(['result' => true]);
        }


    }
    public function MhacPaymentSettingSave(Request $request)
    {
        $date = $request->date;
        $amount = $request->amount;
        $datetime = date('Y-m-d H:i:s');
        $createdBy = Auth::user()->id;
        $country = $request->country;
        $da = DB::table('mhac_payment_setting')
            ->where('Effective_Date', '=', $date)
            ->where('country',  $country)
            ->first();


        if (empty($da)) {
            DB::table('mhac_payment_setting')->insert(
                ['Effective_Date' => "$date", 'Amount' => "$amount", 'country' => "$country", 'Cby' => "$createdBy", 'created_at' => "$datetime"]
            );
            return response()->json(['result' => true]);
        } else {
            return response()->json(['result' => false]);
        }
    }
    public function MhacLoad(Request $request)
    {
        $date = date('Y-m-d');
        $country = $request->country;
        $res = DB::table('mhac_payment_setting')
        ->where('country',  $country)
        ->where('Effective_Date', '<=', $date)
        ->orderBy('Effective_Date', 'desc')
        ->first();
        $dat = $res->Effective_Date;
        $amount = $res->Amount;
        $idd = $res->id;
        $country = $res->country;
        return response()->json(['date' => $dat, 'amount' => $amount, 'id' => $idd, 'country' => $country]);
    }
    public function PaymentSettingUpdate(Request $request)
    {
        $id = $request->id;
        $amount = $request->amount;
        $datetime = date('Y-m-d H:i:s');
        DB::table('mhac_payment_setting')
            ->where('id', '=', $id)
            ->update([
                'Amount' => $amount,
                'updated_at' => $datetime,
            ]);

        return response()->json(['result' => true]);
    }

}
