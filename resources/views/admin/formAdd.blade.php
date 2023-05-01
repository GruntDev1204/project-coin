@extends('master')
@section('content')
    <div class="form-signUp">
            <div class="title-admin">Submit to be Admin</div>
            <div class="area-input">
                <p class="title-form">Tên đăng nhập (Có thể sử dụng email hoặc SĐT)</p>
                <input type="text" v-model="arraySignUp.user_info" placeholder="đăng kí tên đăng nhập (có thể dùng email hoặc sđt)">
            </div>
            <div class="area-input">
                <p class="title-form">Full Name</p>
                <input type="text"  v-model="arraySignUp.fullName" placeholder="Nhập họ và tên">
            </div>
            <div class="area-input">
                <p class="title-form">Email Address</p>
                <input type="email"  v-model="arraySignUp.email" placeholder="Nhập email liên hệ">
            </div>
            <div class="area-input">
                <p class="title-form">Password</p>
                <input type="password" v-model="arraySignUp.password" placeholder="đăng kí mật khẩu">
            </div>
            <div class="area-input">
                <p class="title-form">Retype Password</p>
                <input type="password" v-model="arraySignUp.re_password" placeholder="xác nhận lại mật khẩu">
            </div>
            <div class="area-input">
                <p class="title-form">Mã PIN</p>
                <input type="password"  v-model="arraySignUp.ma_PIN" placeholder="đăng kí mã PIN (gồm 6 chữ số và không bắt buộc)">
            </div>
            <div class="button-login"><button class="btn-login-2" v-on:click="conFigAdmins()">Submit</button></div>
    </div>
@endsection
