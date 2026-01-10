<?php

return [
    'plugins' => [
        'MultipleLocalAuth',
        'AdminLoginAsUser',
        'Analytics',
        'Accessibility',
        'SpamDetector',
        'ValuersManagement',
        'AccountConsolidator',
        'DownloadAllFiles',

        'SettingsES' => ['namespace' => 'SettingsES'],
        'Zammad' => [
           'namespace' => 'Zammad',
           'config' => [
               'enabled' => true,
	       'url' => env('ZAMMAD_URL', 'https://suporte.es.mapasculturais.com.br/assets/chat/chat.min.js'),
               'background' => '#8338EC'
            ]
        ],
        'MapasBlame' => [
            'namespace' => 'MapasBlame',
            'config' => [
                'request.logData.PATCH' => function ($data) {
                    return $data;
                },
            ]
        ],
    ]
];
