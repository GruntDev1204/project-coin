@extends('master')
@section('changeInfo')
        <div class="container" id="coinAdmin">
            <div class="form-change-In4 ">
                <h3 class="title-in4"> change your password </h3>

                <div class="area-changeInfo">
                    <h3 class="title-info">old Password  </h3>
                    <input  v-model="arrayNewpass.password" type="password">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">new Password  </h3>
                    <input v-model="arrayNewpass.new_password" type="password">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">xác nhận Password  </h3>
                    <input v-model="arrayNewpass.password_confirmation" type="password">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">your PIN  </h3>
                    <input  v-model="arrayNewpass.ma_PIN" type="password">
                </div>

                <div class="area-changeInfo">
                    <div class="footer-form"><button v-on:click="newPassword()" class="btn-login-1 toggle" type="submit">Change</button></div>
                </div>
            </div>
        </div>
@endsection

