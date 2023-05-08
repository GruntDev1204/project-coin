@extends('master')
@section('changeInfo')
        <div class="container">
            <div class="form-change-In4 ">
                <h3 class="title-in4"> Edit info admin <i id ="getIn4" class="fa-solid fa-pen button"></i> </h3>
                <div class="area-changeInfo">
                    <h3 class="title-info">Thay đổi ảnh đại diện</h3>
                    <div class="form-avatar">
                        <input type="input" id="avatar" class="form-ava" type="text">
                        <button class="btn-login-1 lfm toggle" data-input="avatar" data-preview="avatar_review" value="Upload"><i class="fa-solid fa-image"></i></button>
                    </div>
                </div>
                <div class="avatar-review">
                    <h3 class="title-info">Review ảnh đại diện</h3>
                    <div class="review_open"><img id="avatar_review" ></div>
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Update Vai Trò </h3>
                    <input  id="vai_tro" type="text">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Update mô tả vai trò </h3>
                    <input id="describe_vai_tro" type="text">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Update Họ và Tên </h3>
                    <input id="fullName" type="text">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Update thông tin để đăng nhập  </h3>
                    <input id="user_info" type="text">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Thay đổi email liên hệ </h3>
                    <input id="email" type="email">
                </div>
                <div class="footer-form">
                    <button id="submitUpdate" class="btn-login-1 toggle" type="submit">Save</button>
                    <button  class="btn-login-1" style="background: rgba(199, 5, 5, 0.904)" type="submit"><a target="_blank"  href="/resetPass">Security<i class="fas fa-user-lock"></i></a></button>
                </div>
            </div>
        </div>
@endsection
@section('js')
<script src="/FE/in4.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
@endsection
