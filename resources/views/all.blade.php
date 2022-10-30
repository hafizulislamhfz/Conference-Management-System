<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700,800');
    @import url('https://fonts.googleapis.com/css?family=Lobster');
    .logo{
    font-family: 'Lobster', sans-serif;
    color:#fff;
    font-size: 1.5rem;
    font-weight: 700;
    }
    .logo:hover{
    color:#FFE4E1;
    }
    .all{
    font-weight: 700; 
    }
    .nav{
        background: #0c469c;
    }
    .login{
        margin-right:300px;
    }
    #login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:#FFF5EE;
    }
    #login-dp:hover{
    background-color:#F5F5DC;
    }
    #login-dp .help-block{
        font-size:12px    
    }
    #login-dp .bottom{
        background-color:rgba(255,255,255,.8);
        border-top:1px solid #ddd;
        clear:both;
        padding:14px;
    }
    #login-dp .social-buttons{
        margin:12px 0    
    }
    #login-dp .social-buttons a{
        width: 49%;
    }
    #login-dp .form-group {
        margin-bottom: 10px;
    }
    .btn-fb{
        color: #fff;
        background-color:#3b5998;
    }
    .btn-fb:hover{
        color: #fff;
        background-color:#496ebc 
    }
    .btn-tw{
        color: #fff;
        background-color:#55acee;
    }
    .btn-tw:hover{
        color: #fff;
        background-color:#59b5fa;
    }
    @media(max-width:768px){
        .login{
        margin-right:200px;
        }
        #login-dp{
            background-color: inherit;
            color: #fff;
        }
        #login-dp .bottom{
            background-color: inherit;
            border-top:0 none;
        }
    }
    </style>
</head>
<body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg nav">
        <a class="navbar-brand ml-4 logo" href="#">ConferenceDirect</a>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="dropdown">
                    <button href="#" class="dropdown-toggle btn btn-primary login" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></button>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                    <div class="col-md-12">
                                        Login via
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        or
                                        <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                    <div class="help-block text-left mt-2">
                                                    <label class="mr-5">
                                                        <input type="checkbox"> keep me logged-in
                                                    </label>
                                                        <a href="" class="ml-5">Forget the password ?</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                                
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="{{ url('register') }}"><b>Register</b></a>
                                    </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
    </nav>
    <!-- All Conferences -->
    <div class="container">
        <table class="table table-bordered mt-3">
            <tr class="table-primary">
                <th>
                    <h3 class="text-center all">Current Conferences</h3>
                </th>
                <th class="">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                        <form class="form-inline" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control ml-4 mt-1" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-primary ml-3">Search</button>
                            </form>
                        </div>
                    </div>
                </th>
            </tr>      
        </table>
        <table class="table table-striped table-hover table-bordered mt-n2">
            <tr class="table-info">
                <th>Conference Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Topic</th>
            </tr>
            <tr>
                <td>Computer Speed</td>
                <td>10.10.2022</td>
                <td>12.10.2022</td>
                <td>Computer</td>
            </tr>
            <tr>
                <td>Computer Speed</td>
                <td>10.10.2022</td>
                <td>12.10.2022</td>
                <td>Computer</td>
            </tr>
            <tr>
                <td>Computer Speed</td>
                <td>10.10.2022</td>
                <td>12.10.2022</td>
                <td>Computer</td>
            </tr>
        </table>
    </div>
</body>
</html>