@extends('master')
@section('changeInfo')
        <div class="container" id="coinAdmin">
            <div class="form-change-In4 ">
                <h3 class="title-in4"> change your password </h3>


                <div class="area-changeInfo">
                    <h3 class="title-info">your email  </h3>
                    <input  v-model="arrayNewpass.your_email" type="text" placeholder="nhập vào email của bạn">
                </div>

                <div class="area-changeInfo">
                    <div class="footer-form">
                        <button v-on:click="newPassword()" class="btn-login-1 toggle" type="submit">submit</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
