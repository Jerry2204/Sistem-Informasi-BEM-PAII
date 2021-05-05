@extends('layouts.app')

@section('title', 'DEPKOMINFO')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/departemen.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-5">
                        <div class="col-12 col-md-3">
                            <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}"
                                class="d-inline-block align-top img-fluid" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-flex align-items-center">
                            <h1 class="heading font-weight-bold text-center">DEPARTMENT OF INFORMATION AND COMMUNICATION
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 desc p-0">
        <div class="container py-5">
            <p class="text-center text font-14 p-0 m-0">
                Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed
                odio
                operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc
                posthac,
                sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras
                mattis
                iudicium purus sit amet fermentum.
                Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed
                odio
                operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc
                posthac,
                sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras
                mattis
                iudicium purus sit amet fermentum.
            </p>
        </div>
    </div>
    <div class="col-md-12 my-5">
        <div class="container">
            <h4 class="heading font-weight-bold text-center">PROGRAM KERJA</h4>
            <div class="row mt-4">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-4 d-flex justify-content-center mt-4">
                        <div class="card text-whitemb-3 heading" style="max-width: 18rem;">
                            <div class="card-body text font-14 text-center">
                                <h6 class="card-title">Primary card title</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection
