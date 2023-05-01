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
         <h3>Xin chào thành viên mới : <i class="fa-solid fa-user logo"></i> {{$fullName}}  </h3>
        <h2>Đây là mã PIN để đăng nhập của bạn (Nên lưu lại để tránh phát sinh vấn đề ) : <button> <i class="fa-solid fa-lock "></i> {{$ma_PIN}} </button></h2>
    </div>

</body>
</html>

