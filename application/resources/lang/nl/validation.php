<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | De following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'De :attribute moet geaccepteerd worden.',
    'active_url'           => 'De :attribute is geen geldige URL.',
    'after'                => 'De :attribute moet een datum na :date zijn.',
    'after_or_equal'       => 'De :attribute moet een datum gelijk aan of na :date zijn.',
    'alpha'                => 'De :attribute mag alleen letters bevatten.',
    'alpha_dash'           => 'De :attribute mag alleen letters, cijfers en streepjes bevatten.',
    'alpha_num'            => 'De :attribute mag alleen letters en cijfers bevatten.',
    'array'                => 'De :attribute moet een array zijn.',
    'before'               => 'De :attribute moet een datum voor :date zijn.',
    'before_or_equal'      => 'De :attribute moet een datum voor of gelijk aan :date zijn.',
    'between'              => [
        'numeric' => 'De :attribute moet tussen de :min en :max zijn.',
        'file'    => 'De :attribute moet tussen de :min en :max kilobyte zijn.',
        'string'  => 'De :attribute moet tussen de :min en :max tekens zijn.',
        'array'   => 'De :attribute moet tussen de :min en :max items bevatten.',
    ],
    'boolean'              => 'Het :attribute veld moet true of false zijn.',
    'confirmed'            => 'De :attribute bevestiging is niet gelijk.',
    'date'                 => 'De :attribute is geen geldige datum',
    'date_format'          => 'De :attribute is niet volgens het formaat :format.',
    'different'            => 'De :attribute en :other moeten verschillend zijn.',
    'digits'               => 'De :attribute moet :digits tekens lang zijn.',
    'digits_between'       => 'De :attribute moet tussen de :min en :max tekens bevatten.',
    'dimensions'           => 'De :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct'             => 'Het :attribute veld heeft een dubbele/gelijke waarde.',
    'email'                => 'Het :attribute moet een geldig emailadres zijn.',
    'exists'               => 'Het geselecteerde :attribute is ongeldig.',
    'file'                 => 'De :attribute moet een bestand zijn.',
    'filled'               => 'De :attribute field moet een waarde hebben.',
    'image'                => 'De :attribute moet een afbeelding zijn.',
    'in'                   => 'De geselecteerde :attribute is ongeldig.',
    'in_array'             => 'Het :attribute veld bestaat niet in :other.',
    'integer'              => 'De :attribute moet een cijfer zijn.',
    'ip'                   => 'Het :attribute moet een geldig IP adres zijn.',
    'ipv4'                 => 'Het :attribute moet een geldig IPv4 adres zijn.',
    'ipv6'                 => 'Het :attribute moet een geldig IPv6 adres zijn.',
    'json'                 => 'Het :attribute moet een geldige JSON zin zijn.',
    'max'                  => [
        'numeric' => 'De :attribute mag niet groter zijn dan :max.',
        'file'    => 'De :attribute mag niet groter zijn dan :max kilobyte.',
        'string'  => 'De :attribute mag niet groter zijn dan :max tekens.',
        'array'   => 'De :attribute mag niet meer items bevatten dan :max items.',
    ],
    'mimes'                => 'De :attribute moet een bestandsindeling van: :values hebben.',
    'mimetypes'            => 'De :attribute moet een bestandsindeling: :values hebben.',
    'min'                  => [
        'numeric' => 'De :attribute moet minimaal :min zijn.',
        'file'    => 'De :attribute moet minimaal :min kilobyte zijn.',
        'string'  => 'De :attribute moet minimaal :min tekens zijn.',
        'array'   => 'De :attribute moet minimaal :min items bevatten.',
    ],
    'not_in'               => 'De geselecteerde :attribute is ongeldig.',
    'not_regex'            => 'Het :attribute formaat is ongeldig.',
    'numeric'              => 'De :attribute moet een cijfer zijn.',
    'present'              => 'De :attribute moet aanwezig zijn.',
    'regex'                => 'Het :attribute formaat is ongeldig.',
    'required'             => 'Het :attribute veld is verplicht.',
    'required_if'          => 'Het :attribute veld is verplicht als :other is :value.',
    'required_unless'      => 'Het :attribute veld is verplicht tenzij :other bestaat in :values.',
    'required_with'        => 'Het :attribute veld is verplicht als :values aanwezig is.',
    'required_with_all'    => 'Het :attribute veld is verplicht als :values aanwezig zijn.',
    'required_without'     => 'Het :attribute veld is verplicht als :values niet aanwezig is.',
    'required_without_all' => 'Het :attribute veld is verplicht als geen van :values aanwezig zijn.',
    'same'                 => 'De :attribute and :other moet match.',
    'size'                 => [
        'numeric' => 'De :attribute moet :size zijn.',
        'file'    => 'De :attribute moet :size kilobyte zijn.',
        'string'  => 'De :attribute moet :size tekens zijn.',
        'array'   => 'De :attribute moet :size items bevatten.',
    ],
    'string'               => 'De :attribute moet alleen alfanumerieke tekens bevatten.',
    'timezone'             => 'De :attribute moet een geldige tijdzone zijn.',
    'unique'               => 'De :attribute is al in gebruik.',
    'uploaded'             => 'De :attribute is mislukt te uploaden.',
    'url'                  => 'De :attribute formaat is ongeldig.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | De following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
