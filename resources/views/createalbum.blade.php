@include('includes.header')

<body>
    @include('includes.nav')
    <div class="main has-background-color-link is-centered columns">
        {{-- здесь у нас будет обработка ошибок, на тот случай, если вообще случится ошибка --}}

  <div class="column is-one-quarter">
<form action="{{route('create_album')}}" name="createnewalbum" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <h3> Создайте новый альбом</h3>

    <div class="field">
        <label for="name" class="has-text-dark"> Название альбома</label>
        <div class="control">
            <input type="text" name="name" class="input" placeholder="Название альбома" value="{{old('name')}}">
        </div>
    </div>

<div class="field">
    <label for="description" class="has-text-dark"> Описание альбома </label>
    <div class="control">
        <textarea type="text" name="description" class="textarea" placeholder="описание альбома" rows="5" column="10">
        {{old('description')}}    
        </textarea>
    </div>
</div>
<div class="file has-name">
    <label  class="file-label">
      <input type="file" name="cover_image" class="form-control">
    </label>
</div>

<div class="select">
<select name="access">
    <option value="public"> Публичный</option>    
    <option value="private"> Приватный</option>
</select>    
</div>



 <div class="field">
<button type="submit" class="button is-primary is-pulled-tight submit"> Создать альбом</button>    
</div>
</div>
</div>


</form>





</body>