@extends('layouts.main')

@section('title', 'Video')

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

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
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

                            <h5>{{ __('Video') }}</h5>

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

                                <a href="#">Video</a>

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>





        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header justify-content-between">

                        <h3>{{ __('Video List') }}</h3>

                        <div class=""><a class="btn btn-primary" href="{{ route('video-add') }}"> Add Video</a></div>

                    </div>

                    <div class="card-body">

                        <table id="data_table" class="table">

                            <thead>

                                <tr>

                                    <th>{{ __('No.') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Video') }}</th>
                                    <th class="nosort text-center">{{ __('Action') }}</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 1;
                                ?>

                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $i, $i++ }}</td>
                                        <td>{{ $video->title }}</td>
                                        <td>
                                            <iframe style="width: 50%; border: 0;" src="{{ $video->video_link }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                        </td>
                                        <td class="text-center">
                                            <div class="table-actions text-center">
                                                <a href="{{ route('video-edit', $video->id) }}"><i class="ik ik-edit-2 text-blue"></i></a>
                                                <a class="delete" data-href="{{ route('video-delete', $video->id) }}" style="cursor: pointer;">
                                                    <i class="ik ik-trash-2 text-red"></i>
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
        </script>

    @endpush

@endsection