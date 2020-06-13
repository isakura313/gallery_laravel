@include('includes.header')
<body>
@include('includes.nav')
    <div class="columns is-multiline is-centered has-background-black-ter gallery_wrapper">
        <div class="row">
            @foreach($albums as $album)
                <div class="column is-two-fifth is-centered">
                    <div class="card">
                        <div class="card-image">
                            <figure class='image'>
                                <img src="/albums/{{$album->cover_image}}" alt="{{ $album->name}}">
                            </figure>
                        </div>
                        <div class="card-content">
                            <h3 class="is-size-4 label has-text-centered"> {{$album-> name}}</h3>
                            <p> Описание альбома <span class="is-size-4 has-text-danger"> {{$album->description}}</span></p>
                            <p class="is-size-5"> {{count($album->Photos)}} image(s) </p>
                                {{-- дата создания альбома --}}
                                {{-- уровень доступа --}}
                            <p> <a href="{{route("show_album", ['id'=>$album->id])}}" class="btn btn-big btn-default"></a>   </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>