<div>
    <head>
        <h1>Lista de Registros</h1>
        <p>Gerenciado por LIVEWIRE/TESTE/CRUD/FAKE</p>
        <nav>
            <a href="{{route('fake.create')}}">Criar</a>
        </nav>
    </head><hr>

    <div>
        <label for="filter">Filtro parcial em "name":</label>
        <input type="text" name="filter" id="filter" wire:model.live.debounce.1000="filter">
        <br>

        @isset($filter)
            <p><em>Resultado do filtro: </em><strong>{{$filter}}</strong><em>.</em></p>
        @endisset
        <hr><br>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $fake)
                    <tr>
                        <td>{{$fake->name}}</td>
                        <td>{{$fake->description}}</td>
                        <td><button type="button" wire:click="toEdit({{$fake->id}})">Editar</button></td>
                    </tr>
                   
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
