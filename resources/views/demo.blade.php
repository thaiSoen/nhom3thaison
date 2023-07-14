
@extends('clien.layout.index')
@section('content')
    <h2 class="list-product-title">New Food</h2>

    <div class="list-product-subtitle">

        <p>List Food You can buy</p>

    </div>

    <div class="product-group">

        <div class="row">

            @foreach ($musics as $key => $music)
                <div class="col-md-3 col-sm-6 col-12">

                    <div class="card card-product mb-3">

                        <img class="images-detail" src="{{ asset('image/music/' . $music->image) }}" alt=""
                            height=150 width=150>

                        <div class="card-body">

                            <h5 class="card-title">{{ $music->name }}</h5>

                            <p class="card-text">{{ $music->price }} $</p>

                            <a href="{{ route('music.show', $music->id) }}" class="btn btn-primary">Details</a>

                        </div>

                        <audio controls controlsList="nodownload" style="width: 250px; height:30px" ontimeupdate="myAudio(this)">
                            <source src="{{ asset('audio/music/'. $music->audio) }}" type="audio/mp3">
                        </audio>
                        
                        </script>
                         <p class="btn-holder" style="with:250px;"><a href="{{ url('add-to-cart/' . $music->id) }}"
                            class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
                    </p>


                        </div>
            @endforeach

        </div>

    </div>
@endsection
