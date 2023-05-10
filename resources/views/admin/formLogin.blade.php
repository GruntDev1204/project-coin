@extends('master')
@section('content')
    <div class="form-signUp">
            <div class="title-admin">Login to Admin</div>
            <div class="area-input">
                <p class="title-form">Thông tin đăng nhập</p>
                <input type="text"  v-model="arraySignin.user_info" placeholder="Nhập Email (hoặc số điện thoại)">
            </div>
            <div class="area-input">
                <p class="title-form">Password</p>
                <input type="password" v-model="arraySignin.password" placeholder="Nhập mật khẩu">
            </div>
            <div class="area-input">
                <p class="title-form">Mã PIN</p>
                <input type="password" v-model="arraySignin.ma_PIN" placeholder="Nhập mã PIN (gồm 6 chữ số)">
            </div>
            <div class="button-login">
                <button class="btn-login-1" v-on:click=" LoginAction()" >Login</button>
            </div>
            <button  class="btn-login-1" style="margin-top: 50px;width: 250px;  background: rgba(199, 5, 5, 0.904)" type="submit"><a target="_blank"  href="/forgetPass">quên mật khẩu?<i class="fas fa-user-lock"></i></a></button>
    </div>
@endsection
