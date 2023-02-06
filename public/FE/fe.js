new Vue({
    el: '#coinAdmin',
    data: {
        dataIntroduce : [],
        dataLink:[],

        arrayIntro: {
            id : 0,
            content : '',
            title_team : ''
        },

        arrayLink: {
            id : 0,
            Swaps : '',
            Contract : '',
            Market : '',
            GitLab : '',
            GitHub : '',
            TeleGram : '',
            Twitter : '',
            LinkAddress : '',
            Tiktok : '',
            Facebook : '',
        },


        arraySignUp:{
            fullName:'',
            password:'',
            re_password:'',
            ma_PIN: '',
            user_info:'',
        },
        arraySignin:{
            user_info:'',
            password:'',
            ma_PIN: '',
        }

    },
    created() {
          this.loadIntro()
          this.LoadLink()
    },
    methods: {
        //edit Info
        loadIntro(){
           axios.get('/api/Sndg/introduce')
                .then((res)=>{
                    this.dataIntroduce = res.data.dataIntroduce
                })
        },
        getId(id){
            axios.get('/setting/Introduce/idIntro/' + id)
            .then((res)=>{
                if(res.data.status){
                    this.arrayIntro = res.data.dataIntroduce
                }else{
                    alert('ụ má sida ròi')
                }
            })

        },
        updateIntro(){
                axios.post('/setting/Introduce/ChangeIntro/' , this.arrayIntro)
                .then((res)=>{
                    if(res.data.status){
                        alert('Change SuccessFully!');
                    }else{
                        alert('có lỗi rồi bạn?')
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (key, value) {
                        alert(value[0])
                    });
                });

        },

        //Link
        LoadLink(){
            axios.get('/api/Sndg/link')
                 .then((res)=>{
                     this.dataLink = res.data.dataLink
                 })
         },
         getIdLink(id){
            axios.get('/setting/Link/IdfixLink/' + id)
            .then((res)=>{
                if(res.data.status){
                    this.arrayLink = res.data.dataLink
                }else{
                    alert('ụ má sida ròi')
                }
            })

        },
        updateLink(){
            axios.post('/setting/Link/FixLink/' , this.arrayLink)
            .then((res)=>{
                if(res.data.status){
                    alert('Change SuccessFully!');
                }else{
                    alert('có lỗi rồi bạn?')
                }
            })
            .catch((res) => {
                $.each(res.response.data.errors, function (key, value) {
                    alert(value[0])
                });
            });
         },

        //admins
        conFigAdmins(){
            axios.post('/JoinSndg' , this.arraySignUp)
                .then((res)=>{
                    if(res.data.status){
                        alert('tao làm ròi nè')
                        alert(res.data.alert)
                        this.arraySignUp.fullName =''
                        this.arraySignUp.password =''
                        this.arraySignUp.re_password =''
                        this.arraySignUp.ma_PIN = ''
                        this.arraySignUp.user_info =''
                        setTimeout(function() {
                            $(location).attr('href', '/login');;
                          }, 3000);
                    }else{
                        alert('wtf')
                    }
                })
                .catch((res)=>{
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function (key, value) {
                        toastr.error(value[0]);
                    });

                })
        },

        LoginAction(){
            axios.post('/login' , this.arraySignin)
            .then((res)=>{
                if(res.data.status == 2){
                    toastr.success(res.data.alert)
                    setTimeout(function() {
                        $(location).attr('href', '/');;
                      }, 3000);
                }else if(res.data.status == 1){
                    toastr.warning(res.data.alert)
                }else{
                    toastr.error('đăng nhập sida');
                }
            })
        },
    }
})
