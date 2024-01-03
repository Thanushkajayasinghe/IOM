<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentPath = $request->path();

        $pageId = DB::table('tbl_user_page_master')
            ->where('user_page_permission', $currentPath)
            ->first();

        $pageID = $pageId->user_page_id;
        $userGroupId = Session::get('userGroup');

        if ($userGroupId != null) {

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

                $request->attributes->add(['readOnly' => $pagePermissionReadOnlyCheck, 'readWrite' => $pagePermissionReadWriteCheck]);

                return $next($request);

            } else {

                return redirect('403Page');
            }
        } else {

            return redirect('login');
        }
    }
}
