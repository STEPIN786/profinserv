@extends('layouts.main')

@section('title', 'Blog Category')

@section('content')



    <div class="container-fluid">

        <div class="page-header">

            <div class="row align-items-end">

                <div class="col-lg-8">

                    <div class="page-header-title">

                        <i class="ik ik-edit bg-blue"></i>

                        <div class="d-inline">

                            <h5>Blog Form</h5>

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

                        <h3>{{ __('Blog Category') }}</h3>

                    </div>

                    <div class="card-body">

                        <form class="forms-sample" method="POST" action="{{ route('blog-cat-store') }}"

                            enctype="multipart/form-data">

                            @csrf

                            <div class="row">


                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="exampleInputName1">{{ __('Blog Category Title') }}</label>

                                        <input type="hidden" class="form-control" name="id" value="{{ $Blogcategory->id }}" placeholder="id">

                                        <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{ $Blogcategory->name }}" placeholder="Enter Blog Category Name">

                                    </div>

                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>

                            <div class="btn btn-light" onclick="location.href='{{ route('blog-cat-list') }}'">Cancel</div>

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

