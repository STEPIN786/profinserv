@extends('layouts.main')

@section('title', 'Video')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Video Form</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Forms') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Video') }}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('video-store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Video Title') }}</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{ $video->title }}" placeholder="Video Title">
                                        <input type="hidden" name="id" value="{{ $video->id }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="video_link">{{ __('Video Link') }}</label>
                                        <input type="text" class="form-control" name="video_link" id="video_link" value="{{ $video->video_link }}" placeholder="Video Link">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                            <div class="btn btn-light" onclick="location.href='{{ route('video-list') }}'">Cancel</div>
                        </form>

                    </div>

                </div>

            </div>

        </div>





    </div>



    <!-- push external js -->

    @push('script')

        <script src="{{ asset('js/form-components.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
               $('.ckeditor').ckeditor();
            });
        </script>
    @endpush

@endsection

