<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    @if(Auth::user()->name == 'Gabriel')
                        <div class="p-6 text-gray-900">
                            {{ __("Listagem de Usuários Editores") }} <hr /><br /><br /><br />

                            @foreach($users as $user)
                                {{ $user->id }} <br />
                                {{ $user->name }} <br />
                                {{ $user->email }} <br />
                                <form method="POST" action="{{ route('destroyOtherUser', $user->id) }}" style="display:inline;">
            {{-- Token de segurança obrigatório no Laravel --}}
            @csrf
            
            {{-- Diretiva para simular o método HTTP DELETE --}}
            @method('delete')
            
            {{-- O botão de exclusão agora submete este formulário --}}
            <x-danger-button class="ms-3">
                {{ __('Delete Account') }}
            </x-danger-button>
        </form>
                                <hr /><br />
                            @endforeach
                            
                        </div>
                    @endif
                </div>
                <div class="p-6 text-gray-900">
                    {{ __("Edição de Conteúdo") }}
                </div>
                
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
