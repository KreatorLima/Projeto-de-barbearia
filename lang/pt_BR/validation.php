<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O campo :attribute precisa ser aceito.',
    'accepted_if' => 'O campo :attribute precisa ser aceito quando :other for :value.',
    'active_url' => 'O campo :attribute precisa ser uma URL válida.',
    'after' => 'O campo :attribute precisa ser uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute precisa ser uma data igual ou posterior a :date.',
    'alpha' => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deve conter apenas letras, números, hífens e sublinhados.',
    'alpha_num' => 'O campo :attribute deve conter apenas letras e números.',
    'any_of' => 'O campo :attribute é inválido.',
    'array' => 'O campo :attribute precisa ser uma lista de itens.',
    'ascii' => 'O campo :attribute deve conter apenas caracteres alfanuméricos e símbolos simples.',
    'before' => 'O campo :attribute precisa ser uma data anterior a :date.',
    'before_or_equal' => 'O campo :attribute precisa ser uma data igual ou anterior a :date.',
    'between' => [
        'array' => 'O campo :attribute precisa ter entre :min e :max itens.',
        'file' => 'O arquivo do campo :attribute precisa ter entre :min e :max quilobytes.',
        'numeric' => 'O campo :attribute precisa estar entre :min e :max.',
        'string' => 'O campo :attribute precisa ter entre :min e :max caracteres.',
    ],
    'boolean' => 'O campo :attribute precisa ser verdadeiro ou falso.',
    'can' => 'O campo :attribute contém um valor não autorizado.',
    'confirmed' => 'A confirmação do campo :attribute não corresponde.',
    'contains' => 'Está faltando um valor obrigatório no campo :attribute.',
    'current_password' => 'A senha informada está incorreta.',
    'date' => 'O campo :attribute precisa ser uma data válida.',
    'date_equals' => 'O campo :attribute precisa ser uma data igual a :date.',
    'date_format' => 'O campo :attribute precisa seguir o formato :format.',
    'decimal' => 'O campo :attribute precisa ter :decimal casas decimais.',
    'declined' => 'O campo :attribute precisa ser recusado.',
    'declined_if' => 'O campo :attribute precisa ser recusado quando :other for :value.',
    'different' => 'Os campos :attribute e :other precisam ser diferentes.',
    'digits' => 'O campo :attribute precisa ter :digits dígitos.',
    'digits_between' => 'O campo :attribute precisa ter entre :min e :max dígitos.',
    'dimensions' => 'O campo :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute tem um valor duplicado.',
    'doesnt_contain' => 'O campo :attribute não pode conter: :values.',
    'doesnt_end_with' => 'O campo :attribute não pode terminar com: :values.',
    'doesnt_start_with' => 'O campo :attribute não pode começar com: :values.',
    'email' => 'Informe um endereço de e-mail válido.',
    'encoding' => 'O campo :attribute precisa usar a codificação :encoding.',
    'ends_with' => 'O campo :attribute precisa terminar com um destes valores: :values.',
    'enum' => 'O valor selecionado para :attribute é inválido.',
    'exists' => 'O valor selecionado para :attribute é inválido.',
    'extensions' => 'O arquivo do campo :attribute precisa ter uma destas extensões: :values.',
    'file' => 'O campo :attribute precisa ser um arquivo.',
    'filled' => 'O campo :attribute precisa ser preenchido.',
    'gt' => [
        'array' => 'O campo :attribute precisa ter mais de :value itens.',
        'file' => 'O arquivo do campo :attribute precisa ter mais de :value quilobytes.',
        'numeric' => 'O campo :attribute precisa ser maior que :value.',
        'string' => 'O campo :attribute precisa ter mais de :value caracteres.',
    ],
    'gte' => [
        'array' => 'O campo :attribute precisa ter :value itens ou mais.',
        'file' => 'O arquivo do campo :attribute precisa ter pelo menos :value quilobytes.',
        'numeric' => 'O campo :attribute precisa ser maior ou igual a :value.',
        'string' => 'O campo :attribute precisa ter pelo menos :value caracteres.',
    ],
    'hex_color' => 'O campo :attribute precisa ser uma cor hexadecimal válida.',
    'image' => 'O campo :attribute precisa ser uma imagem.',
    'in' => 'O valor selecionado para :attribute é inválido.',
    'in_array' => 'O campo :attribute precisa existir em :other.',
    'in_array_keys' => 'O campo :attribute precisa conter ao menos uma destas chaves: :values.',
    'integer' => 'O campo :attribute precisa ser um número inteiro.',
    'ip' => 'O campo :attribute precisa ser um endereço IP válido.',
    'ipv4' => 'O campo :attribute precisa ser um endereço IPv4 válido.',
    'ipv6' => 'O campo :attribute precisa ser um endereço IPv6 válido.',
    'json' => 'O campo :attribute precisa ser um texto JSON válido.',
    'list' => 'O campo :attribute precisa ser uma lista.',
    'lowercase' => 'O campo :attribute precisa estar em letras minúsculas.',
    'lt' => [
        'array' => 'O campo :attribute precisa ter menos de :value itens.',
        'file' => 'O arquivo do campo :attribute precisa ter menos de :value quilobytes.',
        'numeric' => 'O campo :attribute precisa ser menor que :value.',
        'string' => 'O campo :attribute precisa ter menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'O campo :attribute não pode ter mais de :value itens.',
        'file' => 'O arquivo do campo :attribute precisa ter no máximo :value quilobytes.',
        'numeric' => 'O campo :attribute precisa ser menor ou igual a :value.',
        'string' => 'O campo :attribute precisa ter no máximo :value caracteres.',
    ],
    'mac_address' => 'O campo :attribute precisa ser um endereço MAC válido.',
    'max' => [
        'array' => 'O campo :attribute não pode ter mais de :max itens.',
        'file' => 'O arquivo do campo :attribute não pode ter mais de :max quilobytes.',
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'string' => 'O campo :attribute não pode ter mais de :max caracteres.',
    ],
    'max_digits' => 'O campo :attribute não pode ter mais de :max dígitos.',
    'mimes' => 'O campo :attribute precisa ser um arquivo de um destes tipos: :values.',
    'mimetypes' => 'O campo :attribute precisa ser um arquivo de um destes tipos: :values.',
    'min' => [
        'array' => 'O campo :attribute precisa ter pelo menos :min itens.',
        'file' => 'O arquivo do campo :attribute precisa ter pelo menos :min quilobytes.',
        'numeric' => 'O campo :attribute precisa ser no mínimo :min.',
        'string' => 'O campo :attribute precisa ter pelo menos :min caracteres.',
    ],
    'min_digits' => 'O campo :attribute precisa ter pelo menos :min dígitos.',
    'missing' => 'O campo :attribute não pode ser informado.',
    'missing_if' => 'O campo :attribute não pode ser informado quando :other for :value.',
    'missing_unless' => 'O campo :attribute não pode ser informado, a menos que :other seja :value.',
    'missing_with' => 'O campo :attribute não pode ser informado quando :values estiver presente.',
    'missing_with_all' => 'O campo :attribute não pode ser informado quando todos estes campos estiverem presentes: :values.',
    'multiple_of' => 'O campo :attribute precisa ser múltiplo de :value.',
    'not_in' => 'O valor selecionado para :attribute é inválido.',
    'not_regex' => 'O formato do campo :attribute é inválido.',
    'numeric' => 'O campo :attribute precisa ser um número.',
    'password' => [
        'letters' => 'O campo :attribute precisa conter pelo menos uma letra.',
        'mixed' => 'O campo :attribute precisa conter ao menos uma letra maiúscula e uma minúscula.',
        'numbers' => 'O campo :attribute precisa conter pelo menos um número.',
        'symbols' => 'O campo :attribute precisa conter pelo menos um símbolo.',
        'uncompromised' => 'O valor informado para :attribute apareceu em um vazamento de dados. Escolha outro valor.',
    ],
    'present' => 'O campo :attribute precisa estar presente.',
    'present_if' => 'O campo :attribute precisa estar presente quando :other for :value.',
    'present_unless' => 'O campo :attribute precisa estar presente, a menos que :other seja :value.',
    'present_with' => 'O campo :attribute precisa estar presente quando :values estiver presente.',
    'present_with_all' => 'O campo :attribute precisa estar presente quando todos estes campos estiverem presentes: :values.',
    'prohibited' => 'O campo :attribute não pode ser informado.',
    'prohibited_if' => 'O campo :attribute não pode ser informado quando :other for :value.',
    'prohibited_if_accepted' => 'O campo :attribute não pode ser informado quando :other for aceito.',
    'prohibited_if_declined' => 'O campo :attribute não pode ser informado quando :other for recusado.',
    'prohibited_unless' => 'O campo :attribute não pode ser informado, a menos que :other esteja em :values.',
    'prohibits' => 'O campo :attribute impede que :other seja informado.',
    'regex' => 'O formato do campo :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_array_keys' => 'O campo :attribute precisa conter estas entradas: :values.',
    'required_if' => 'O campo :attribute é obrigatório quando :other for :value.',
    'required_if_accepted' => 'O campo :attribute é obrigatório quando :other for aceito.',
    'required_if_declined' => 'O campo :attribute é obrigatório quando :other for recusado.',
    'required_unless' => 'O campo :attribute é obrigatório, a menos que :other esteja em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values estiver presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando todos estes campos estiverem presentes: :values.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não estiver presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum destes campos estiver presente: :values.',
    'same' => 'O campo :attribute precisa corresponder a :other.',
    'size' => [
        'array' => 'O campo :attribute precisa conter :size itens.',
        'file' => 'O arquivo do campo :attribute precisa ter :size quilobytes.',
        'numeric' => 'O campo :attribute precisa ser :size.',
        'string' => 'O campo :attribute precisa ter :size caracteres.',
    ],
    'starts_with' => 'O campo :attribute precisa começar com um destes valores: :values.',
    'string' => 'O campo :attribute precisa ser um texto.',
    'timezone' => 'O campo :attribute precisa ser um fuso horário válido.',
    'unique' => 'Este valor para :attribute já está sendo usado.',
    'uploaded' => 'Não foi possível enviar o arquivo de :attribute.',
    'uppercase' => 'O campo :attribute precisa estar em letras maiúsculas.',
    'url' => 'O campo :attribute precisa ser uma URL válida.',
    'ulid' => 'O campo :attribute precisa ser um ULID válido.',
    'uuid' => 'O campo :attribute precisa ser um UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
        'current_password' => 'senha atual',
        'name' => 'nome',
    ],

];
