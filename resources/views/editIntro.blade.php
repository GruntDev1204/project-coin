@extends('master')
@section('content')
    <div class="form-setting">
        <template v-for="(k,v) in dataIntroduce " >
            <h3 class="Title">
                Introduce Fix   <i class="fa-solid fa-pen-to-square" v-on:click="getId(k.id)"></i>
            </h3>
        </template>

        <div class="form-edit-intro">
            <div class="area-input">
                <p class="title-form">Title</p>
                <input type="text" v-model="arrayIntro.title_team">
            </div>
            <div class="area-text">
                <p class="title-form">Content(about SNDG)</p>
                <textarea type="text" cols="10" rows="10" v-model="arrayIntro.content"></textarea>
            </div>
        </div>
        <div class="button-submit"> <i class="fas fa-check" v-on:click="updateIntro()">Save</i></div>
    </div>
@endsection
