@extends('Admin.layouts.default')

@section('categories')
<main id="main" class="">
    <div class="pagetitle">
      <h1>Conference Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
                <button type="button" class="btn btn-info text-center " id="add_button">Add Category</button>
            </ol>
        </nav><!-- End Page Title -->
    </div>
    <section class="section dashboard">
        <div id="table">
            <table class="table table-bordered table-hover" id="category_datatable">
                <thead class="">
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="">

                </tbody>
            </table>
        </div>
    </section>
</main>

{{-- All modal(add,delete,edit) --}}
<!--Add category Modal -->
<div class="modal" id="add_c">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"><b>Add Category</b></h4>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ url('admin/category_store') }}" method="post" id="addform">
            @csrf
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="category" id="" class="form-control" placeholder="Enter category Name">
                        <span class="text-danger error-text category_error"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label ml-2 mt-4">
                                Active?
                            </label>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input mt-5 ml-n4" type="checkbox" id="status" name="status" value="1" checked>
                            <span class="text-danger mt-3 error-text status_error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!--Add category modal end -->

{{-- Edit modal start --}}
<div class="modal" id="edit_c">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit <span class="category text-success"></span> Category</b></h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form action="{{ URL::to('admin/category_update') }}" method="post" id="editform">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="categoryid" name="categoryid">
                            <label for="">Name</label>
                            <input type="text" name="category" id="category" class="form-control">
                            <span class="text-danger error-text category_error"></span>
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label ml-2 mt-4">
                                Active?
                            </label>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input mt-5 ml-n4" type="checkbox" id="edit_status" name="status" value="1">
                            <span class="text-danger error-text status_error"></span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js" defer></script>
    <link href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var table = $('#category_datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    oLanguage: {sProcessing: "<div id='loader'></div>"},
                    ajax: "{{ route('admin.categories') }}",
                    columns: [
                        {data: 'category', name: 'category'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
            });
            $('th').css('background','#e9ecef');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-start',
                showConfirmButton: false,
                timer: 4000,
                background: '#1B1212',
                color: 'white',
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            //add modal open and add category start
            $("#add_button").click(function (e) {
                e.preventDefault();
                $('#add_c').modal('toggle');
            });
            $('#addform').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    beforeSend:function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data){
                        if(data.is_error == 1){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $('#add_c').modal('hide');
                            $('#addform').trigger("reset");
                            Toast.fire({
                            icon: 'success',
                            title: 'Category created successfully.'
                            })
                            $('#category_datatable').DataTable().ajax.reload();
                        }
                    }
                });
            });
            //add modal open and add category end

            //edit modal open and edit category start
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var category = $(this).data('category');
                var status = $(this).data('status');
                $('.error-text').text('');
                $('#edit_c').modal('show');
                $('#category').val(category);
                $(".category").text(category);
                if(status==1){
                    $('#edit_status').prop('checked', true);
                }else{
                    $('#edit_status').prop('checked', false);
                }
                $('#categoryid').val(id);
            });

            $('#editform').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.post(url,form,function(data){
                    if(data.is_error == 1){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('#edit_c').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Category updated successfully.'
                        })
                        $('#category_datatable').DataTable().ajax.reload();
                    }
                })
            });
            //edit modal open and edit category end

            //delete swal modal open and delete category start
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var category = $(this).data('category');
                Swal.fire({
                    title: "Delete category",
                    icon: "warning",
                    html: ("Are you sure want to delete <b>"+ category +"</b>?"),
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: "Delete",
                })
                    .then(function (isConfirm) {
                        if (isConfirm.value) {
                                $.post("{{ URL::to('admin/category_delete') }}",{id:id}, function(){
                                    $('#category_datatable').DataTable().ajax.reload();
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Category deleted successfully.'
                                    })
                                })
                        }else{
                            $('#category_datatable').DataTable().ajax.reload();
                        }
                        });
            });
            //delete swal modal open and delete category end
        });
    </script>
@endpush
