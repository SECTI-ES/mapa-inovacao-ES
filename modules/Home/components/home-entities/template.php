<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    mc-link
');
?>
<div class="home-entities">

    <div class="home-entities__content">
        <div class="home-entities__content--header">
            <label class="title">
                <?= $this->text('title', i::__('Aqui você encontra as informações da inovação em sua região!')) ?> <!-- Correção do Mapa da Inovação -->
            </label>
            <label class="description">
                <?= $this->text('description', i::__('Mas para isso, precisamos da sua ajuda! Faça você também: cadastre suas iniciativas, empresas e eventos.')) ?> <!-- Correção do Mapa da Inovação -->
            </label>
        </div>

        <div class="home-entities__content--cards">
            <div v-if="global.enabledEntities.opportunities" class="card">
                <mc-link route="search/opportunities">  <!-- Adição do Mapa da Inovação -->
                <div class="card__left">
                    <div class="card__left--content">
                        <div class="card__left--content-icon opportunity__background">
                            <mc-icon name="opportunity"></mc-icon>
                        </div>
                        <div class="card__left--content-title">
                            <label class="title">
                                <?= i::__('Oportunidades') ?>
                            </label>
                        </div>
                    </div>
                    <div class="card__left--img">
                            <img src="<?php $this->asset($app->config['module.home']['home-opportunities']) ?>" />  <!-- Correção do Mapa da Inovação -->
                        </div>
                    </div>
                </mc-link>
                <div class="card__right">
                    <p><?= $this->text('opportunities', i::__('É aqui que você pode realizar inscrições e acessar o resultado de editais e chamamentos públicos de inovação. Você também pode criar o seu próprio formulário e divulgar sua oportunidade para outros agentes da inovação.')) ?></p> <!-- Correção do Mapa da Inovação -->
                    <mc-link route="search/opportunities" class="button button--icon button--sm opportunity__color">
                        <?= i::__('Ver todos')?>
                        <mc-icon name="access"></mc-icon>
                    </mc-link> <!-- Adição do Mapa da Inovação -->
                </div>
            </div>

            <div v-if="global.enabledEntities.events" class="card">
                <mc-link route="search/events"> <!-- Adição do Mapa da Inovação -->
                <div class="card__left">
                    <div class="card__left--content">
                        <div class="card__left--content-icon event__background">
                            <mc-icon name="event"></mc-icon>
                        </div>
                        <div class="card__left--content-title">
                            <label class="title">
                                <?= i::__('Eventos') ?>
                            </label>
                        </div>
                    </div>
                    <div class="card__left--img">
                            <img src="<?php $this->asset($app->config['module.home']['home-events']) ?>" /> <!-- Correção do Mapa da Inovação -->
                        </div>
                    </div>
                </mc-link> <!-- Adição do Mapa da Inovação -->
                <div class="card__right">
                    <p><?= $this->text('events', i::__('Quer saber quais os eventos de inovação que estão ocorrendo em sua região? Basta fazer uma pesquisa a partir das ferramentas de busca. Além disso, como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente!')) ?></p> <!-- Correção do Mapa da Inovação -->
                    <mc-link route="search/events" class="button button--icon button--sm event__color">
                        <?= i::__('Ver todos')?>
                        <mc-icon name="access"></mc-icon>
                    </mc-link>
                </div>
            </div>

            <div v-if="global.enabledEntities.spaces" class="card">
                <mc-link route="search/spaces"> <!-- Adição do Mapa da Inovação -->
                <div class="card__left">
                    <div class="card__left--content">
                        <div class="card__left--content-icon space__background">
                            <mc-icon name="space"></mc-icon>
                        </div>
                        <div class="card__left--content-title">
                            <label class="title">
                                <?= i::__('Espaços') ?>
                            </label>
                        </div>
                    </div>
                    <div class="card__left--img">
                            <img src="<?php $this->asset($app->config['module.home']['home-spaces']) ?>" /> <!-- Correção do Mapa da Inovação -->
                        </div>
                    </div>
                </mc-link> <!-- Adição do Mapa da Inovação -->
                <div class="card__right">
                    <p><?= $this->text('spaces', i::__('Você pode procurar por espaços de inovação incluídos na plataforma a partir dos campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre os espaços onde desenvolve suas atividades de inovação e empreendedorismo.')) ?></p> <!-- Correção do Mapa da Inovação -->
                    <mc-link route="search/spaces" class="button button--icon button--sm space__color">
                        <?= i::__('Ver todos')?>
                        <mc-icon name="access"></mc-icon>
                    </mc-link>
                </div>
            </div>

            <div v-if="global.enabledEntities.agents" class="card">
                <mc-link route="search/agents"> <!-- Adição do Mapa da Inovação -->
                <div class="card__left">
                    <div class="card__left--content">
                        <div class="card__left--content-icon agent__background">
                            <mc-icon name="agent-2"></mc-icon>
                        </div>
                        <div class="card__left--content-title">
                            <label class="title">
                                <?= i::__('Agentes') ?>
                            </label>
                        </div>
                    </div>
                    <div class="card__left--img">
                            <img src="<?php $this->asset($app->config['module.home']['home-agents']) ?>" /> <!-- Correção do Mapa da Inovação -->
                        </div>
                    </div>
                </mc-link> <!-- Adição do Mapa da Inovação -->
                <div class="card__right">
                    <p><?= $this->text('agents', i::__('Aqui você pode encontrar todos os profissionais, empreendedores e entidades que estão registrados na plataforma. É uma rede de agentes que estão envolvidos na cena de inovação da região. Você também pode realizar o seu cadastro, bem como o de seus coletivos, equipes, instituições e empresas das quais faça parte.')) ?></p> <!-- Correção do Mapa da Inovação -->
                    <mc-link route="search/agents" class="button button--icon button--sm agent__color">
                        <?= i::__('Ver todos')?>
                        <mc-icon name="access"></mc-icon>
                    </mc-link>
                </div>
            </div>

            <div v-if="global.enabledEntities.projects" class="card">
                <mc-link route="search/projects"> <!-- Adição do Mapa da Inovação -->
                <div class="card__left">
                    <div class="card__left--content">
                        <div class="card__left--content-icon project__background">
                            <mc-icon name="project"></mc-icon>
                        </div>
                        <div class="card__left--content-title">
                            <label class="title">
                                <?= i::__('Projetos') ?>
                            </label>
                        </div>
                    </div>
                    <div class="card__left--img">
                            <img src="<?php $this->asset($app->config['module.home']['home-projects']) ?>" /> <!-- Correção do Mapa da Inovação -->
                        </div>
                    </div>
                </mc-link> <!-- Adição do Mapa da Inovação -->
                <div class="card__right">
                    <p><?= $this->text('projects', i::__('Este é o local onde você pode encontrar oportunidades de financiamento, eventos, convocatórias e editais de inovação criados, além de diversas iniciativas cadastradas pelos usuários da plataforma.')) ?></p> <!-- Correção do Mapa da Inovação -->
                    <mc-link route="search/projects" class="button button--icon button--sm project__color">
                        <?= i::__('Ver todos')?>
                        <mc-icon name="access"></mc-icon>
                    </mc-link>
                </div>
            </div>
        </div>
    </div>
</div>