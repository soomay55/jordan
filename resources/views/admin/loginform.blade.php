<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #ee5a1b;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 60%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
    </style>
<!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
</head>
<body>
    

<div class="sidenav">
         <div class="login-main-text">
           
            {{-- <p>Login to access.</p> --}}
            <div>
                <img src="{{url("images/logo.png")}}" alt="" style="width:80%;height:auto">
            </div>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            {{-- <div>
                <img src="{{url("images/logo.png")}}" alt="" style="width:80%;height:auto">
            </div> --}}
            
            <div class="login-form">
                <h2>Admin Login</h2>
               <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="email" class="form-control" placeholder="User Name">
                    @error('email')
                        <font color="red">{{$message}}</font>
                        @enderror
                    
                    </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     @error('password')
                     <font color="red">{{$message}}</font>
                     @enderror
                    </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  {{-- <button type="submit" class="btn btn-secondary">Register</button> --}}
               </form>
            </div>
         </div>
      </div>
</body>
</html>