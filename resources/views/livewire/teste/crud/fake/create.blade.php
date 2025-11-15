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

    @if($showNotify)
        <div class="alert alert-primary d-flex align-items-center d-grid gap-3" role="alert"><!-- d-grid gap-3 configuram um MARGIN como .m-3 individualmente em seus componentes filhos.-->
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
            <span> Novo registro foi criado! Nome: {{$form->name}}. Description: {{$form->description}}.</span>
            <button type="button" class="btn btn-primary" wire:click="redirectTo">OK</button>
        </div>

    @endif
    
</div>
