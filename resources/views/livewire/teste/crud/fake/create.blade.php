<div>
    <head>
        <h1>Criar Registro</h1>
        <p>Gera um novo registro através de LIVEWIRE/TESTE/CRUD/FAKE</p>
        <nav>
            <a href="{{route('fake.homelist')}}">HomeList</a>
        </nav>
    </head><hr>

    <form wire:submit="store">

        <div>
            <label for="name">Nome</label>
            <input type="text" wire:model="form.name" name="name" id="name">
            @error('form.name')
                <div>{{$message}}</div>
            @enderror
        </div>

        <div>
            <label for="description">Descrição</label>
            <input type="text" wire:model="form.description" name="description" id="description">
            @error('form.description')
                <div>{{$message}}</div>
            @enderror
        </div>

        <button type="submit">Salvar</button>
        
    </form>
</div>
