new Vue({
    el: '#coinAdmin',
    data: {
        dataIntroduce: [],
        dataLink: [],
        listRM: [],
        ListTodo: [],
        arrayROADMAP: [],
        tokentotal: 0,

        ArrayRM: {
            phase: '',
            title: '',
        },

        arrayToDo: {
            content: '',
            id_RM: 0,
            is_done: 0,
        },

        arrayIntro: {
            id: 0,
            content: '',
            title_team: ''
        },

        arrayLink: {
            id: 0,
            Swaps: '',
            Contract: '',
            Market: '',
            GitLab: '',
            GitHub: '',
            TeleGram: '',
            Twitter: '',
            LinkAddress: '',
            Tiktok: '',
            Facebook: '',
        },


        arraySignUp: {
            fullName: '',
            password: '',
            re_password: '',
            ma_PIN: '',
            user_info: '',
            email: '',
        },
        arraySignin: {
            user_info: '',
            password: '',
            ma_PIN: '',
        },

        arrayEditToken: {
            IDO: 0,
            Farming: 0,
            TeamWork: 0,
            AirDrop: 0,
            mkt_and_comunity: 0,

        },

        listMember: [],

    },
    created() {
        this.loadIntro()
        this.LoadLink()
        this.LoadAllmember()
        this.loadRM()
        this.loadList()
        this.loadToken()

    },
    methods: {

        //tokenomics
        loadToken() {
            axios.get('/setting/tokenomics/data/')
                .then((res) => {
                    this.arrayEditToken = res.data.dataToken
                })
        },

        updateToken() {
            axios.post('/setting/tokenomics/formEdit/', this.arrayEditToken)
                .then((res) => {
                    this.tokentotal = res.data.total
                    toastr.success(res.data.mess);
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (key, value) {
                        toastr.error(value[0])
                    });
                });

        },

        sumOfLastFiveValues(obj) {
            const values = Object.values(obj);
            const lastFiveValues = values.slice(-5);
            let sum = 0;
            for (let i = 0; i < lastFiveValues.length; i++) {
                sum += -(- lastFiveValues[i]);
            }
            return sum;
        },
        //Intro
        loadIntro() {
            axios.get('/api/Sndg/introduce')
                .then((res) => {
                    this.dataIntroduce = res.data.dataIntroduce
                })
        },
        getId(id) {
            axios.get('/setting/Introduce/idIntro/' + id)
                .then((res) => {
                    if (res.data.status) {
                        this.arrayIntro = res.data.dataIntroduce
                    } else {
                        alert('ụ má sida ròi')
                    }
                })

        },
        updateIntro() {
            axios.post('/setting/Introduce/ChangeIntro/', this.arrayIntro)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success('Change SuccessFully!');
                    } else {
                        toastr.error('lỗi!');
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (key, value) {
                        toastr.error(value[0])
                    });
                });

        },

        //Link
        LoadLink() {
            axios.get('/api/Sndg/link')
                .then((res) => {
                    this.dataLink = res.data.dataLink
                })
        },
        getIdLink(id) {
            axios.get('/setting/Link/IdfixLink/' + id)
                .then((res) => {
                    if (res.data.status) {
                        this.arrayLink = res.data.dataLink
                    } else {
                        alert('ụ má sida ròi')
                    }
                })

        },
        updateLink() {
            axios.post('/setting/Link/FixLink/', this.arrayLink)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success('Change SuccessFully!');

                    } else {
                        alert('có lỗi rồi bạn?')
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (key, value) {
                        toastr.error(value[0])
                    });
                });
        },

        //admins
        conFigAdmins() {
            axios.post('/JoinSndg', this.arraySignUp)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.alert)
                        alert('vui lòng truy cập email đã đăng kí để nhận hoặc xác nhận lại mã PIN đăng nhập!')
                        this.arraySignUp.fullName = ''
                        this.arraySignUp.password = ''
                        this.arraySignUp.re_password = ''
                        this.arraySignUp.ma_PIN = ''
                        this.arraySignUp.user_info = ''
                        this.arraySignUp.email = ''

                        setTimeout(function () {
                            $(location).attr('href', '/login');;
                        }, 3000);
                    } else {
                        toastr.error('errors')
                    }
                })
                .catch((res) => {
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function (key, value) {
                        toastr.error(value[0]);
                    });

                })
        },

        LoginAction() {
            axios.post('/login', this.arraySignin)
                .then((res) => {
                    if (res.data.status == 2) {
                        toastr.success(res.data.alert)
                        setTimeout(function () {
                            $(location).attr('href', '/setting/Introduce/form');;
                        }, 3000);
                    } else if (res.data.status == 1) {
                        toastr.warning(res.data.alert)
                    } else {
                        toastr.error('Login không thành công! ');
                        toastr.warning('Vui lòng kiểm tra lại thông tin đăng nhập ');
                    }
                })
                .catch((res) => {
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function (key, value) {
                        toastr.error(value[0]);
                    });

                })
        },

        //manager admins
        allowed(id) {
            axios.get('/allowed/' + id)
                .then((res) => {
                    if (res.data.status == 200) {
                        res.data.action ? toastr.success('allowed') : toastr.warning('locked');
                        this.LoadAllmember()
                    }
                })
        },
        LoadAllmember() {
            axios.get('/listMember')
                .then((res) => {
                    if (res.data.status) {
                        this.listMember = res.data.dataInfoManager
                    }
                })
        },


        //addRM
        createRm() {
            axios.post('/setting/RM/addRM', this.ArrayRM)
                .then((res) => {
                    if (res.data.status == 200) {
                        toastr.success(res.data.alert)
                        this.loadRM()
                        this.ArrayRM.title = ''
                        this.ArrayRM.phase = ''
                    }
                })
                .catch((res) => {
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function (key, value) {
                        toastr.error(value[0]);
                    });

                })
        },


        loadRM() {
            axios.get('/setting/RM/listRM')
                .then((res) => {
                    if (res.data.status == 200) {
                        this.listRM = res.data.dataRM
                    }
                })
        },


        deleteRM(id) {
            axios.get('/setting/RM/deletedRM/' + id)
                .then((res) => {
                    if (res.data.status == 200) {
                        // this.ListTodo = this.ListTodo.filter(todo => todo.id_RM !== id);
                        this.loadRM();
                        toastr.success(res.data.alert);
                    }
                })

        },


        //toDoList
        createList() {
            axios.post('/setting/RM/addList', this.arrayToDo)
                .then((res) => {
                    if (res.data.status == 200) {
                        toastr.success(res.data.alert)
                        this.loadList()
                    }
                })
                .catch((res) => {
                    var danh_sach_loi = res.response.data.errors;
                    $.each(danh_sach_loi, function (key, value) {
                        toastr.error(value[0]);
                    });

                })
        },
        loadList() {
            axios.get('/setting/RM/indexList')
                .then((res) => {
                    if (res.data.status == 200) {
                        this.ListTodo = res.data.dataLists
                    }
                })
        },
        deleteList(id) {
            axios.get('/setting/RM/deleteList/' + id)
                .then((res) => {
                    if (res.data.status == 200) {
                        toastr.success(res.data.alert)
                        this.loadList()
                    } else {
                        toastr.error(res.data.alert)

                    }
                })

        },
        changeActionList(id) {
            axios.get('/setting/RM/doneList/' + id)
                .then((res) => {
                    if (res.data.status == 200) {
                        res.data.action ? toastr.success('done') : toastr.warning('notDone');
                        this.loadList()
                    } else {
                        toastr.error(res.data.action)
                    }
                })
        },



        formatDate(datetime) {
            const input = datetime;
            const dateObj = new Date(input);
            const year = dateObj.getFullYear();
            const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
            const date = dateObj.getDate().toString().padStart(2, '0');

            const result = `${date}/${month}/${year}`;

            return result;
        },
    }
})
