@extends('Admin.layouts.default')
@section('title','Conference | Categories')
@section('categories')
<main id="main" class="">
    <div class="pagetitle">
      <h1>Conference Categories</h1>
        <div class="nav-container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="{{ url('admin/conference') }}">Conference</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
            <button type="button" class="btn btn-info text-center add_button" id="add_button">Add Category</button>
        </div>
    </div><!-- End Page Title -->
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
        <div class="modal-content add-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"><b>Add Category</b></h4>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body add-body">
            <form action="{{ url('admin/category_store') }}" method="post" id="addform">
            @csrf
            <div class="form-row">
                <div class="col">
                    <div class="form-floating">
                        {{-- <label for="">Name</label> --}}
                        <input type="text" name="category" id="" class="form-control" placeholder="Category Name">
                        <label for="">Category Name</label>
                        <span class="text-danger error-text category_error"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label ml-2">
                                Active?
                            </label>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input mt-4 ml-n4" type="checkbox" id="status" name="status" value="1" checked>
                            <span class="text-danger mt-3 error-text status_error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary add-btn" id="">Add</button>
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
        <div class="modal-content edit-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit <span class="category text-success"></span> Category</b></h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body edit-body">
            <form action="{{ URL::to('admin/category_update') }}" method="post" id="editform">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <div class="form-floating">
                            <input type="hidden" id="categoryid" name="categoryid">
                            <input type="text" name="category" id="category" class="form-control" placeholder="Category Name">
                            <label for="">Category Name</label>
                            <span class="text-danger error-text category_error"></span>
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label ml-2 ">
                                Active?
                            </label>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input mt-4 ml-n4" type="checkbox" id="edit_status" name="status" value="1">
                            <span class="text-danger error-text status_error"></span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary edit-btn">Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
            // add a refresh button in DataTable
            $('<button class="btn refresh ml-2 mt-n1"><i class="bi bi-arrow-clockwise" title="Refresh"></i></button>').appendTo('div.dataTables_filter');
            $('.refresh').click(function(){
                $('#category_datatable').DataTable().ajax.reload();
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
                $('.error-text').text('');
                $('#add_c').modal('toggle');
            });
            $('#addform').on('submit', function(e){
                e.preventDefault();
                // var sppiner = '<div class="spinner-border text-light"></div>';
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $('.add-content').addClass('waitloader');
                $('.add-btn').prop('disabled', true);
                $('.add-body').css('opacity', 0);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    beforeSend:function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data){
                        $('.add-content').removeClass('waitloader');
                        $('.add-body').css('opacity', 1);
                        $('.add-btn').removeAttr('disabled');
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
                var currentPageIndex = $('#category_datatable').DataTable().page();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $('.edit-body').css('opacity', 0);
                $('.edit-content').addClass('waitloader');
                $('.edit-btn').prop('disabled', true);
                $.post(url,form,function(data){
                    $('.edit-content').removeClass('waitloader');
                    $('.edit-body').css('opacity', 1);
                    $('.edit-btn').removeAttr('disabled');
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
                        $('#category_datatable').DataTable().page(currentPageIndex).draw(false);
                    }
                })
            });
            //edit modal open and edit category end

            //delete swal modal open and delete category start
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var currentPageIndex = $('#category_datatable').DataTable().page();
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
                                    $('#category_datatable').DataTable().page(currentPageIndex).draw(false);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Category deleted successfully.'
                                    })
                                })
                        }else{
                            $('#category_datatable').DataTable().page(currentPageIndex).draw(false);
                        }
                    });
            });
            //delete swal modal open and delete category end
        });
    </script>
@endpush
