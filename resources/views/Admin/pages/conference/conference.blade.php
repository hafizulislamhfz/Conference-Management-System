@extends('Admin.layouts.default')
@section('title','Home | Conferences')
@section('conference')
    <main id="main" class="">
        <div class="pagetitle">
            <h1>Conferences</h1>
            <div class="nav-container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">All Conferences</li>
                </ol>
                <button type="button" id="add_button" class="btn btn-info text-center add_button">New Conference</button>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div id="table">
                <table class="table table-bordered table-hover" id="conference_datatable">
                    <thead class="">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Start Date</th>
                            <th>End Date</th>
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
    <!-- End #main -->


    {{-- All modal start(Show,add,edit,delete) --}}
    <!-- Show Modal start-->
    <div class="modal" id="show_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><b>Conference Details</b></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Name</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_name" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Category</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_category" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Description</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_description" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Website</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <a id="show_website" class="mb-0" href="" target="_blank"></a>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Location</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_location" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Status</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_status" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Start date</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_start_date" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Submission date</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_sub_date" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>End date</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_end_date" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Created at</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_created" class="mb-0"></p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-4">
                                <h5>Modified at</h5>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-7">
                                <p id="show_updated" class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="button-container"></div>
                        {{-- <button type="button" class="btn btn-primary editfromshow" id="editfromshow">Edit</button> --}}
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- Show modal end -->


    <!-- Add Modal start-->
    <div class="modal" id="new-conf">
        <div class="modal-dialog">
            <div class="modal-content add-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title"><b>New Conference</b></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="{{ url('admin/conference_store') }}" method="post" id="addform">
                    @csrf
                    <div class="modal-body add-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="Enter Conference Name" >
                                <label for="">Conference Name</label>
                                <span class="text-danger error-text mt-2 name_error"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="category" id="" class="form-control font-weight-bold" >
                                    <option value="0">Select category...</option>
                                    @foreach ($category as $c)
                                        <option value="{{ $c->category }}">{{ $c->category }}</option>
                                    @endforeach
                                </select>
                                <label for="">Category</label>
                                <span class="text-danger error-text mt-2 category_error"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" id="" style="height: 100px" class="form-control" ></textarea>
                                <label for="">Description</label>
                                <span class="text-danger error-text mt-2 description_error"></span>
                            </div>
                            <div class="form-row">
                                <div class="col-4 form-floating mb-3">
                                    <input type="date" name="sub_date" class="form-control" >
                                    <label for="">Submission Date</label>
                                    <span class="text-danger error-text mt-2 sub_date_error"></span>
                                </div>
                                <div class="col-4 form-floating mb-3">
                                    <input type="date" name="start_date" class="form-control" >
                                    <label for="">Start Date</label>
                                    <span class="text-danger error-text mt-2 start_date_error"></span>
                                </div>
                                <div class="col-4 form-floating mb-3">
                                    <input type="date" name="end_date" class="form-control" >
                                    <label for="">End Date</label>
                                    <span class="text-danger error-text mt-2 end_date_error"></span>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="location" id="" class="form-control"
                                    placeholder="location" >
                                <label for="">Location</label>
                                <span class="text-danger error-text mt-2 location_error"></span>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary add-btn">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add modal end -->

    <!-- Edit Modal start-->
    <div class="modal" id="edit-conf">
        <div class="modal-dialog">
            <div class="modal-content edit-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><b>Edit <span class="name_title text-success"></span> Conference</b></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="{{ url('admin/conference_update') }}" method="post" id="editform">
                    @csrf
                    <div class="modal-body edit-body">
                            <div class="form-floating mb-3">
                                <input type="hidden" id="conferenceid" name="conferenceid">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter Conference Name" >
                                <label for="">Conference Name</label>
                                <span class="text-danger error-text mt-2 name_error"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="category" id="category" class="form-control font-weight-bold" >
                                    @foreach ($category as $c)
                                        <option value="{{ $c->category }}">{{ $c->category }}</option>
                                    @endforeach
                                </select>
                                <label for="">Category <em class="inactive_category text-danger"></em></label>
                                <span class="text-danger error-text mt-2 category_error"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="description" id="description" style="height: 100px" class="form-control" ></textarea>
                                <label for="">Description</label>
                                <span class="text-danger error-text mt-2 description_error"></span>
                            </div>
                            <div class="form-row">
                                <div class="col-4 form-floating mb-3">
                                    <input type="date" name="sub_date" id="sub_date" class="form-control" >
                                    <label for="">Submission Date</label>
                                    <span class="text-danger error-text mt-2 sub_date_error"></span>
                                </div>
                                <div class="col-4 form-floating mb-3">
                                    <input type="date" name="start_date" id="start_date" class="form-control" >
                                    <label for="">Start Date</label>
                                    <span class="text-danger error-text mt-2 start_date_error"></span>
                                </div>
                                <div class="col-4 form-floating mb-3">
                                    <input type="date" name="end_date" id="end_date" class="form-control" >
                                    <label for="">End Date</label>
                                    <span class="text-danger error-text mt-2 end_date_error"></span>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="url" id="url" class="form-control"
                                    placeholder="url" >
                                <label for="">Website</label>
                                <span class="text-danger error-text mt-2 url_error"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="location" >
                                <label for="">Location</label>
                                <span class="text-danger error-text mt-2 location_error"></span>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="form-check form-switch mr-5">
                            <label class="form-check-label text-primary mr-5" for="status">Publish:</label>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary edit-btn">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit modal end -->
@endsection


@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#conference_datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 1, 'asc' ]],
                oLanguage: {
                    sProcessing: "<div id='loader'></div>"
                },
                ajax: "{{ route('admin.conference') }}",
                columns: [{
                        "data": "id",
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('th').css('background', '#e9ecef');
            // add a refresh button in DataTable
            $('<button class="btn refresh ml-2 mt-n1"><i class="bi bi-arrow-clockwise" title="Refresh"></i></button>')
                .appendTo('div.dataTables_filter');
            $('.refresh').click(function() {
                $('#conference_datatable').DataTable().ajax.reload();
            });

            // function datatablereload(data){
            //     var dataTable = $('#conference_datatable').DataTable();
            //     dataTable.ajax.reload(function() {
            //         var createdRowIndex = dataTable.column('name:name').data().toArray().indexOf(data.id);
            //         var pageLength = dataTable.page.len();
            //         var pageNumber = Math.floor(createdRowIndex / pageLength);
            //         dataTable.page(pageNumber).draw('page');

            //         console.log(createdRowIndex);-1
            //         console.log(pageLength);10
            //         console.log(pageNumber);-1


            //         $('.paginate_button').removeClass('current');
            //         $('.paginate_button').eq(pageNumber).addClass('current');
            //     });
            // }
            // function datatablereload(data) {
            //     $('#conference_datatable').dataTable( {
            //         "createdRow": function( row, data, dataIndex ) {
            //             if ( data[4] == "A" ) {
            //             $(row).addClass( 'important' );
            //             }
            //         }
            //     });
            // }

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

            // show modal open and show conference start
            $(document).on('click', '#show', function(event2) {
                event2.preventDefault();
                //clone the show button as edit for open edit model from show modal
                var clonedButton = $('#show').clone().addClass('edit btn btn-primary').removeClass('show').removeAttr('id').text('Edit').attr({
                    'data-id': $(this).data('id'),
                    'data-name': $(this).data('name'),
                    'data-description': $(this).data('description'),
                    'data-location': $(this).data('location'),
                    'data-category': $(this).data('category'),
                    'data-url': $(this).data('url'),
                    'data-status': $(this).data('status'),
                    'data-start_date': $(this).data('start_date'),
                    'data-end_date': $(this).data('end_date'),
                    'data-sub_date': $(this).data('sub_date')
                });
                $('.button-container').empty().append(clonedButton);
                ///////////////////////////////////////////////////////////////////
                $('.error-text, .inactive_category').text('');
                $('#show_modal').modal('show');
                $('#show_modal').css('opacity', 0).animate({ opacity: 1 }, 'medium');

                $('#show_name').text($(this).data('name'));
                $('#show_category').text($(this).data('category'));
                $('#show_description').text($(this).data('description'));
                $('#show_location').text($(this).data('location'));
                $('#show_start_date').text($(this).data('start_date'));
                $('#show_end_date').text($(this).data('end_date'));
                $('#show_sub_date').text($(this).data('sub_date'));
                $('#show_created').text($(this).data('created'));
                $('#show_updated').text($(this).data('updated'));
                var url = $(this).data('url');
                $('#show_website').text(url);
                $('#show_website').attr("href", '//' + url);

                var show_status = $(this).data('status');
                if (show_status == 1) {
                    $('#show_status').text('Published');
                } else {
                    $('#show_status').text('Unpublished');
                }
            });
            //show modal open and show conference end

            //add modal open and add conference start
            $("#add_button").click(function(event) {
                event.preventDefault();
                $('.error-text, .inactive_category').text('');
                // $('#new-conf').modal('toggle');
                $('#new-conf').modal('toggle');
                $('#new-conf').css('opacity', 0).animate({ opacity: 1 }, 'medium');
            });
            $('#addform').on('submit', function(event1) {
                event1.preventDefault();
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
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        $('.add-content').removeClass('waitloader');
                        $('.add-body').css('opacity', 1);
                        $('.add-btn').removeAttr('disabled');
                        if (data.is_error == 1) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text('*'+val[0]);
                            });
                        } else {
                            $('#new-conf').modal('hide');
                            $('#addform').trigger("reset");
                            Toast.fire({
                                icon: 'success',
                                title: 'Conference created successfully.'
                            })
                            $('#conference_datatable').DataTable().ajax.reload();
                            // var dataTable = $('#conference_datatable').DataTable();
                            // dataTable.page(1).draw(false);
                        }
                    }
                });
            });
            //add modal open and add conference end

            //edit modal open and edit conference start
            $(document).on('click', '.edit', function(event3){
                event3.preventDefault();
                $('#show_modal').modal('hide');
                $('.add-content').removeClass('waitloader');
                $('.error-text, .inactive_category').text('');
                // $('#edit-conf').modal('show');
                $('#edit-conf').modal('show');
                $('#edit-conf').css('opacity', 0).animate({ opacity: 1 }, 'medium');

                $('#conferenceid').val($(this).data('id'));
                var name = $(this).data('name');
                $('.name_title').text(name);
                $('#name').val(name);
                $('#description').val($(this).data('description'));
                $('#url').val($(this).data('url'));
                $('#location').val($(this).data('location'));
                $('#start_date').val($(this).data('start_date'));
                $('#end_date').val($(this).data('end_date'));
                $('#sub_date').val($(this).data('sub_date'));

                var category = $(this).data('category');
                var selectElement = $('#category');
                if (selectElement.find('option[value="' + category + '"]').length > 0) {
                    selectElement.val(category);
                } else{
                    $('.inactive_category').text("  (" +category+" is an Inactive category.)");
                    // var option = $('<option>', { value: category, text: category });
                    // selectElement.append(option);
                    selectElement.val(category);
                }

                var status = $(this).data('status');
                if (status == 1) {
                    $('#status').prop('checked', true);
                } else {
                    $('#status').prop('checked', false);
                }
            });

            $('#editform').on('submit', function(event4) {
                event4.preventDefault();
                var currentPageIndex = $('#conference_datatable').DataTable().page();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $('.edit-body').css('opacity', 0);
                $('.edit-content').addClass('waitloader');
                $('.edit-btn').prop('disabled', true);
                $.post(url, form, function(data) {
                    $('.edit-content').removeClass('waitloader');
                    $('.edit-body').css('opacity', 1);
                    $('.edit-btn').removeAttr('disabled');
                    if (data.is_error == 1) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text('*'+val[0]);
                        });
                    } else {
                        $('#edit-conf').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Conference updated successfully.'
                        })
                        $('#conference_datatable').DataTable().page(currentPageIndex).draw(false);
                    }
                })
            });
            //edit modal open and edit conference end

            //delete swal modal open and delete conference start
            $(document).on('click', '.delete', function(event5) {
                event5.preventDefault();
                var currentPage = $('#conference_datatable').DataTable().page();
                console.log(currentPage);
                var id = $(this).data('id');
                var name = $(this).data('name');
                Swal.fire({
                        title: "Delete Conference",
                        icon: "warning",
                        html: ('<p class="font-weight-bold">Are you sure want to delete <b class="text-danger">' + name + '</b>?</p>'),
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: "Delete",
                    })
                    .then(function(isConfirm) {
                        if (isConfirm.value) {
                            $.post("{{ URL::to('admin/conference_delete') }}", {
                                id: id
                            }, function() {
                                $('#conference_datatable').DataTable().page(currentPage).draw(false);
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Conference deleted successfully.'
                                })
                            })
                        } else {
                            // $('#conference_datatable').DataTable().page(currentPage).draw(false);
                        }
                    });
            });
            //delete swal modal open and delete conference end
        });
    </script>
@endpush

