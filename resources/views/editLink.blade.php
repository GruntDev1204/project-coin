@extends('master')
@section('content')
    <div class="form-setting">
        <template v-for="(k,v) in dataLink " >
            <h3 class="Title">
                Edit all Link in Website   <i class="fa-solid fa-pen-to-square" v-on:click="getIdLink(k.id)"></i>
            </h3>
        </template>

        <div class="form-edit-intro">
            <div class="form-link">
                <div class="area-input">
                    <p class="title-form">Swaps</p>
                    <input type="text" v-model="arrayLink.Swaps" >
                </div>
                <div class="area-input">
                    <p class="title-form">Contract</p>
                    <input type="text"   v-model="arrayLink.Contract" >
                </div>
                <div class="area-input">
                    <p class="title-form">MarketPlace</p>
                    <input type="text"   v-model="arrayLink.Market" >
                </div>
                <div class="area-input">
                    <p class="title-form">GitLab</p>
                    <input type="text"   v-model="arrayLink.GitLab" >
                </div>
                <div class="area-input">
                    <p class="title-form">GitHub</p>
                    <input type="text"   v-model="arrayLink.GitHub" >
                </div>
                <div class="area-input">
                    <p class="title-form">TeleGram</p>
                    <input type="text"   v-model="arrayLink.TeleGram" >
                </div>
                <div class="area-input">
                    <p class="title-form">LinkAddress</p>
                    <input type="text"   v-model="arrayLink.LinkAddress" >
                </div>
                <div class="area-input">
                    <p class="title-form">Twitter</p>
                    <input type="text"   v-model="arrayLink.Twitter" >
                </div>
                <div class="area-input">
                    <p class="title-form">FB</p>
                    <input type="text"   v-model="arrayLink.Facebook" >
                </div>
                <div class="area-input">
                    <p class="title-form">Tiktok</p>
                    <input type="text"   v-model="arrayLink.Tiktok" >
                </div>
            </div>

        </div>
        <div class="button-submit"> <i class="fas fa-check" v-on:click="updateLink()">Save</i></div>
    </div>
@endsection
