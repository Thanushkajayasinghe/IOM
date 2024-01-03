<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

//use Illuminate\Support\Facades\Crypt;


class ControlPanelController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    //View Page
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ControlPanel')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllFun(Request $request)
    {
        $function = $request->function;

        if ($function == 'saveUserGroup') {
            $grpId = $request->grpId;
            $grpName = $request->grpName;
            $status = $request->status;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Session::get('id');

            DB::table('user_group')->insert(
                ['group_id' => "$grpId", 'group_name' => "$grpName", 'status' => "$status", 'created_by' => "$createdBy", 'created_at' => $datetime]
            );

            return response()->json(['result' => true]);
        } elseif ($function == 'loadUserGroups') {

            $resp = DB::table('user_group')
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'updateUserGroup') {

            $grpSerial = $request->grpSerial;
            $grpName = $request->grpName;
            $status = $request->status;
            $createdBy = Session::get('id');
            $datetime = date('Y-m-d H:i:s');

            DB::table('user_group')
                ->where('group_serial', '=', $grpSerial)
                ->update(['group_name' => $grpName, 'status' => $status, 'created_by' => $createdBy, 'updated_at' => $datetime]);

            return response()->json(['result' => true]);
        } elseif ($function == 'loadUserGroupDetails') {

            $grpID = $request->grpID;

            $resp = DB::table('user_group')
                ->select('group_name', 'status')
                ->where('group_serial', $grpID)
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'saveUserDetails') {

            $userId = $request->userId;
            $title = $request->title;
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $email = $request->email;
            $telNo = $request->telNo;
            $address = $request->address;
            $status = $request->status;
            $createdBy = Session::get('id');
            //            $createdBy = '1';
            $datetime = date('Y-m-d H:i:s');

            DB::table('user_details')
                ->insert(
                    ['user_id' => "$userId", 'title' => "$title", 'first_name' => "$firstName", 'last_name' => "$lastName", 'user_email' => "$email", 'tel_no' => "$telNo", 'address' => "$address", 'status' => "$status", 'created_by' => "$createdBy", 'created_at' => $datetime]
                );

            return response()->json(['result' => true]);
        } elseif ($function == 'loadUsers') {
            $resp = DB::table('user_details')
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'loadUserDetails') {
            $userId = $request->userId;

            $resp = DB::table('user_details')
                ->where('user_serial', $userId)
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'updateUserDetails') {

            $userSerial = $request->userSerial;
            $title = $request->title;
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $email = $request->email;
            $telNo = $request->telNo;
            $address = $request->address;
            $status = $request->status;
            $createdBy = Session::get('id');
            $datetime = date('Y-m-d H:i:s');

            DB::table('user_details')
                ->where('user_serial', '=', $userSerial)
                ->update(['title' => $title, 'first_name' => $firstName, 'last_name' => $lastName, 'user_email' => $email, 'tel_no' => $telNo, 'address' => $address, 'status' => $status, 'created_by' => $createdBy, 'updated_at' => $datetime]);

            return response()->json(['result' => true]);
        } elseif ($function == 'loginDetailsSave') {

            $userSerial = $request->userSerial;
            $name = $request->name;
            $email = $request->email;
            $userGrp = $request->userGrp;
            //            $password = Crypt::encryptString($request->password);
            $password = Hash::make($request->password);
            //            $password = sha1($request->password);
            $floor = $request->floor;
            $counter = $request->counter;
            $datetime = date('Y-m-d H:i:s');

            DB::table('users')
                ->insert(
                    ['name' => "$name", 'email' => "$email", 'password' => "$password", 'user_group' => "$userGrp", 
                    'user_serial' => "$userSerial", 'created_at' => $datetime, 'floor' => $floor, 'counter_id' => $counter]
                );

            return response()->json(['result' => true]);
        } else if ($function == 'login') {
            $username = $request->username;
            $password = $request->password;

            $credentials = array(
                'email' => $username,
                'password' => $password
            );

            $resp = DB::table('users')
                ->leftJoin('user_details', function ($join) {
                    $join->on('users.user_serial', '=', 'user_details.user_serial');
                })
                ->leftJoin('user_group', function ($join) {
                    $join->on('users.user_group', '=', 'user_group.group_serial');
                })
                ->where('users.email', $username)
                ->first();

            if (Auth::attempt($credentials)) {
                $groupname = $resp->group_name;

                Session::put('title', $resp->title);
                Session::put('firstName', $resp->first_name);
                Session::put('lastName', $resp->last_name);
                Session::put('id', $resp->user_serial);
                Session::put('userGroup', $resp->user_group);
                Session::put('userName', $username);
                Session::put('GroupName', $groupname);
                Session::put('Floor', $resp->floor);
                Session::put('counterid', $resp->counter_id);

                //insert user login details to user audit log table
                DB::table('mhac_userauditlog')->insert([
                    'userid' =>  $resp->id,
                    'counter_id' => $resp->counter_id,
                    'datetime' => date('Y-m-d H:i:s')    
                ]);
        
                return response()->json(['result' => true, 'res' => $resp, 'GN' => $groupname]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'checkUserExist') {

            $user = $request->user;
            $res = DB::table('users')
                ->where('name', '=', $user)
                ->get();

            if ($res) {
                return response()->json(['result' => true, 'res' => $res]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'checkCurrentPwd') {

            $user = $request->user;
            $password = $request->CurrentPwd;

            $resp = DB::table('users')
                ->where('user_serial', '=', $user)
                ->first();

            $existPwd = $resp->password;

            if (Hash::check($password, $existPwd)) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'UpdateWithCurrentPWD') {

            $user = $request->user;
            $email = $request->email;
            $userGrp = $request->userGrp;
            $confirmpword = Hash::make($request->confirmpword);
            $datetime = date('Y-m-d H:i:s');
            $floor = $request->floor;
            $counter = $request->counter;

            $resp = DB::table('users')
                ->where('user_serial', '=', $user)
                ->where('email', '=', $email)
                ->update(['user_group' => $userGrp, 'floor' => $floor, 'counter_id' => $counter, 'password' => $confirmpword, 'updated_at' => $datetime]);

            if ($resp) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'UpdateWithOutPWD') {

            $user = $request->user;
            $email = $request->email;
            $userGrp = $request->userGrp;
            $datetime = date('Y-m-d H:i:s');
            $floor = $request->floor;
            $counter = $request->counter;
            $resp = DB::table('users')
                ->where('user_serial', '=', $user)
                ->where('email', '=', $email)
                ->update(['user_group' => $userGrp, 'floor' => $floor, 'counter_id' => $counter, 'updated_at' => $datetime]);

            if ($resp) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'loadUserPermissions') {

            $resp = DB::table('tbl_user_page_master')
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'checkUserGroupPermission') {

            $userGroupSeril = $request->userGroupId;

            $resp = DB::table('tbl_user_group_permission')
                ->leftJoin('tbl_user_page_master', function ($join) {
                    $join->on('tbl_user_group_permission.user_page_id', '=', 'tbl_user_page_master.user_page_id');
                })
                ->where('tbl_user_group_permission.user_group_serial', $userGroupSeril)
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'checkPagePermissions') {

            $pageId = $request->pageId;
            $userGroupId = $request->userGroupId;

            $resp = DB::table('tbl_user_group_permission')
                ->leftJoin('tbl_user_page_master', function ($join) {
                    $join->on('tbl_user_group_permission.user_page_id', '=', 'tbl_user_page_master.user_page_id');
                })
                ->where('tbl_user_group_permission.user_group_serial', $userGroupId)
                ->where('tbl_user_group_permission.user_page_id', $pageId)
                ->get();

            return response()->json(['result' => $resp]);
        } elseif ($function == 'insertUserPermission') {

            $pageId = $request->pageId;
            $userGroupId = $request->userGroupId;

            $resp = DB::table('tbl_user_group_permission')
                ->insert(
                    ['user_group_serial' => "$userGroupId", 'user_page_id' => "$pageId"]
                );

            if ($resp) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'deleteUserPermission') {

            $pageId = $request->pageId;
            $userGroupId = $request->userGroupId;

            $resp = DB::table('tbl_user_group_permission')
                ->where('user_group_serial', '=', $userGroupId)
                ->where('user_page_id', '=', $pageId)
                ->delete();

            if ($resp) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'updateUserPermission') {

            $pageId = $request->pageId;
            $userGroupId = $request->userGroupId;
            $className = $request->className;

            if ($className == 'btn btn-xs btnReadOnlyTrue btn-success') {
                $resp = DB::table('tbl_user_group_permission')
                    ->where('user_group_serial', '=', $userGroupId)
                    ->where('user_page_id', '=', $pageId)
                    ->update(['read_only' => '']);
            } else {
                $resp = DB::table('tbl_user_group_permission')
                    ->where('user_group_serial', '=', $userGroupId)
                    ->where('user_page_id', '=', $pageId)
                    ->update(['read_only' => 'true']);
            }

            if ($resp) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'updatePagePermissionReadWrite') {
            $pageId = $request->pageId;
            $userGroupId = $request->userGroupId;
            $className = $request->className;

            if ($className == 'btn btn-xs btnReadWriteTrue btn-success') {
                $resp = DB::table('tbl_user_group_permission')
                    ->where('user_group_serial', '=', $userGroupId)
                    ->where('user_page_id', '=', $pageId)
                    ->update(['read_write' => '']);
            } else {
                $resp = DB::table('tbl_user_group_permission')
                    ->where('user_group_serial', '=', $userGroupId)
                    ->where('user_page_id', '=', $pageId)
                    ->update(['read_write' => 'true']);
            }

            if ($resp) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'checkPagePermission') {

            $pageName = $request->pageName;

            $pageIds = DB::table('tbl_user_page_master')
                ->where('user_page_permission', $pageName)
                ->first();

            $pageID = $pageIds->user_page_id;
            $userGroupId = Session::get('userGroup');

            $pagePermission = DB::table('tbl_user_group_permission')
                ->where('user_group_serial', $userGroupId)
                ->where('user_page_id', $pageID)
                ->first();

            if ($pagePermission) {
                if ($pagePermission->read_only != '') {
                    $pagePermissionReadOnlyCheck = $pagePermission->read_only;
                } else {
                    $pagePermissionReadOnlyCheck = 'null';
                }

                if ($pagePermission->read_write != '') {
                    $pagePermissionReadWriteCheck = $pagePermission->read_write;
                } else {
                    $pagePermissionReadWriteCheck = 'null';
                }

                return response()->json(['result' => true, 'readOnly' => $pagePermissionReadOnlyCheck, 'readWrite' => $pagePermissionReadWriteCheck]);
            } else {
                return response()->json(['result' => false]);
            }
        } elseif ($function == 'loadAvailableCounters') {

            $floor = $request->floor;

            $data = DB::table('mhac_counters')
                ->where('floor', $floor)
                ->where('status', 'Active')
                ->orderBy('counter_name','ASC')
                ->get();

            return response()->json(['result' => $data]);
        }
    }
}
