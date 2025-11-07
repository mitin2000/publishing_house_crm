@extends('layouts.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <section class="edica-404">
                        <h4 class="page-title" data-aos="fade-up">Заказ № {{$order->id}} оформлен!</h4>

                        <p class="edics-404-text" data-aos="fade-up" data-aos-delay="200">Статус заказа Вы можете увидеть в Личном кабинете.</p>
                        <p class="edics-404-text" data-aos="fade-up" data-aos-delay="200">Вы всегда можете написать нам на почту, или позвонить по телефону: +7 (499) 609-60-20.</p>
                        <a href="{{route('user.index')}}" class="btn btn-primary" data-aos="fade-up" data-aos-delay="300">Личный кабинет</a>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection

