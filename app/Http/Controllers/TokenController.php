<?php

namespace App\Http\Controllers;

use App\Http\Requests\Token as RequestsToken;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $data = Token::find(1);
            return response()->json([
                'dataToken' => $data,
            ]);
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }
    public function view()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            return view('editToken');
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    public function edittoken(RequestsToken $request)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $data = Token::find($request->id);
            $token = $request->all();
            $data->update($token);
            return response()->json([
                'mess' => 'edit sucess Token!',
            ]);
        } else {
            Toastr()->warning('vui lòng đăng nhập trước');
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function apiToken()
    {
        $data = Token::find(1);
        return response()->json([
            'dataToken' => $data,
        ]);
    }
}
