<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="/FE/fe.css">
    <link rel="stylesheet" href="/FE/cssComponent/Component.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
    <title>Control Page</title>
</head>
<body>
    <div class="head">
      <div class="head-content">
        <ul>
            <li><a href="/setting/Introduce/form">Edit Info</a> </li>
            <li>Edit Token </li>
            <li>Edit RoadMap </li>
            <li>Add Member </li>
            <li><a href="/setting/Link/form">Edit Link</a> </li>

        </ul>
      </div>
      <div class="head-info">
          <div class="avatar"><img class="avatar" src="https://manluxury.vn/wp-content/uploads/2021/11/bad-boy-la-gi.jpeg"></div>
          <div class="info-admin">
            <p class="name-admin">Ho Trung</p>
            <p class="detail-admin">CEO</p>
          </div>
      </div>
    </div>
    <div class="boddy container" id="coinAdmin">
        @yield('content')
    </div>
</body>
@yield('Vuejs')
<script src="/FE/fe.js"></script>
</html>
