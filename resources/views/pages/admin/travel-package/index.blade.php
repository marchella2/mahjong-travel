@extends('layouts.admin')

@section('title', 'Paket Travel')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="col-12 col-md-12 col-lg-12">
            <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
            <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket Travel
            </a>
            <a href="{{ route('travel-package.trash') }}" class="btn btn-sm btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Recycle Bin
            </a>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Departure Date</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->departure_date }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <form action="{{ route('travel-package.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
