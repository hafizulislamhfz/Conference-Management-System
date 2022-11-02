@extends('Admin.layouts.default')

@section('users')
<main id="main" class="">
  <div class="pagetitle">
    <h1>Admin Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
      <div class="text-right">
        <button type="button" class="btn btn-info text-center" data-toggle="modal" data-target="#myModal1">New User</button>
      </div>
        <!-- The Modal -->
        <div class="modal" id="myModal1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title"><b>Add User</b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="" id="" class="form-control" placeholder="Enter email">
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <label for="">Phone</label>
                      <input type="text" class="form-control" placeholder="Enter phone">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label ml-2 mt-4">
                                    Active?
                                </label>
                                <input class="form-check-input mt-5 ml-n4" type="checkbox" id="status">                          
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <label for="">Address</label>
                    <textarea name="email" id="" cols="10" rows="4" class="form-control"></textarea>
                  </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal end -->
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>Hafizul Islam</td>
        <td>hafizul@gmail.com</td>
        <td>01791-129562</td>
        <td><span class="badge badge-primary">Active</span></td>
        <td>
          <a href="http://"><i class="bi-pencil-fill mr-3 ml-2" style="font-size:16px;" title="EDIT"></i></a>
          <a href="http://"><i class="bi-trash-fill" style="font-size:16px;" title="DELETE"></i></a>
        </td>
      </tr>
    </table>
  </section>

</main><!-- End #main -->

@endsection