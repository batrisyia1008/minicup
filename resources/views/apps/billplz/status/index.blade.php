@extends('layouts.master')

@section('page-title', 'Exhibition Booth')
@section('page-header', 'Exhibition Booth')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title"></h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            {{--<div class="d-flex align-items-center mb-3">
                <div class="me-auto">
                    <a href="{{ route('apps.exhibition.booth.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Booth
                    </a>
                </div>
            </div>--}}

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th>shopref</th>
                    <th>billplz_id</th>
                    <th>billplz_paid</th>
                    <th>billplz_paid_at</th>
                    <th>billplz_x_signature</th>
                    <th width="1%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($status as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->shopref }}</td>
                    <td>{{ $data->billplz_id }}</td>
                    <td>{{ $data->billplz_paid }}</td>
                    <td>{{ $data->billplz_paid_at }}</td>
                    <td>{{ $data->billplz_x_signature }}</td>
                    <td>
                        {{--<a href="{{ route('apps.exhibition.hall.show', $hall) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>--}}
                        {{--<a href="{{ route('apps.exhibition.booth.edit', $booth) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>--}}
                        {{--<a href="{{ route('apps.exhibition.booth.destroy', $booth->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>--}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
