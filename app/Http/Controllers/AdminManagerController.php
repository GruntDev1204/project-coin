<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminsCreate;
use App\Http\Requests\AdminsLogin;
use App\Http\Requests\updateIn4;
use App\Mail\YourEmail;
use App\Models\AdminManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Yoeunes\Toastr\Facades\Toastr;

class AdminManagerController extends Controller
{

    public function FormAddView()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            Toastr()->info('bạn đang được đăng nhập! vui lòng đăng xuất!');
            return redirect('/');
        } else {
            return view('admin.formAdd');
        }
    }

    public function FormLoginView()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            Toastr()->info('bạn đã được đăng nhập');
            return redirect('/');
        } else {
            return view('admin.formLogin');
        }
    }

    public function create(AdminsCreate $request)
    {
        $data = $request->all();
        $data['password']   = bcrypt($request->password);
        $data['ma_PIN']   = empty($request->ma_PIN) ? rand(100000, 999999) : $request->ma_PIN;
        $data['avatar']   = '/photos/shares/1.png';
        AdminManager::create($data);
        Mail::to($request->email)->send(new YourEmail(
            $request->fullName,
            $data['ma_PIN'],
            'Your PIN code'
        ));
        return response()->json([
            'status'    => true,
            'alert' => 'create successfully',
        ]);
    }

    public function Login(AdminsLogin $Request)
    {
        $data  = $Request->all();
        $check = Auth::guard('admin_managers')->attempt($data);
        if ($check) {
            $Login = Auth::guard('admin_managers')->user();
            if ($Login->is_allow) {
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

    public function logOut()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            Auth::guard('admin_managers')->logout();
            Toastr()->info('bạn đã được đăng xuất!');
            return redirect('/login');
        } else {
            Toastr()->info('có lỗi xảy ra?');
            return redirect('/');
        }
    }


    public function changeUrIn4Index()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            return view('admin.changeInfo');
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function loadMyfinfo()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $id_login = Auth::guard('admin_managers')->id();
            $dataInf =  AdminManager::find($id_login);
            return response()->json([
                'yourInfo' => $dataInf,
                'status' => 200,
            ]);
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function updatedInfo(updateIn4 $request)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $id_login = Auth::guard('admin_managers')->id();
            $dataInf =  AdminManager::find($id_login);

            $dataInf->update([
                'email'      =>  $request->email,
                'avatar'          => empty($request->avatar) ? '/photos/shares/1.png'  : $request->avatar,
                'fullName'           =>  $request->fullName,
                'vai_tro'           =>  $request->vai_tro,
                'describe_vai_tro'           =>  $request->describe_vai_tro,
                'user_info'           =>  $request->user_info,
            ]);

            return response()->json([
                'status' => 200,
                'alert' => 'done successfully!'
            ]);
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function indexList()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            if ($Login->is_ceo == 1) {
                $dataInf =  AdminManager::where('is_ceo', 0)->get();
                return response()->json([
                    'status' => true,
                    'dataInfoManager' => $dataInf,
                ]);
            } else {
                Toastr()->info('Bạn không được phép truy cập');
                return redirect()->back();
            }
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function memberIndex()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            if ($Login->is_ceo == 1) {
                return view('admin.managerAdmin');
            } else {
                Toastr()->info('Bạn không được phép truy cập');
                return redirect()->back();
            }
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function allowMember($id)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            if ($Login->is_ceo == 1) {
                $member =  AdminManager::find($id);
                if ($member) {
                    $member->is_allow = !$member->is_allow;
                    $member->save();
                    return response()->json([
                        'status' => 200,
                        'action' => $member->is_allow,
                    ]);
                } else {
                    Toastr()->error('members does not exits!');
                    return redirect()->back();
                }
            } else {
                Toastr()->info('Bạn không được phép truy cập');
                return redirect()->back();
            }
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }


    //show ra trang chính
    public function memberListchinh()
    {
        $dataInf =  AdminManager::where('is_allow', 1)->get();
        return response()->json([
            'status' => true,
            'dataInfoManager' => $dataInf,
        ]);
    }
}
