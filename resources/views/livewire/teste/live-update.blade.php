<div>

    <h1>Exemplos do TreinaWeb</h1>

    <p>Faça uma busca ou filtragem em dados em tempo real.</p>

    <br />

    <label for="modlive">Filtro Simples ou com REGEX</label>
    <input type="text" name="filter" id="filter" wire:model.live.debounce.1000="filter">
    <br>

    @isset($filter)
        <p><em>Exibindo resultado do regex: </em><strong>{{$filter}}</strong><em>.</em></p>
    @endisset

    <br />
    <h1>Personagens do Mortal Kombat</h1>
    @foreach ($dataExemple as $item)
        {{ $item['fullName'] }}
        <hr>
    @endforeach

</div>
