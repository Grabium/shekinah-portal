<div class="d-flex justify-content-center bg-light">
    <div class="bg-light border border-raw border-3 rounded-3 text-raw">
        <head>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1>Lista de Registros</h1>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <p>Gerenciado por LIVEWIRE/TESTE/CRUD/FAKE</p>
                </div>
            </div>
        <nav>
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <a class="btn btn-outline-secondary" href="{{route('treinaweb.home')}}">Voltar</a>
                </div>
                
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <a class="btn btn-outline-secondary" href="{{route('fake.create')}}">Criar</a>
                </div>    
            </div>
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
                        <td><button class="btn btn-sm btn-secondary" type="button" wire:click="toEdit({{$fake->id}})">Editar</button></td>
                    </tr>
                   
                @endforeach
            </tbody>
            
        </table>
    </div>
    </div>
</div>
