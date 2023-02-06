<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminsCreate;
use App\Http\Requests\updateIn4;
use App\Models\AdminManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Yoeunes\Toastr\Facades\Toastr;

class AdminManagerController extends Controller
{

    public function FormAddView()
    {
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            Toastr()->info('bạn đã được đăng nhập');
            return redirect('/');
        }else{
            return view('admin.formAdd');
        }
    }

    public function FormLoginView()
    {
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            Toastr()->info('bạn đã được đăng nhập');
            return redirect('/');
        }else{
            return view('admin.formLogin');
        }
    }


    public function create(AdminsCreate $request)
    {
        $data = $request->all();
        $data['password']   = bcrypt($request->password);
        $data['ma_PIN']   = empty($request->ma_PIN) ? rand(100000 ,999999) : $request->ma_PIN;
        AdminManager::create($data);
        return response()->json([
            'status'    => true,
            'alert' => 'create successfully',
        ]);
    }

    public function listAdmins()
    {
        $data = AdminManager::all();
        return response()->json([
            'dataAdmins' =>$data
        ]);
    }


    public function Login(Request $Request)
    {
        $data  = $Request->all();
        $check = Auth::guard('admin_managers')->attempt($data);
        if($check) {
            $Login = Auth::guard('admin_managers')->user();
            if($Login->is_allow) {
                return response()->json([
                    'status' => 2,
                    'alert' => 'Login Done!',
                ]);
            } else {
                Auth::guard('admin_managers')->logout();
                return response()->json([
                    'status' => 1,
                    'alert' => 'Account not allowed or has been Locked',
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }

    }

    public function logOut(){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){ Auth::guard('admin_managers')->logout(); return redirect('/'); }
        else{ Toastr()->info('có lỗi xảy ra?');  return redirect('/'); }
    }


    public function changeUrIn4Index(){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            return view('admin.changeInfo');
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function loadMyfinfo(){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            $id_login = Auth::guard('admin_managers')->id();
            $dataInf =  AdminManager::find($id_login);
            return response()->json([
                 'data' => $dataInf,
                'status' => 200,
            ]);
        } else{
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function updatedInfo(updateIn4 $request){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            $id_login = Auth::guard('admin_managers')->id();
            $change = $request->all();

            $dataInf =  AdminManager::find($id_login);
            $dataInf['avatar']   = empty($request->avatar) ? null : $request->avatar;
            $dataInf->update($change);

            return response()->json([
                'status' => 200,
                'alert' => 'done successfully!'
            ]);
        }else{
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

}
