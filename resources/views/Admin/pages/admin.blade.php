@extends('Admin.layouts.default')
@section('admin') 
<main id="main" class="">
  <div class="pagetitle">
    <h1>Conferences</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Conferences</li>
      </ol>
      <div class="text-right">
        <button type="button" class="btn btn-info text-center" data-toggle="modal" data-target="#myModal1">New Conference</button>
      </div>
        <!-- The Modal -->
        <div class="modal" id="myModal1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title"><b>New Conference</b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Conference Name">
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="10" rows="4" class="form-control"></textarea>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <label for="">Start Date</label>
                      <input type="date" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                      <label for="">End Date</label>
                      <input type="date" class="form-control" placeholder="Last name">
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <label for="">Location</label>
                    <input type="text" name="" id="" class="form-control" placeholder="Enter your conference location">
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
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>Premier University</td>
        <td>02.10.22</td>
        <td>02.10.22</td>
        <td><span class="badge badge-primary">Active</span></td>
        <td>
          <a href="http://"><i class="bi-pencil-fill mr-3 ml-2" style="font-size:16px;" title="EDIT"></i></a>
          <a href="http://"><i class="bi-trash-fill" style="font-size:16px;" title="DELETE"></i></a>
        </td>
      </tr>
    </table>
  </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection