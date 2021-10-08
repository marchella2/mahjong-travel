@extends('layouts.admin')

@section('title', 'Transaksi')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="col-12 col-md-12 col-lg-12">
            <h1 class="h3 mb-0 text-gray-800">Recycle Bin</h1>
            <a href="{{ route('transaction.restoreall') }}" class="btn btn-sm btn-success shadow-sm" onclick="return confirm('Apakah anda yakin ingin mengembalikan seluruh data?')">
                <i class="far fa-edit fa-sm text-white-50"></i> Restore All
            </a>
            <a href="{{ route('transaction.deleteall') }}" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah anda yakin ingin menghapus seluruh data?')">
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
                                <th>Travel</th>
                                <th>User</th>
                                <th>Visa</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->travel_package->title }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->additional_visa }}</td>
                                    <td>{{ $item->transaction_total }}</td>
                                    <td>{{ $item->transaction_status }}</td>
                                    <td>
                                        <a href="{{ route('transaction.restore', $item->id) }}" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="{{ route('transaction.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus permanen data transaksi ini?')"><i class="fa fa-trash"></i></a>
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
