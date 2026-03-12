<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

// ISSUE: links dos Breadcrumbs

use MapasCulturais\i;

$this->layout = 'entity';

$this->import('
    entity-actions
    entity-renew-lock
    entity-header
    entity-links
    mc-breadcrumb
    mc-tab
    mc-tabs
    opportunity-basic-info
    opportunity-phase-reports
    opportunity-phases-config
    opportunity-subscribe-results
');

$this->addOpportunityPhasesToJs($entity);

if($this->isRequestedEntityMine()){
    $label_init = i::__('Painel');
    $url_init = $app->createUrl('panel', 'index');

    $label = i::__('Minhas oportunidades');
    $url = $app->createUrl('panel', 'opportunities');
} else {
    $label_init = i::__('Inicio');
    $url_init = $app->createUrl('site', 'index');

    $label = i::__('Oportunidades');
    $url = $app->createUrl('search', 'opportunities');
}
$this->breadcrumb = [
    ['label' => $label_init, 'url' => $url_init],
    ['label' => $label, 'url' => $url],
    ['label' => $entity->name, 'url' => $app->createUrl('opportunity', 'single', [$entity->id])],
];
?>

<div class="main-app">
    <entity-renew-lock :entity="entity"></entity-renew-lock>
    <mc-breadcrumb></mc-breadcrumb>
    <entity-header :entity="entity" editable></entity-header>
    <mc-tabs class="tabs" sync-hash>
        <?php $this->applyTemplateHook('tabs','begin') ?>
        <mc-tab label="<?= i::__('Informações') ?>" slug="info">
            <opportunity-basic-info :entity="entity"></opportunity-basic-info>
        </mc-tab>
        <mc-tab label="<?= i::__('Configuração de fases') ?>" slug="config">
            <opportunity-phases-config :entity="entity" tab="config"></opportunity-phases-config>
        </mc-tab>
        <mc-tab label="<?= i::__('Inscrições e Resultados') ?>" slug="registrations">
            <opportunity-subscribe-results :entity="entity" tab="registrations"></opportunity-subscribe-results>
        </mc-tab>
        <mc-tab label="<?= i::__('Relatórios') ?>" slug="report">
            <opportunity-phase-reports :entity="entity"></opportunity-phase-reports>
        </mc-tab>
        <?php $this->applyTemplateHook('tabs','end') ?>
    </mc-tabs>

    <entity-actions :entity="entity" editable></entity-actions>
</div>