<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */
?>
<iconify v-if="own !== 'true'" :class="{'iconify--link': isLink}" :icon="icon" :own='null'></iconify>
<img v-else class="own iconify" :src=src :alt="alt">

