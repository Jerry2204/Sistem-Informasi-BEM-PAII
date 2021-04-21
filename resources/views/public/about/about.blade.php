@extends('layouts.app')

@section('title', 'Kegiatan')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h6>Tentang Kami</h6>
                    <ol class="breadcrumb bg-white pl-0" style="background: transparent !important">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
                <div class="col-md-12 bg-white shadow-sm p-4">
                    <h3 class="heading font-weight-bold">Sejarah</h3>
                    <p class="text mt-3 font-14">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Porttitor tellus porttitor non nullam dui.
                        Consectetur in aliquet tellus risus elit pretium. In nunc tincidunt sagittis sit massa odio. Viverra
                        quam nec diam tincidunt donec suspendisse consectetur. Praesent odio malesuada eu quis nisl nisl
                        fringilla neque adipiscing. Ridiculus eu velit euismod porttitor mauris aenean vitae donec.
                        A sit metus tellus sed justo est nisi. Molestie et vulputate hac malesuada. Lacinia ultrices lectus
                        sed tempor. Ipsum convallis facilisi sagittis neque ut aliquam urna faucibus. Tellus, mi integer
                        dolor nulla nunc consectetur turpis. Id velit convallis massa aliquet. Tristique faucibus commodo,
                        sed quis cursus a et praesent sit. Leo odio morbi id est. Mi iaculis tortor amet lacus. Phasellus
                        tempus nunc semper pellentesque sit nulla nibh.
                    </p>
                </div>

                <div class="col-md-12 my-5 p-4">
                    <div class="col-12 px-0 line">
                        <h3 class="heading font-weight-bold p-0 m-0">PENGURUS INTI</h3>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="image_about">
                                        <img class=""
                                            src="https://cdn.ayobandung.com/upload/bank_image/medium/jadi-centibillionaire-kekayaan-mark-zuckerberg-lampaui-100-dolar-as.jpg"
                                            alt="" srcset="">
                                    </div>
                                </div>
                                <div class="py-3 col-12">
                                    <h5 class="heading font-weight-bold">Ketua BEM</h5>
                                    <p class="text font-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Asperiores
                                        vero eaque maxime obcaecati fugit neque quibusdam earum veritatis blanditiis,
                                        accusantium temporibus incidunt eligendi exercitationem iste labore! Qui omnis
                                        inventore
                                        ducimus!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="image_about">
                                        <img class=""
                                            src="https://cdn.ayobandung.com/upload/bank_image/medium/jadi-centibillionaire-kekayaan-mark-zuckerberg-lampaui-100-dolar-as.jpg"
                                            alt="" srcset="">
                                    </div>
                                </div>
                                <div class="py-3 col-12">
                                    <h5 class="heading font-weight-bold">Wakil Ketua BEM</h5>
                                    <p class="text font-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Asperiores
                                        vero eaque maxime obcaecati fugit neque quibusdam earum veritatis blanditiis,
                                        accusantium temporibus incidunt eligendi exercitationem iste labore! Qui omnis
                                        inventore
                                        ducimus!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 visimisi">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="heading font-weight-bold">VISI</h3>
                    <p class="text font-14 my-4">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus obcaecati, distinctio animi
                        tempora excepturi ipsam reprehenderit, laboriosam eaque voluptatum, iusto facilis vero doloribus
                        itaque quis! Eligendi perferendis voluptatibus voluptates nisi.
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="heading font-weight-bold">MISI</h3>
                    <div class="mt-3">
                        <ul class="list-group" style="background: transparent !important">
                            @for ($i = 0; $i < 4; $i++)
                                <li class="list-group-item text font-14 border-0 px-0 py-2"
                                    style="background: transparent !important">Cras justo odio Dapibus ac facilisis in Morbi
                                    leo risus Dapibus ac facilisis in Morbi leo risus</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h3 class="heading font-weight-bold text-center">TUJUAN KM IT DEL</h3>
            <div class="mt-3" style="width: 40%">
                <ul class="list-group" style="background: transparent !important">
                    @for ($i = 0; $i < 4; $i++)
                        <li class="list-group-item text font-14 border-0 px-0 py-2 text-center"
                            style="background: transparent !important">Cras justo odio Dapibus ac facilisis in Morbi leo
                            risus Dapibus ac facilisis in Morbi leo risus justo odio Dapibus ac facilisis in Morbi leo risus
                            Dapibus ac facilisis in Morbi leo risus</li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
