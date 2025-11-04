<div>

    @if($enabledToAdd)
        <div style="background-color:bisque">
            <form action="{{ route('carousel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="adicionar">Adicionar Foto ao Carrossel</label>
                <input type="file" name="carouselAdd">
                <button type="submit">Enviar</button>
            </form>
        </div>
    @endif




    {{-- Itera sobre os links das imagens, adicionando a classe 'slide' --}}
    <div style="background-color:aquamarine">
        
        @foreach ($photosLinks as $photo)

            <form action="{{ route('carousel.destroy', $photo['name']) }}" method="post">
                @csrf
                @method('DELETE')
                @php
                    $bgColor = (($loop->index%2) == 0) ? 'gray' : 'lightgray';
                @endphp
                
                <div style="background-color:{{$bgColor}};">
                    <img src="{{ asset($photo['link']) }}" width="200" height="200" alt="Imagem do Carrossel {{ $photo['name'] }}">
                    <input type="hidden" value="{{ $photo['name'] }}" name="photoName">
                
                    @if(!$loop->first)
                        <button>Subir</button>
                    @endif

                    @if(!$loop->last)
                        <button>Descer</button>
                    @endif
                    
                    <button type="submit">Excluir</button>
                    {{--<button type="button" formaction="{{ route('panel.carousel.download') }}" formmethod="POST">Download</button>--}}
                    <a href="{{ route('panel.carousel.download', [ 'photoName' => $photo['name']]) }}"><button type="button">Download</button></a>
                </div>
            </form>
        @endforeach
    </div>

</div>    
    
