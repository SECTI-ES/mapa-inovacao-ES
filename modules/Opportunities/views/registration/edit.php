<?php
/**
 * @var \MapasCulturais\Themes\BaseV2\Theme $this
 * @var \MapasCulturais\App $app
 * @var \MapasCulturais\Entities\Registration $entity
 */

// ISSUE: links dos Breadcrumbs

use MapasCulturais\i;

$this->layout = 'registrations';

$this->import('
    mc-breadcrumb
    mc-card
    mc-container
    mc-icon
    opportunity-header
    registration-edition
    request-agent-avatar
    select-entity
');

$this->useOpportunityAPI();

$opportunity = $entity->opportunity;
if($this->isRequestedEntityMine()){
    $label = i::__('Minhas oportunidades');
    $url = $app->createUrl('panel', 'opportunities');
} else {
    $label = i::__('Oportunidades');
    $url = $app->createUrl('search', 'opportunities');
}

$breadcrumb = [
    ['label' => $label, 'url' => $url],
    ['label' => $opportunity->firstPhase->name, 'url' => $app->createUrl('opportunity', 'single', [$opportunity->firstPhase->id])],
];

if (!$opportunity->isFirstPhase) {
    $breadcrumb[] = ['label' => $opportunity->name, 'url' => $app->createUrl('opportunity', 'single', [$opportunity->id])];
}

$breadcrumb[] = ['label' => i::__('Formulário')];

$this->breadcrumb = $breadcrumb;
?>

<div class="main-app registration edit">
    <mc-breadcrumb></mc-breadcrumb>
    <opportunity-header :opportunity="entity.opportunity"></opportunity-header>

    <div class="registration__title">
        <h1 v-if="entity.opportunity.status !== -20">
            <?= i::__('Formulário de inscrição') ?>
        </h1>
        <div>
            <h1 v-if="entity.opportunity.status == -20">
                <?= $opportunity->name ?>
            </h1>
            <h3 v-else>
                <?= $opportunity->name ?>
            </h3>
        </div>
    </div>

    <registration-edition :entity="entity"></registration-edition>
</div>