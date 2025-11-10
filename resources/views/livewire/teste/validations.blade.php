<div>
    <h1>Validations</h1>
    <a href="{{route('treinaweb.home')}}">Home</a>

    <hr>
    <form action="" wire:submit="store" method="post">
        <div>
            <label for="name">Nome</label>
            <input type="text" wire:model="name" name="name" id="name">
            @error('name') {{-- Condicional --}}
                <div>{{$message}}</div> {{-- $message é uma variavel reservada pelo livewire --}}
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" wire:model="email" name="email" id="email">
            @error('email')
                <div>{{$message}}</div> {{-- $message é uma variavel reservada pelo livewire --}}
            @enderror
        </div>

        <button type="submit">Enviar</button>
    </form>
    <hr>


    <textarea name="msg" id="msg" cols="30" rows="10" placeholder="resultado">{{$msg}}</textarea>
    

</div>
