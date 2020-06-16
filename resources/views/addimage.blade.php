@include("includes.header")

<body>
    <div class="columns is-centered ">
        {{-- здесь могла быть обработка ошибок --}}




        <div class="column has-text-white is-one-quarter has-background-link" style="margin:5em">
            <form action="{{route('add_image_to_album')}}" name="addimagealbum" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" class="input" name="album_id" value="{{$album->id}}" />
                <fieldset>
                    <h5 class="is-size-4 label has-text-white"> Добавить фотографию в {{$album->name}}</h5>
                    <div class="field">
                        <label for="description" class="is-size-4"> Описание изображения</label>
                        <div class="control">
                            <textarea name="description" type="text" cols="50" rows="5" class="textarea"
                                placeholder="Описание изображения">

            </textarea>
                        </div>
                    </div>
                    <div class="file is-boxed">
                        <label class="file-label">
                          <input class="file-input" type="file" name="image">
                          <span class="file-cta">
                            <span class="file-icon">
                              <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                              Choose a file…
                            </span>
                          </span>
                        </label>
                      </div>
                    <button type="submit" class="button is-pulled-right"> Добавить</button>
                </fieldset>
            </form>


        </div>
    </div>



</body>