<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./FE/cssComponent/mail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <div class="title">
         <img src="./1.png" ><p>SNDG TEAM</p>
    </div>
    <div class="content">
         <h3>Xin chào thành viên  : <i class="fa-solid fa-user logo"></i> {{$fullName}}  </h3>
         <h3>Mã xác nhận của bạn : {{$code}}  - tuyệt đối không chia sẻ mã này cho người ngoài! </h3>
         <h2>bạn đang thay đổi mật khẩu của mình, tài khoản có email là {{$email}}, tiếp tục thao tác thay đổi mật khẩu :  <a href="http://127.0.0.1:8001/checkAction/{{$hash}}" target="_blank"><i class="fa-solid fa-lock "></i> xác nhận</a> </h2>
    </div>

</body>
</html>

