<?php

use MapasCulturais\App;
use MapasCulturais\i;

$this->import('
    faq-accordion
    faq-search-results
    mc-title
');
$this->breadcrumb = [
    ['label' => i::__('Dúvidas frequentes'), 'url' => $this->controller->createUrl('index')],
    ['label' => $active_section ],
];
$message = $app->config['module.FAQ']['support-message'] ?? '';

?>

<!-- Alteração do Mapa da Inovação: Botão "Voltar" era desnecessário por conta dos Breadcrumb e apresentava erro nos props. -->
<div class="faq__content">
    <aside class="faq__aside">
        <div class="faq__btn-aside">
            <?php foreach ($faq as $section) : ?>
                <a href="<?= $this->controller->createUrl('index', [$section->slug]) ?>" class="faq__btn <?= $section->slug == $active_section ? 'faq__btn--selected' : '' ?>">
                    <?= $section->title ?> <mc-icon name="arrow-right-ios"></mc-icon>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="field faq__sections">
            <p for="faq-sections" class="semibold"><?= i::__("Navegue entra as categorias:"); ?></p>
            <select id="faq-sections" name="faq-sections" onchange="location=this.value;" class="primary__color bold">
                <?php foreach ($faq as $section) : ?>
                    <option value="<?= $this->controller->createUrl('index', [$section->slug]) ?>" <?= $section->slug == $active_section ? 'selected' : '' ?> class="semibold">
                        <?= $section->title ?> <mc-icon name="arrow-right-ios"></mc-icon>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </aside>
    <main>
        <faq-search section></faq-search>
        <faq-accordion v-if="!global.faqSearch"></faq-accordion>
        <faq-search-results v-if="global.faqSearch"></faq-search-results>
        <div class="faq__message">
            <?= $message ?>
        </div>
    </main>
</div>