<?php
// creating base url
$prot_part = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';
//added @ for HTTP_HOST undefined in Tests
$host_part = @$_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
if(substr($host_part,-1) !== '/') $host_part .= '/';
$_APP_BASE_URL = $prot_part . $host_part;

return [
    'auth.provider' => '\MultipleLocalAuth\Provider',
    'auth.config' => array(

        'urlSupportEmail' => 'mailto:seedes@secti.es.gov.br',

        'salt' => env('AUTH_SALT', 'SECURITY_SALT'),
        'wizard' => 'true',
        'timeout' => '24 hours',

        'google-recaptcha-secret' => env('GOOGLE_RECAPTCHA_SECRET', false),
        'google-recaptcha-sitekey' => env('GOOGLE_RECAPTCHA_SITEKEY', false),
        'statusCreateAgent' => env('STATUS_CREATE_AGENT', 0),
        'strategies' => [
           //'Facebook' => array(
           //     'visible' => env('AUTH_FACEBOOK_VISIBLE', false),
           //     'app_id' => env('AUTH_FACEBOOK_APP_ID', null),
           //     'app_secret' => env('AUTH_FACEBOOK_APP_SECRET', null),
           //     'scope' => env('AUTH_FACEBOOK_SCOPE', 'email'),
           //),

           //'LinkedIn' => array(
           //     'visible' => env('AUTH_LINKEDIN_VISIBLE', false),
           //     'api_key' => env('AUTH_LINKEDIN_API_KEY', null),
           //     'secret_key' => env('AUTH_LINKEDIN_SECRET_KEY', null),
           //     'redirect_uri' => $_APP_BASE_URL . 'autenticacao/linkedin/oauth2callback',
           //     'scope' => env('AUTH_LINKEDIN_SCOPE', 'r_emailaddress')
           //),
           //'Google' => array(
           //     'visible' => env('AUTH_GOOGLE_VISIBLE', false),
           //     'client_id' => env('AUTH_GOOGLE_CLIENT_ID', null),
           //     'client_secret' => env('AUTH_GOOGLE_CLIENT_SECRET', null),
           //     'redirect_uri' => $_APP_BASE_URL . 'autenticacao/google/oauth2callback',
           //     'scope' => env('AUTH_GOOGLE_SCOPE', 'email profile'),
           //),
           //'Twitter' => array(
           //     'visible' => env('AUTH_TWITTER_VISIBLE', false),
           //     'app_id' => env('AUTH_TWITTER_APP_ID', null),
           //     'app_secret' => env('AUTH_TWITTER_APP_SECRET', null),
           //),

	   'AcessoCidadaoES' => array(
                'visible' => env('AUTH_ACESSO_CIDADAO_ES_ID', false),
                'response_type' => 'code',
                'client_id' => env('AUTH_ACESSO_CIDADAO_ES_CLIENT_ID', null),
                'client_secret' => env('AUTH_ACESSO_CIDADAO_ES_SECRET', null),
                'scope' => env('AUTH_ACESSO_CIDADAO_ES_SCOPE', null),
                'redirect_uri' => env('AUTH_ACESSO_CIDADAO_ES_REDIRECT_URI', null),
                'auth_endpoint' => env('AUTH_ACESSO_CIDADAO_ES_ENDPOINT', null),
                'token_endpoint' => env('AUTH_ACESSO_CIDADAO_ES_TOKEN_ENDPOINT', null),
                'nonce' => env('AUTH_ACESSO_CIDADAO_ES_NONCE', null),
                'code_verifier' => env('AUTH_ACESSO_CIDADAO_ES_CODE_VERIFIER', null),
                'code_challenge' => env('AUTH_ACESSO_CIDADAO_ES_CHALLENGE', null),
                'code_challenge_method' => env('AUTH_ACESSO_CIDADAO_ES_CHALLENGE_METHOD', null),
                'userinfo_endpoint' => env('AUTH_ACESSO_CIDADAO_ES_USERINFO_ENDPOINT', null),
                'state_salt' => env('AUTH_ACESSO_CIDADAO_ES_STATE_SALT', null),
                'applySealId' => env('AUTH_ACESSO_CIDADAO_ES_APPLY_SEAL_ID', null),
                'menssagem_authenticated' => env('AUTH_ACESSO_CIDADAO_ES_MENSSAGEM_AUTHENTICATED','Usuario ja se autenticou pelo AcessoCidadaoES'),
                'dic_agent_fields_update' => json_decode(env('AUTH_ACESSO_CIDADAO_ES_DICT_AGENT_FIELDS_UPDATE', '{"nomeCompleto": "full_name", "name": "name", "documento": "cpf", "cpf": "cpf", "emailPrivado": "email", "telefone1": "phone_number"}'), true)
           ),

	    'govbr' => [
                'visible' => env('AUTH_GOV_BR_ID', false),
                'response_type' => env('AUTH_GOV_BR_RESPONSE_TYPE', 'code'),
                'client_id' => env('AUTH_GOV_BR_CLIENT_ID', null),
                'client_secret' => env('AUTH_GOV_BR_SECRET', null),
                'scope' => env('AUTH_GOV_BR_SCOPE', null),
                'redirect_uri' => env('AUTH_GOV_BR_REDIRECT_URI', null),
                'auth_endpoint' => env('AUTH_GOV_BR_ENDPOINT', null),
                'token_endpoint' => env('AUTH_GOV_BR_TOKEN_ENDPOINT', null),
                'nonce' => env('AUTH_GOV_BR_NONCE', null),
                'code_verifier' => env('AUTH_GOV_BR_CODE_VERIFIER', null),
                'code_challenge' => env('AUTH_GOV_BR_CHALLENGE', null),
                'code_challenge_method' => env('AUTH_GOV_BR_CHALLENGE_METHOD', null),
                'userinfo_endpoint' => env('AUTH_GOV_BR_USERINFO_ENDPOINT', null),
                'state_salt' => env('AUTH_GOV_BR_STATE_SALT', null),
                'applySealId' => env('AUTH_GOV_BR_APPLY_SEAL_ID', null),
                'menssagem_authenticated' => env('AUTH_GOV_BR_MENSSAGEM_AUTHENTICATED','Usuário já se autenticou pelo GovBr'),
	        'dic_agent_fields_update' => json_decode(env('AUTH_GOV_BR_DICT_AGENT_FIELDS_UPDATE', '{"nomeCompleto": "full_name", "name": "name", "documento": "cpf", "cpf": "cpf", "emailPrivado": "email", "telefone1": "phone_number"}'), true)
		        //'dic_agent_fields_update' => env('AUTH_GOV_BR_DICT_AGENT_FIELDS_UPDATE','[]')
                //'dic_agent_fields_update' => [
                //    'nomeCompleto' => 'full_name',
                //    'name' => 'name',
                //    'documento' => 'cpf',
                //    'cpf' => 'cpf',
                //    'emailPrivado' => 'email',
                //    'telefone1' => 'phone_number',
                //]
            ]
        ]
    ),
];
