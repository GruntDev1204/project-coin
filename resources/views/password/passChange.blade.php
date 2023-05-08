@extends('master')
@section('changeInfo')
        <div class="container" id="coinAdmin">
            <div class="form-change-In4 ">
                <h3 class="title-in4"> change your password Action</h3>

                <div class="area-changeInfo">
                    <h3 class="title-info">mã xác nhận  của bạn  </h3>
                    <input  v-model="action.codeAction" type="text" placeholder="copy đoạn mã chúng tôi đã gửi cho bạn trong email">
                </div>

                <div class="area-changeInfo">
                    <h3 class="title-info">your new password  </h3>
                    <input  v-model="action.new_password" type="password" placeholder="nhập vào mật khẩu của bạn">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">retype your new password  </h3>
                    <input  v-model="action.re_new_password" type="password" placeholder="nhập vào mật khẩu của bạn">
                </div>

                <div class="area-changeInfo">
                    <div class="footer-form">
                        <button v-on:click="changePass('{{$hash}}')" class="btn-login-1 toggle" type="submit">submit</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
