<div>
    @if($enabledToAdd)
        <div style="background-color:bisque">
            <form action="{{ route('panel.carousel.store') }}" method="post" enctype="multipart/form-data">
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

        {{$photo['name']}}
            <form action="{{ route('panel.carousel.delete', $photo['name']) }}" method="post">
                @csrf
                @method('DELETE')
                @php
                    $bgColor = (($loop->index%2) == 0) ? 'gray' : 'lightgray';
                @endphp
                
                <div wire:key="{{$photo['name']}}" style="background-color:{{$bgColor}};">
                    <img src="{{ asset($photo['link']) }}" width="200" height="200" alt="Imagem do Carrossel {{ $photo['name'] }}">
                    <input type="hidden" value="{{ $photo['name'] }}" name="photoName">
                
                    @if(!$loop->first)
                        <button type="button" wire:click="move('{{ $photo['name'] }}','DECREMENT')">Subir</button>
                    @endif

                    @if(!$loop->last)
                        <button type="button" wire:click="move('{{ $photo['name'] }}','INCREMENT')">Descer</button>
                    @endif
                    
                    <button type="submit">Excluir</button>
                    <button type="button" wire:click="download('{{ $photo['name'] }}')">Download</button>
                </div>
            </form>
        @endforeach
    </div>
</div>
