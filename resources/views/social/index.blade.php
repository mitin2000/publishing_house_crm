@extends('layouts.main')
@section('content')

    <main>
        <div class="container-fluid" style="background-color: #daeeac">
            <div class="row pb-5">
                <div class="col"><img class="w-100" src="{{asset('assets/images/social.png')}}"  alt="Альфики"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <button style="background-color: white; color: #002c59" type="button" class="btn btn-outline-primary btn-lg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/VK.com-logo.svg" alt="VK" width="20" height="20" class="me-2">
                            ВКонтакте
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
