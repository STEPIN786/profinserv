@extends('layouts.main')
@section('title', 'Portfolio Details')
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
                            <h5>{{ __('Portfolio Details') }}</h5>
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
                                <a href="javascript:void(0)">Portfolio</a>
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
                        <h3>{{ __('Portfolio Details List') }}</h3>
                        <div class=""><a class="btn btn-primary" href="{{ route('port-detail-add') }}"> Add</a></div>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('No.') }}</th>
                                    <th>{{ __('Portfolio name') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th class="nosort text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                ?>

                                @foreach ($ProductDetails as $ProductDetail)
                                    <tr>
                                        <td>{{ $i, $i++ }}</td>
                                        <td>{{ $ProductDetail['p_title'] }}</td>
                                        <td>{{ $ProductDetail['d_title'] }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('port-detail-edit', $ProductDetail['id']) }}"><i
                                                        class="ik ik-edit-2"></i></a>
                                                <a href="{{ route('port-detail-delete', $ProductDetail['id']) }}"><i
                                                        class="ik ik-trash-2"></i></a>
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
    @endpush
@endsection
