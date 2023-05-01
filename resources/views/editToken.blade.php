@extends('master')
@section('content')
    <div class="form-setting">

        <h3 class="Title">
            TokenData Fix <i class="fa-solid fa-pen-to-square" v-on:click="loadToken()"></i>

        </h3>
        <h3 class="Total"
            :style="{ color: sumOfLastFiveValues(arrayEditToken) != 100 ? '#ff3333' : '' }">
            <p>Total : @{{ sumOfLastFiveValues(arrayEditToken) }} %</p>
        </h3>


        <div class="form-edit-intro">
            <div class="area-input">
                <p class="title-form">IDO</p>
                <input type="number" v-model="arrayEditToken.IDO">
            </div>
            <div class="area-input">
                <p class="title-form">TeamWork</p>
                <input type="number" v-model="arrayEditToken.Farming">
            </div>
            <div class="area-input">
                <p class="title-form">Farming</p>
                <input type="number" v-model="arrayEditToken.TeamWork">
            </div>
            <div class="area-input">
                <p class="title-form">Air Drop</p>
                <input type="number" v-model="arrayEditToken.AirDrop">
            </div>
            <div class="area-input">
                <p class="title-form">Comunity</p>
                <input type="number" v-model="arrayEditToken.mkt_and_comunity">
            </div>
        </div>
        <div class="button-submit"> <i class="fas fa-check" v-on:click="updateToken()">Save</i></div>

    </div>
@endsection
