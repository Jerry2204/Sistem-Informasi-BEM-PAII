@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="col-12 p-0 position-relative overflow-hidden carousel-home d-flex align-items-center">
        <img class="img-home" src="https://upload.wikimedia.org/wikipedia/commons/2/2c/IT_Del_Drone2.jpg" alt="" srcset="">
        <p class="text-carousel text-wrap heading text-light">Badan Eksekutif Mahasiswa<br>Institut Teknologi Del</p>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 px-3">
                <p class="text text-center">Badan Eksekutif Mahasiswa (BEM) merupakan sebuah organisasi yang dikenal sebagai
                    lembaga eksekutif intra kampus yang bertugas untuk menghimpun seluruh kegiatan umum secara institusi
                    yang diselenggarakan oleh Keluarga Mahasiswa Institut Teknologi Del (KM IT Del).</p>
            </div>
            <div class="col-12 my-5">
                <h3 class="heading font-weight-bolder text-center mb-4">Landasan</h3>
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                        <div class="card text-center shadow-sm">
                            <img src="https://img.freepik.com/free-photo/praying-hands-with-faith-religion-belief-god-power-hope-devotion_79161-710.jpg?size=626&ext=jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title heading font-weight-bold">Martuhan</h5>
                                <p class="card-text text">“Kasihinilah Tuhan Allahmu, dengan segenap hatimu dan dengan
                                    segenap jiwamu dan dengan segenap akal budimu.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card text-center shadow-sm">
                            <img src="https://img.freepik.com/free-photo/praying-hands-with-faith-religion-belief-god-power-hope-devotion_79161-710.jpg?size=626&ext=jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title heading font-weight-bold">Marroha</h5>
                                <p class="card-text text">“Kasihinilah Tuhan Allahmu, dengan segenap hatimu dan dengan
                                    segenap jiwamu dan dengan segenap akal budimu.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card text-center shadow-sm">
                            <img src="https://img.freepik.com/free-photo/praying-hands-with-faith-religion-belief-god-power-hope-devotion_79161-710.jpg?size=626&ext=jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title heading font-weight-bold">Marbisuk</h5>
                                <p class="card-text text">“Kasihinilah Tuhan Allahmu, dengan segenap hatimu dan dengan
                                    segenap jiwamu dan dengan segenap akal budimu.”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 container-description">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6">
                    <h3 class="heading font-weight-bold mb-4">Badan Eksekutif Mahasiswa Institut Teknologi Del</h3>
                    <p class="text mt-4">Badan Eksekutif Mahasiswa (BEM) merupakan sebuah organisasi yang dikenal sebagai
                        lembaga eksekutif intra kampus yang bertugas untuk menghimpun seluruh kegiatan umum secara institusi
                        yang diselenggarakan oleh Keluarga Mahasiswa Institut Teknologi Del (KM IT Del).</p>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <img class="description-image" src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}"
                        class="d-inline-block align-top" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-12 my-5">
                <h3 class="heading font-weight-bolder text-center mb-4">Berita Terbaru</h3>
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                        <div class="card" style="width: 20rem;">
                            <img src="https://img.freepik.com/free-photo/praying-hands-with-faith-religion-belief-god-power-hope-devotion_79161-710.jpg?size=626&ext=jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">IT Del Mengajar</h5>
                                <p class="card-text text card-text-news">Institut Teknologi Del berkunjung ke salah satu
                                    sekolah yang ada di Kabupaten Simalungun guna mengajarkan pentingnya teknologi pada masa
                                    sekarang ini</p>
                                <a href="#" class="btn btn-primary btn-detail-card">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card" style="width: 20rem;">
                            <img src="https://img.freepik.com/free-photo/praying-hands-with-faith-religion-belief-god-power-hope-devotion_79161-710.jpg?size=626&ext=jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">IT Del Mengajar</h5>
                                <p class="card-text text card-text-news">Institut Teknologi Del berkunjung ke salah satu
                                    sekolah yang ada di Kabupaten Simalungun guna mengajarkan pentingnya teknologi pada masa
                                    sekarang ini</p>
                                <a href="#" class="btn btn-primary btn-detail-card">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card" style="width: 20rem;">
                            <img src="https://img.freepik.com/free-photo/praying-hands-with-faith-religion-belief-god-power-hope-devotion_79161-710.jpg?size=626&ext=jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">IT Del Mengajar</h5>
                                <p class="card-text text card-text-news">Institut Teknologi Del berkunjung ke salah satu
                                    sekolah yang ada di Kabupaten Simalungun guna mengajarkan pentingnya teknologi pada masa
                                    sekarang ini</p>
                                <a href="#" class="btn btn-primary btn-detail-card">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
