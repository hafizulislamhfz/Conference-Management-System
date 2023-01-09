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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('Home/style.css') }}">
</head>
<body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top nav-color">
        <a class="navbar-brand ml-4 logo" href="#">ConferenceDirect</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <label for="" class="text-white mr-2">Already have an account?</label>
            <a type="button" href="{{ url('login') }}" class="btn btn-primary mr-2"><b>Signin</b></a>
            <label for="" class="text-white mr-2">nor</label>
            <a type="button" href="{{ url('register') }}" class="btn btn-primary mr-5"><b>Signup</b></a>
          </form>
        </div>
    </nav>
    <!-- All Conferences -->
    <div class="container">
        <section class="search-nav">
            <div class="content">
                <ul class="nav nav-pills bg-info">
                    <li class="nav-item">
                        <h3 class="text-center all">Current Conferences</h3>
                    </li>
                    <form action="" method="post" class="">
                        <li class="nav-item">
                            <div class="form-inline">
                                <select name="" id="" class="form-control font-weight-bold">
                                    <option value="0">Filter category...</option>
                                    @foreach($category as $c)
                                    <option value="">{{ $c->category }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" placeholder="keyword">
                                <button type="button" class="btn btn-danger">Reset</button>
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
        </section>
        <table class="table table-striped table-hover table-bordered mt-2">
            <thead>
                <tr class="table-info">
                    <th>Conference Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>

        </table>
    </div>
</body>
</html>
