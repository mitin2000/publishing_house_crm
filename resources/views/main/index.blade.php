@extends('layouts.main')
@section('content')

    <main>


        <section>
        <div class="container-fluid pt-5">
            <div class="row pb-5">
                <div class="col"><img class="w-100" src="{{asset('assets/images/alphiki2.png')}}"  alt="Альфики"></div>
            </div>
        </div>
        </section>


        <section style="background-color: #d2e5f4">
            <div class="container-fluid pb-5">
                <div class="row">
                    <div class="col img-wrapper" data-aos="fade-up-right">
                        <img class="w-100" src="{{asset('assets/images/about.png')}}" alt="carousel-img">
                    </div>
                </div>
                <div class="row">
                    <div class="col img-wrapper" data-aos="fade-up-left">
                        <img class="w-100" src="{{asset('assets/images/about2.png')}}" alt="carousel-img">
                    </div>
                </div>
                <div class="row">
                    <div class="col img-wrapper" data-aos="fade-up-left">
                        <img class="w-100" src="{{asset('assets/images/about3.png')}}" alt="carousel-img">
                    </div>
                </div>
            </div>
        </section>





    </main>

@endsection
