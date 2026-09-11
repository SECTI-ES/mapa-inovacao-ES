<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

$this->import('
    home-developers
    home-entities
    home-feature
    home-header
    home-map
    home-opportunities
    home-register
');
?>
<home-header></home-header>

<!-- Modificação Mapa da Inovação -->
<?php
    // if(true){    // Mostra barra de treinamento sempre
    if(getenv('APPMODE_TRAINING') === 'true'){
        echo '
        <div class="modo-treinamento" style="padding: 1.5vh;">
            <h3>
                Este é um site de treinamento, visite também a versão oficial do <a href="https://mapa.inovacao.es.gov.br/">Mapa da Inovação ES</a>.
            </h3>
        </div>
        ';
    }
?>
<home-opportunities></home-opportunities>
<home-entities></home-entities>
<home-feature></home-feature>
<home-register></home-register>
<home-map></home-map>
<home-developers></home-developers>