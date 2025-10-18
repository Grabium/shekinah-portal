
<div >

    @if($enabledToAdd)
        <div style="background-color:bisque">
            <label for="adicionar">Adicionar Foto ao Carrossel</label>
            <input type="file" name="adincionar">
            <button type="button">Enviar</button>
        </div>
    @endif




    {{-- Itera sobre os links das imagens, adicionando a classe 'slide' --}}
    <div style="background-color:aquamarine">
        @foreach ($photosLinks as $photo)
            @php
                $bgColor = (($loop->index%2) == 0) ? 'gray' : 'lightgray';
            @endphp
            
            <div style="background-color:{{$bgColor}};">
                <img src="{{ asset($photo['link']) }}" width="200" height="200" alt="Imagem do Carrossel {{ $photo['name'] }}">
            
                @if(!$loop->first)
                    <button>Subir</button>
                @endif

                @if(!$loop->last)
                    <button>Descer</button>
                @endif
                
                <button type="button">Excluir</button>
            </div>
        @endforeach
    </div>

</div>    
    
