<?php
namespace MapaInovacaoES;

use MapasCulturais\i;
use MapasCulturais\app;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();

        $app = App::i();

        $app->hook('app.init:after', function () {
            foreach ($this->config['icons'] as $icon => $path) {
                $this->config['iconsUrl'][$icon] = $this->view->asset($path, false, true);
            //     // print_r($app->getHooks('asset(' . $path . '):url'));
            }
        });

        $app->hook('template(<<*>>.main-header):after', function () {
            // if(true){    // Mostra barra de treinamento sempre
            if(getenv('APPMODE_TRAINING') === 'true'){
                echo '
                    <div class="modo-treinamento">
                        <h3>
                            TREINAMENTO
                        </h3>
                    </div>
                ';
            }
        });
    }
}
