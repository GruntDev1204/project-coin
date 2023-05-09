<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminsCreate;
use App\Http\Requests\AdminsLogin;
use App\Http\Requests\changePassword;
use App\Http\Requests\changePasswordAction;
use App\Http\Requests\updateIn4;
use App\Mail\resetPassword;
use App\Mail\YourEmail;
use App\Models\AdminManager;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request as sida;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Str;

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
        $data['hash']   = Str::uuid();
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
                    'status' => 200,
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

    public function resetPassword(changePassword $request){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            $password = $request->new_password;
            $data = [
                'ma_PIN' => $request->ma_PIN,
                'password' => $request->password,
            ];
            $id_login = Auth::guard('admin_managers')->id();
            $dataInf =  AdminManager::find($id_login);
            $check = Auth::guard('admin_managers')->attempt($data);
            if($check){
                $newData = $request->all();
                $newData['password'] = bcrypt($password);
                $dataInf->update($newData);
                Auth::guard('admin_managers')->logout();
                return response()->json([
                    'status' =>200,
                    'alert' => 'bạn đã đổi mật khẩu mới! hãy thử đăng nhập lại!'
                ]);

            }else{
                return response()->json([
                    'status' =>500,
                    'alert' => 'thông tin bạn đã nhập không đúng'
                ]);
            }
            return response()->json([
                'statusLogin' => true,
            ]);

        }else{
            $email  = $request->your_email;
            $check_email = AdminManager::where('email', $email)->first();

            if($check_email){
                $hash = $check_email->hash;
                $fullname = $check_email->fullName;
                $codeXN = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
                FacadesSession::put('ma_xn', $codeXN);
                FacadesSession::put('reset_password_expires_at', Carbon::now()->addMinutes(5));
                Mail::to($request->your_email)->send(new resetPassword(
                    $check_email->email,
                    $hash,
                    $fullname,
                    $codeXN,
                    'status change your password',
                ));
                return response()->json([
                    'status' =>400,
                    'alert' => 'kiểm tra email của bạn để được hướng dẫn đổi mật khẩu!'
                ]);
            }   else{
                return response()->json([
                    'status' =>500,
                    'alert' => 'email của bạn không xác minh được!'
                ]);
            }
            return response()->json([
                'statusLogin' => false,
            ]);
        }

    }


    public function ChangeActionPass($hash ,changePasswordAction  $Request){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
                return redirect('/setting/Introduce/form');
        }else{
            $code = $Request->codeAction;
            $check =  FacadesSession::get('ma_xn');
            if($check && $check === $code){
                $checkAction = AdminManager::where('hash', $hash)->first();
                $data['password'] = bcrypt( $Request->new_password);
                $checkAction->update($data);
                return response()->json([
                    'alert' => 'thay đổi mật khẩu thành công',
                    'statusXN' => 200,
                ]);
            }else{
                return response()->json([
                    'alert' => 'mã xác nhận không hợp lệ',
                    'statusXN' => 500,
                ]);
            }

        }
    }
    public function checkEmail($hash){
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
                return redirect('/setting/Introduce/form');
        }else{
            return view('password.passChange' ,compact('hash'));
        }

    }


    public function viewpassword(){
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            return view('password.resetPassword');
        }else{
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }


    public function viewQuenpass(){
        $Login = Auth::guard('admin_managers')->user();
        if (!$Login) {
            return view('password.forgetpassword');
        }else{
            Toastr()->error('lỗi');
            return redirect('/setting/Introduce/form');
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
