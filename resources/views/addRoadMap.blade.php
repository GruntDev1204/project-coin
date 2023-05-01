@extends('master')
@section('content')
    <div class="area-RM">
        <div class="form-edit-RM">
            <div class="form-change-In4 ">
                <h3 class="title-in4"> New RoadMap </h3>
                <div class="area-changeInfo">
                    <h3 class="title-info">Phase </h3>
                    <input v-model="ArrayRM.phase" type="text">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Title</h3>
                    <input v-model="ArrayRM.title" type="text">
                </div>
                <div class="area-changeInfo">
                    <div class="footer-form"><button v-on:click="createRm()" class="btn-login-1" type="submit">Add
                            New</button></div>
                </div>
            </div>


            <div class="form-change-In4 ">
                <h3 class="title-in4"> New todoList </h3>
                <div class="area-changeInfo">
                    <h3 class="title-info">Content </h3>
                    <input type="text" v-model="arrayToDo.content">
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Id RM </h3>
                    <select v-model="arrayToDo.id_RM" class="custom-select ">
                        <template v-for="(value, key) in listRM">
                            <option v-bind:value="value.id">@{{ value.phase }}</option>
                        </template>
                    </select>
                </div>
                <div class="area-changeInfo">
                    <h3 class="title-info">Done?</h3>
                    <select v-model="arrayToDo.is_done" class="custom-select ">
                        <option value=0>Not Done</option>
                        <option value=1> Done</option>
                    </select>
                </div>
                <div class="area-changeInfo">
                    <div class="footer-form"><button v-on:click="createList()" class="btn-login-1" type="submit">Add
                            New</button></div>
                </div>
            </div>
        </div>
        <div class="form-edit-RM">
            <div class="list-RM">
                <h3 class="title-in4"> List RoadMap </h3>
                <template v-for="(todos, id) in ListTodo">
                        <div class="card" >
                            <div class="card-header">
                                <b> </b>
                                <b>#@{{ todos[0] . id_RM }} : @{{ todos[0] . phase }}</b>
                            </div>
                            <div class="card-body">
                                    <div class="content-body"  v-for="todo in todos" :key="todo.id">
                                       <p> # @{{ todo . id }} : </p>
                                       <p>@{{ todo . content }} </p>
                                        <i class="fas fa-check" v-on:click="changeActionList(todo.id)" v-if="todo.is_done == 1"></i>
                                        <i class="fas fa-x" v-on:click="changeActionList(todo.id)" v-else></i>
                                        <i class="fas fa-trash" v-on:click="deleteList(todo.id)"></i>
                                    </div class="content-body" >
                            </div>
                        </div>
                </template>
                <h3 class="title-in4"> List Phase </h3>
                <template v-for="(v, k) in listRM">
                    <div class="card" >
                        <div class="card-header">
                            <b>#@{{ k+ 1}} : @{{v.phase}}</b>
                        </div>
                        <div class="card-body">
                                <div class="content-body" >
                                     <b>@{{v.title}} </b>
                                    <p>@{{ formatDate(v . created_at)}} </p>
                                    <i class="fas fa-trash" v-on:click="deleteRM(v.id)"></i>
                                </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>
@endsection
