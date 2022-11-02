<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="{{ asset('Admin/img/favicon.png') }}" rel="icon">
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
    @media(max-width:768px){
        
    }
    </style>
</head>
<body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg nav">
        <a class="navbar-brand ml-4 logo" href="#">ConferenceDirect</a>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="login">
                    <label for="" class="text-white mr-2">Already have an account?</label>
                    <a type="button" href="{{ url('login') }}" class="btn btn-primary mr-2"><b>Signin</b></a>
                    <label for="" class="text-white mr-2">nor</label>
                    <a type="button" href="{{ url('register') }}" class="btn btn-primary mr-5"><b>Signup</b></a>
                </li>
            </ul>
    </nav>
    <!-- All Conferences -->
    <div class="container">
        <table class="table table-bordered mt-3">
            <tr class="table-primary">
                <th>
                    <h3 class="text-center all mt-1">Current Conferences</h3>
                </th>
                <th>
                    <form action="" method="post" class="">
                        <div class="form-group mt-1 mb-n2">
                            <select name="" id="" class="form-control font-weight-bold">
                                <option value="0">All category...</option>
                                @foreach($category as $c)
                                <option value="">{{ $c->category }}</option>
                                @endforeach
                            </select>
                        </div>
                </th>
                <th class="">
                        <div class="form-inline">
                            <input type="text" class="form-control ml-4 mt-1" placeholder="keyword">
                            <button type="submit" class="btn btn-primary ml-2 mt-1">Filter</button>
                        </div>
                    </form>
                </th>
            </tr>      
        </table>
        <table class="table table-striped table-hover table-bordered mt-n2">
            <tr class="table-info">
                <th>Conference Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Location</th>
                <th>Category</th>
            </tr>
            <tr>
                <td><a href="" data-toggle="modal" data-target="#myModal">Computer Speed</a></td>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Computer Speed</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Modal body..
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <td>10.10.2022</td>
                <td>12.10.2022</td>
                <td>Chittagong</td>
                <td>Computer</td>
            </tr>
            <tr>
                <td><a href="" data-toggle="modal" data-target="#myModal"> Computer Speed</a></td>
                <td>10.10.2022</td>
                <td>12.10.2022</td>
                <td>Chittagong</td>
                <td>Computer</td>
            </tr>
            <tr>
                <td><a href="" data-toggle="modal" data-target="#myModal"> Computer Speed</a></td>
                <td>10.10.2022</td>
                <td>12.10.2022</td>
                <td>Chittagong</td>
                <td>Computer</td>
            </tr>
        </table>
    </div>
</body>
</html>