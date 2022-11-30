@extends('Admin.layouts.default')

@section('categories')
<main id="main" class="">
    <div class="pagetitle">
      <h1>Conference Categoriessssssss</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
        <div class="text-right">
          <button type="button" class="btn btn-info text-center" data-toggle="modal" data-target="#add_c">Add Category</button>
        </div>
          <!-- The Modal -->
          <div class="modal" id="add_c">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><b>Add Category</b></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="{{ url('category_store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Enter category Name">
                              </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                              <div class="form-check">
                                  <label class="form-check-label ml-2 mt-4">
                                      Active?
                                  </label>
                                  <input class="form-check-input mt-5 ml-n4" type="checkbox" id="status" name="status" value="1" checked>
                              </div>
                          </div>
                        </div>
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
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $c)
            <tr>
                <td>{{ $c->category }}</td>
                @if ($c->status == 1)
                    <td><span class="badge badge-primary">Active</span></td>
                @else
                    <td><span class="badge badge-danger">Inactive</span></td>
                @endif
                <td>
                  <a><i class="bi-pencil-fill mr-3 ml-2 text-primary" role='button' data-toggle="modal" data-target="#myModal{{ $c->id }}" style="font-size:16px;" title="EDIT"></i></a>
                  {{-- Edit Modal start --}}
                  <div class="modal" id="myModal{{ $c->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title"><b>Edit {{ $c->category }} Category</b></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{ url('category_update') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="hidden" name="id" value="{{ $c->id }}" >
                                        <input type="text" name="name" id="" value="{{ $c->category }}" class="form-control">
                                      </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                      <div class="form-check">
                                          <label class="form-check-label ml-2 mt-4">
                                              Active?
                                          </label>
                                          <input class="form-check-input mt-5 ml-n4" type="checkbox" id="status" name="status" value="1"
                                          @if ($c->status == 1)
                                                checked
                                          @endif
                                          >
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- Edit Modal end --}}
                  <a><i class="bi-trash-fill text-danger ml-3" role='button' style="font-size:16px;" title="DELETE" data-toggle="modal" data-target="#myModal{{ $c->id."d" }}"></i></a>
                  {{-- Delete modal start --}}
                  <div class="modal" id="myModal{{ $c->id."d" }}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title text-danger"><b>Delete Category</b></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <p class="mt-3 ml-3">Are you sure want to delete <b>{{ $c->category }}?</b></p>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <a type="button" href="category_delete/{{ $c->id }}" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- Delete modal end --}}
                </td>
            </tr>
            @endforeach
        </tbody>

      </table>
    </section>

  </main>

@endsection
