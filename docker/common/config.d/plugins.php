<?php

return [
    'plugins' => [
        'Accessibility',
        'AccountConsolidator',
        'AdminLoginAsUser',
        'Analytics',
        'DownloadAllFiles',
        'MapasBlame' => [
            'namespace' => 'MapasBlame',
            'config' => [
                'request.logData.PATCH' => function ($data) {
                    return $data;
                },
            ]
        ],
        'MultipleLocalAuth',
        // 'RegistrationPayments',
        'SettingsES' => ['namespace' => 'SettingsES'],
        'SpamDetector',
        'ValuersManagement',
        'Zammad' => [
            'namespace' => 'Zammad',
            'config' => [
            'enabled' => true,
	        'url' => env('ZAMMAD_URL', 'https://suporte.es.mapasculturais.com.br/assets/chat/chat.min.js'),
            'background' => '#8338EC',
            'title' => 'Duvidas? Fale conosco',
            'chatId' => 2,
            'instacacao' => 'mapa.inovacao.es.gov.br',
            'estado' => 'Espiríto Santo'
            ]
        ],
    ]
];
