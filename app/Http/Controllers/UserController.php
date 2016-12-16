<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/12/15
 * Time: 上午 7:21
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth_admin');
    }

    /**
     * Show user list
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsers()
    {
        $users = User::all();
        return view('users.list', ['users' => $users]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        // 在使用 bootstrap toggle 的情況下，如果 checkbox 有勾選傳過來的值是字串的 "on"，如果 checkbox 沒有勾選則不會回傳任何值回來。
        $changed_status = $request->input('status');
        $user = User::find($id);
        if ($changed_status === "on") {
            $user->status = 'active';
        }
        else if ($changed_status === null) {
            $user->status = 'idle';
        }
        $user->save();
        return redirect()->route('list_users');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeRole(Request $request)
    {
        $id = $request->input('id');
        $changed_role = $request->input('role');
        $user = User::find($id);
        if (in_array($changed_role, User::$ALL_ROLES, true)) {
            $user->role = $changed_role;
        }
        $user->save();
        return redirect()->route('list_users');
    }
}