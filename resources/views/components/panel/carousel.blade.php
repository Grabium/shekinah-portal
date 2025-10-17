<div>
    <label>Carrossel</label>
    
    @foreach ($photosLinks as $link)
        {{$link}}<br>
        <img src="{{asset($link)}}" ><br>
    @endforeach
    
</div>