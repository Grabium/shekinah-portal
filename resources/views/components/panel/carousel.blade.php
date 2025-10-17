
<div >

    <div class="container">
        <label for="adicionar">Adicionar Foto ao Carrossel</label>
        <input type="file" name="adincionar">
        <button type="button">Enviar</button>
    </div>
    <div class="container">
        {{-- Itera sobre os links das imagens, adicionando a classe 'slide' --}}
        @foreach ($photosLinks as $index => $link)
            <div class="container">
                <label>{{$link}}</label>
                <label>{{$index+1}}</label>
                <img src="{{ asset($link) }}" width="200" height="200" alt="Imagem do Carrossel {{ $index + 1 }}">
                <button type="button">Excluir</button>
            </div>
            
        @endforeach


    </div>
</div>    
    
