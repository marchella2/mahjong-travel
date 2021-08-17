@extends('layouts.admin')

@section('title', 'Paket Travel')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="col-12 col-md-12 col-lg-12">
            <h1 class="h3 mb-0 text-gray-800">Recycle Bin</h1>
            <a href="{{ route('gallery.restoreall') }}" class="btn btn-sm btn-success shadow-sm" onclick="return confirm('Apakah anda yakin ingin mengembalikan seluruh data?')">
                <i class="far fa-edit fa-sm text-white-50"></i> Restore All
            </a>
            <a href="{{ route('gallery.deleteall') }}" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah anda yakin ingin menghapus seluruh data?')">
                <i class="fas fa-trash fa-sm text-white-50"></i> Delete All
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
                                        <a href="{{ route('gallery.restore', $item->id) }}" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="{{ route('gallery.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus permanen data travel : {{ $item->title }} ?')"><i class="fa fa-trash"></i></a>
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
