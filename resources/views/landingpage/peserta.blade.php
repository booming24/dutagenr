@extends('fLayout')

@section('content')
    <div id="sejarah">
        <div class="text-center">
            <h1 class="corinthia-text" style="color: #AA8D6B;">E-Voting</h1>
            <h2 class="poppins-text">Duta GenRe Sumatera Selatan 2023</h2>
        </div>

        <div class="card" style="width: 375px; height: 495px;">
            <div class="card" style="width: 245px; height: 307px; margin-left: -10px;">
                <img src="images/logo.png" alt="Slide 1">
            </div>
            <div class="card-info" style="text-align: center;">
                <p>000000000000</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                    vote
                </button><br>
                <a href="#" class="see-all">See All</a>
            </div>
        </div>
    </div>
@endsection
