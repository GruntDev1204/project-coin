@extends('master')
@section('content')
<div class="form-manager-admins">
    <template v-for="(v,k) in listMember">
        <div class="admin-info">
            <div class="img-avatar"><img v-bind:src="v.avatar" ></div>
            <p>ID : @{{v.id}} </p>
            <p>Member : @{{v.fullName}} </p>
            <p>Email : @{{v.email}} </p>
            <p>Tình trạng cấp phép  :  <i  v-on:click="allowed(v.id)" v-if="v.is_allow" class="fa-solid fa-lock-open allowed"></i>
                                       <i  v-on:click="allowed(v.id)" v-else class="fa-solid fa-lock locked"></i>
            </p>
        </div>
    </template>
</div>
@endsection
