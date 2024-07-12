@extends('layouts.main')

@section('title', 'Blog Comments')

@section('content')

    <!-- push external head elements to head -->

    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">

    @endpush



    <div class="card-body">

        @if (session()->has('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('message') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <i class="ik ik-x"></i>

                </button>

            </div>

        @endif

    </div>



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-inbox bg-blue"></i>

                        <div class="d-inline">

                            <h5>{{ __('Blog') }}</h5>

                            {{-- <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit') }}</span> --}}

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">

                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>

                            </li>

                            <li class="breadcrumb-item">

                                <a href="#">Blog</a>

                            </li>

                            {{-- <li class="breadcrumb-item active" aria-current="page">Blog Home section</li> --}}

                        </ol>

                    </nav>

                </div>

            </div>

        </div>





        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header justify-content-between">

                        <h3>{{ __('Blog Comments List') }}</h3>

                    </div>

                    <div class="card-body">

                        <table id="data_table" class="table">

                            <thead>

                                <tr>

                                    <th>{{ __('No.') }}</th>
                                    <th>{{ __('Blog Title') }}</th>
                                    <th>{{ __('Commentator Name') }}</th>
                                    <th>{{ __('Comment') }}</th>
                                    <th class="nosort text-right">{{ __('Action') }}</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 1;

                                ?>

                                @foreach ($blogComment as $Blogs)

                                    <tr>

                                        <td>{{ $i, $i++ }}</td>

                                        <td>{{ $Blogs->blogtitle }}</td>

                                        <td>{{ $Blogs->name }}</td>

                                        <td>{{ $Blogs->comment }}</td>

                                        <td>

                                            <div class="table-actions">

                                                <!-- <a href="{{ route('blog-edit', $Blogs->id) }}"><i class="ik ik-edit-2"></i></a> -->
                                                <a class="btn btn-icon btn-primary action_open" title="status action" data-href="{{ route('comment-action-ajax') }}" data-id="{{ $Blogs->id }}">
                                                    <i class="ik ik-send text-white" style="padding-right: 2px;"></i>
                                                </a>

                                                <a class="btn btn-icon btn-danger delete" data-href="{{ route('comment-delete', $Blogs->id) }}" style="cursor: pointer;">
                                                    <i class="ik ik-trash-2 text-white"></i>
                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="modal fade" id="replyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Leave a Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="replyForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="comment_id" id="commentid" value="">
                            <p><label for="reply">Reply for This Comment:</label></p>
                            <textarea class="form-control" id="reply" name="reply" rows="5" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success submitBtn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- push external js -->

    @push('script')

        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>

        <script type="text/javascript">
            $("body").on( "click", ".delete", function() {
                var link = $(this).attr("data-href");
                $.confirm({
                    icon: 'fa fa-trash',
                    title: 'Confirm!!',
                    content: 'Are You Sure to Delete this Record?',
                    draggable: true,
                    buttons: {
                        confirm: function () {
                            window.location.href = link;
                        },
                        cancel: function () {
                        },
                    }
                });
            });

            $(document).ready(function() {
                $('.submitBtn').click(function(event) {
                    event.preventDefault();

                    const formData = $('#replyForm').serialize();

                    $.ajax({
                        url: "{{ route('comment-store-ajax') }}",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            if (response['status'] == 'success') {
                                $('#replyForm')[0].reset();
                                $('#replyModel').modal('hide');
                                toastr.success(response['message']);
                                setTimeout(function() {
                                    return location.reload(true);
                                }, 2000);
                            }
                            if (response['status'] == 'notfound') {
                                $('#replyForm')[0].reset();
                                toastr.error(response['message']);
                                setTimeout(function() {
                                    return location.reload(true);
                                }, 2000);
                            }
                            if (response['status'] == 'error') {
                                $('#replyForm')[0].reset();
                                toastr.error(response['message']);
                                setTimeout(function() {
                                    return location.reload(true);
                                }, 2000);
                            }
                        }
                    });
                });
            });

            $("body").on( "click", ".action_open", function() {
                var ajax_url = $(this).data("href");
                var id = $(this).data("id");
                $.confirm({
                    icon: 'fa fa-action',
                    title: 'Comment Status ??',
                    content: 'Update Comment.',
                    draggable: true,
                    buttons: {
                        reply: {
                            text: 'Reply',
                            btnClass: 'btn-primary',
                            action: function(){
                                $("#replyForm")[0].reset();
                                $("#commentid").val(id);
                                $('#replyModel').modal('show');
                            }
                        },
                        complete: {
                            text: 'Approve',
                            btnClass: 'btn-success',
                            keys: ['enter'],
                            action: function(){

                                $.ajax({
                                    type: "POST",
                                    url: ajax_url,
                                    data: {
                                        "_token":"{{ csrf_token() }}",
                                        "id":id,
                                        "status":"1",
                                    },
                                    success: function (response) 
                                    {
                                        if (response['status'] == 'success') {
                                            toastr.success(response['message']);
                                            setTimeout(function() {
                                                return location.reload(true);
                                            }, 2000);
                                        }

                                        if (response['status'] == 'error') {
                                            toastr.error(response['message']);
                                            setTimeout(function() {
                                                return location.reload(true);
                                            }, 3000);
                                        }
                                    }
                                });
                            }
                        },
                        reject: {
                            text: 'Reject',
                            btnClass: 'btn-danger',
                            keys: ['del'],
                            action: function(){
                                
                                $.ajax({
                                    type: "POST",
                                    url: ajax_url,
                                    data: {
                                        "_token":"{{ csrf_token() }}",
                                        "id":id,
                                        "status":"0",
                                    },
                                    success: function (response) 
                                    {
                                        if (response['status'] == 'success') {
                                            toastr.success(response['message']);
                                            setTimeout(function() {
                                                return location.reload(true);
                                            }, 2000);
                                        }

                                        if (response['status'] == 'error') {
                                            toastr.error(response['message']);
                                            setTimeout(function() {
                                                return location.reload(true);
                                            }, 2000);
                                        }
                                    }
                                });
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                            btnClass: 'btn-secondary',
                            keys: ['esc'],
                            action: function(){
                            }
                        },
                    }
                });
            });
        </script>

    @endpush

@endsection