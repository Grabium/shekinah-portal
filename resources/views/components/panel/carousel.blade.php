<div>
    <label>Carrossel</label>
    
    @foreach ($photosLinks as $link)
        {{$link}}<br>
        <img src="{{Storage::url($link)}}" ><br>
    @endforeach
    
</div>