@include('includes.header')
<body>
    @include('includes.nav')
<link rel="stylesheet" href="  {{asset('css/mag.css')   }}">
<div class="columns">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="/albums/{{$album->cover_image}}" alt="{{$album->name}}" class="media-object pull-left" width="350px">
            </figure>
        </div>
        <div class="card-content has-background-black-ter">
            <h5 class="is-size-5 has-text-light"> Создан пользователем {{$album->created_by}}</h5>
            <h2 class="is-size-2"> {{$album->name}}</h2>
            <div class="field">
                @if ($album->description == '')
                    <h3> Описание отсутсвует</h3>
                @else
                    <h3 class="is-size-5 has-text-light is-italic">{{ $album->description}} </h3>
                @endif

                <a href="{{route('add_image', array('id'=> $album ->id ))}}">
                <button type="button" class="button is-primary"> Добавить новую фотографию в альбом</button>

                <a href="{{route('delete_album', array('id'=> $album ->id ))}}" onclick=" return confirm("Вы уверены?")>
                <button type="button" class="button is-primary"> Удалить альбом </button>
                </a>
            </div>
        </div>

    </div>
</div>
{{-- Здесь начинается сама галерия фотографий --}}
<div class="columns is-multiline">
    @foreach($album -> Photos as $photo)
    <div class="column is-half">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3 arts_gallery">
                    <a href="/albums/{{$photo->image}}">
                        <img src="/albums/{{$photo->image}}" alt="{{$album->name}}">
                    </a>
                </figure>
            </div>
            <div class="card-content has-text-light has-background-black-ter">
                <p> {{$photo->description}}</p>
                {{-- Здесь могла быть ваша дата создания --}}


                <a href="{{route('delete_image', array('id'=>$photo ->id))}}" onclick="return confirm("Вы уверены?")>
                <button type="button" class="button is-primary is-small"> Удалить изображение</button>
                </a>
                <p>
                    Переместить фотографию в другой альбом:
                </p>
                <form action="{{route('move_image')}}"  method="POST" name="movephoto">
                {{csrf_field()}}
                <select name="new_album">
                    @foreach($albums as $others)
                        <option value="{{$others->id}}">{{$others->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="photo" value="{{$photo-> id}}">
                <button type="submit" class="btn btn-small btn-info"> Перемещение изображения</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script  src="https://code.jquery.com/jquery-2.2.4.js"
integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
crossorigin="anonymous" defer></script>
<script src="{{asset('js/mag.js')}}" defer></script>
<script src="{{asset('js/code.js')}}" defer></script>

</body>
</html>




