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
    }
})
