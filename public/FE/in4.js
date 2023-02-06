$(document).ready(function(){
    $('.lfm').filemanager('image');
    $(".toggle").click(function(){
        $(".review_open").toggle();
      });
    $("#getIn4").click(function(){
        axios.get('/setting')
            .then((res)=>{
                    if(res.data.status == 200){
                        $("#vai_tro").val(res.data.data.vai_tro);
                        $("#describe_vai_tro").val(res.data.data.describe_vai_tro);
                        $("#fullName").val(res.data.data.fullName);
                        $("#user_info").val(res.data.data.user_info);
                        $("#avatar").val(res.data.data.avatar);
                    }
            })
    });

    $("#submitUpdate").click(function(){
        var vai_tro    = $("#vai_tro").val();
        var describe_vai_tro   = $("#describe_vai_tro").val();
        var fullName   = $("#fullName").val();
        var user_info   = $("#user_info").val();
        var avatar   = $("#avatar").val();

        var data = {
            'vai_tro'      :   vai_tro,
            'describe_vai_tro'     :   describe_vai_tro,
            'fullName'      :   fullName,
            'user_info'     :   user_info,
            'avatar'     :   avatar,
        }
        axios.post('/setting' , data)
            .then((res)=>{
                if(res.data.status == 200){
                    toastr.success('Cập nhập thành công thông tin của bạn!');
                    $("#vai_tro").val('');
                    $("#describe_vai_tro").val('');
                    $("#fullName").val('');
                    $("#user_info").val('');
                    $("#avatar").val('');
                }
            })
            .catch((res)=>{
                var danh_sach_loi = res.response.data.errors;
                $.each(danh_sach_loi, function (key, value) {
                    toastr.error(value[0]);
                });

            })
    })

});
