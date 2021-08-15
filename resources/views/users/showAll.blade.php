@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('rutas') }}</div>

                <div class="card-body">
                    <ul id="user">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')    
<script>
    window.addEventListener("load",function(){
        console.log("Dom cargadocorrectamente")
        axios.get("/api/user")
                .then(res => {
                    let userElement = document.getElementById("user");
                    let users=res.data;
                    users.forEach((user,index) => {
                        const element = document.createElement("li");
                        element.setAttribute("id",users.id);
                        element.innerText=user.name;
                        userElement.appendChild(element);
                    });
                })
                .catch(err => {
                    console.error(err); 
                });
    
    });
    Echo.channel('usuarios').listen('UserCreated',(e)=>{
                    let userElement = document.getElementById("user");
                    let element = document.createElement("li");
                       
                        element.setAttribute("id",e.users.id);
                       
                        element.innerText=e.user.name;
                       
                        userElement.appendChild(element);
    
                }).listen("UserUpdated",(e)=>{
                    let element = document.getElementById(e.user.id);
                      
                    element.innerText=e.user.name;
    
                }).listen("UserDelated",(e)=>{
                    let element = document.getElementById(e.user.id);
                    element.parentNode.removeChild(element);
                });  
    </script>
@endpush
