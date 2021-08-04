@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
<main>
    <section class="section-details-header"></section>

    <section class="section-details-content">
        <div class="container">
            <!-- Breadcrumb-->
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>

                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- About details-->
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>Nusa Peninda</h1>
                        <p>
                            Republic of Indonesia Raya
                        </p>

                        <!-- Gallery -->
                        <div class="gallery">
                            <!-- Foto wisata -->
                            <div class="xzoom-container">
                                <img src="{{ url('frontend/images/details1.png') }}" alt="Details 1" class="xzoom" id="xzoom-default" xoriginal="{{ url('frontend/images/details1.png') }}">

                                <!-- Kumpulan foto wisata -->
                                <div class="xzoom-thumbs">
                                    <a href="{{ url('frontend/images/details1.png') }}">
                                        <img src="{{ url('frontend/images/details1.png') }}" width="128" alt="Details 1" class="xzoom-gallery" id="xzoom-default" xpreview="{{ url('frontend/images/details1.png') }}">
                                    </a>

                                    <a href="{{ url('frontend/images/details2.jpg') }}">
                                        <img src="{{ url('frontend/images/details2.jpg') }}" width="128" alt="Details 2" class="xzoom-gallery" id="xzoom-default" xpreview="{{ url('frontend/images/details2.jpg') }}">
                                    </a>

                                    <a href="{{ url('frontend/images/details3.jpg') }}">
                                        <img src="{{ url('frontend/images/details3.jpg') }}" width="128" alt="Details 3" class="xzoom-gallery" id="xzoom-default" xpreview="{{ url('frontend/images/details3.jpg') }}">
                                    </a>

                                    <a href="{{ url('frontend/images/details4.jpg') }}">
                                        <img src="{{ url('frontend/images/details4.jpg') }}" width="128" alt="Details 4" class="xzoom-gallery" id="xzoom-default" xpreview="{{ url('frontend/images/details4.jpg') }}">
                                    </a>

                                    <a href="{{ url('frontend/images/details5.jpg') }}">
                                        <img src="{{ url('frontend/images/details5.jpg') }}" width="128" alt="Details 5" class="xzoom-gallery" id="xzoom-default" xpreview="{{ url('frontend/images/details5.jpg') }}">
                                    </a>
                                </div>
                            </div>
                            <h2>Tentang Wisata</h2>
                            <p>
                                Nusa Penida is an island southeast of Indonesia's island Bali and a district of Klungkung
                                Regency that includes the neighbouring small island of Nusa Lembongan. The Badung
                                Strait separates the island and Bali. The interior of Nusa Penida is hilly with a maximum
                                altitude of 524 metres. It is drier than the nearby island of Bali.
                            </p>
                            <p>
                                Bali and a district of Klungkung Regency that includes the
                                neighbouring small island of Nusa Lembongan. The Badung
                                Strait separates the island and Bali.
                            </p>

                            <!-- Bagian Features -->
                            <div class="features  row">
                                <div class="col-md-4">
                                    <img src="{{ url('frontend/images/ic_event.png') }}" alt="Event" class="features-image">
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>Tari Kecak</p>
                                    </div>
                                </div>

                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/ic_bahasa.png') }}" alt="Bahasa" class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>Bahasa Indonesia</p>
                                    </div>
                                </div>

                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/ic_foods.png') }}" alt="Makanan" class="features-image">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>Local Foods</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Features -->
                        </div>
                        <!-- End Gallery-->
                    </div>
                </div>

                <!-- Informasi Trip -->
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <!-- Gambar Member -->
                        <div class="members my-2">
                            <img src="{{ url('frontend/images/gambar1.png') }}" alt="Gambar Member" class="member-image mr-1">

                            <img src="{{ url('frontend/images/gambar2.png') }}" alt="Gambar Member" class="member-image mr-1">

                            <img src="{{ url('frontend/images/gambar3.png') }}" alt="Gambar Member" class="member-image mr-1">

                            <img src="{{ url('frontend/images/gambar4.png') }}" alt="Gambar Member" class="member-image mr-1">

                            <img src="{{ url('frontend/images/gambar5.png') }}" alt="Gambar Member" class="member-image mr-1">
                        </div>
                        <hr>
                        <h2>Trip Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">
                                    22 Aug, 2021
                                </td>
                            </tr>

                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">
                                    4D 3N
                                </td>
                            </tr>

                            <tr>
                                <th width="50%">Type of Trip</th>
                                <td width="50%" class="text-right">
                                    Open Trip
                                </td>
                            </tr>

                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">
                                    $90.00 / person
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Button Join -->
                    <div class="join-container">
                        <a href="{{ route('checkout') }}" class="btn btn-block btn-join-now mt-3 py-2">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });
</script>
@endpush
