<div class="d-flex justify-content-center align-items-center p-10 ">
    
    
    <!-- 
    Não esquecer de modificar as rotas de "panel.xxx" para "xxx.index" 
    quando definir suas funções em Controllers com:
    "php artisan make:controller ... --resouce"
    -->


    <x-panel.link-button linkTo="panel.albums">
        {{ __('Álbum de Fotos e Vídeos') }}
    </x-panel.link-button>    

    <x-panel.link-button linkTo="panel.highlights">
        {{ __('Coluna de Destaque') }}
    </x-panel.link-button>

    <x-panel.link-button linkTo="carousel.index">
        {{ __('Carrossel') }}
    </x-panel.link-button>

    <x-panel.link-button linkTo="panel.events"> 
        {{ __('Eventos') }}
    </x-panel.link-button>

</div>