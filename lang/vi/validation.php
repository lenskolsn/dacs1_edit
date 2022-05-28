<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Thông báo lỗi tiếng Việt khi validate dữ liệu
    | Chỉnh sửa ['locale' => 'en'] thành ['locale' => 'vi'] ở [config/app.php]
    | để sử dụng file này
    |--------------------------------------------------------------------------
    */

    'accepted'             => ':attribute phải được chấp nhận.',
    'accepted_if'          => ':attribute phải được chấp nhận khi :other là :value.',
    'active_url'           => ':attribute không phải là một URL hợp lệ.',
    'after'                => ':attribute phải là một ngày sau ngày :date.',
    'after_or_equal'       => ':attribute phải là thời gian bắt đầu sau hoặc đúng bằng :date.',
    'alpha'                => ':attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash'           => ':attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.',
    'alpha_num'            => ':attribute chỉ có thể chứa chữ cái và số.',
    'array'                => ':attribute phải là dạng mảng.',
    'before'               => ':attribute phải là một ngày trước ngày :date.',
    'before_or_equal'      => ':attribute phải là thời gian bắt đầu trước hoặc đúng bằng :date.',
    'between'              => [
        'numeric' => ':attribute phải nằm trong khoảng :min - :max.',
        'file'    => 'Dung lượng tập tin ":attribute" phải từ :min - :max kB.',
        'string'  => ':attribute phải từ :min - :max kí tự.',
        'array'   => ':attribute phải có từ :min - :max phần tử.',
    ],
    'boolean'              => ':attribute phải là true hoặc false.',
    'confirmed'            => 'Giá trị xác nhận trong :attribute không khớp.',
    'current_password'     => 'Mật khẩu không đúng.',
    'date'                 => ':attribute không phải là định dạng ngày-tháng.',
    'date_equals'          => ':attribute phải là một ngày bằng với :date.',
    'date_format'          => ':attribute không giống với định dạng :format.',
    'declined'             => ':attribute phải là "no", "off", "0" hoặc "false".',
    'declined_if'          => ':attribute phải là "no", "off", "0" hoặc "false" khi :other là :value.',
    'different'            => ':attribute và :other phải khác nhau.',
    'digits'               => ':attribute phải gồm :digits chữ số.',
    'digits_between'       => ':attribute phải nằm trong khoảng :min and :max chữ số.',
    'dimensions'           => ':attribute có kích thước không hợp lệ.',
    'distinct'             => ':attribute đã được sử dụng.',
    'email'                => ':attribute phải là một địa chỉ email hợp lệ.',
    'ends_with'            => ':attribute phải kết thúc bằng một trong những giá trị sau: :values',
    'enum'                 => ':attribute không hợp lệ.',
    'exists'               => ':attribute không hợp lệ.',
    'file'                 => ':attribute phải là một tệp tin.',
    'filled'               => ':attribute không được bỏ trống.',
    'gt'                   => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file'    => ':attribute phải có dung lượng lớn hơn :value kilobytes.',
        'string'  => ':attribute phải nhiều hơn :value kí tự.',
        'array'   => 'Mảng :attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file'    => ':attribute phải có dung lượng lớn hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải có ít nhất :value kí tự.',
        'array'   => ':attribute phải có ít nhất :value phần tử.',
    ],
    'image'                => ':attribute phải là định dạng hình ảnh.',
    'in'                   => ':attribute không hợp lệ.',
    'in_array'             => ':attribute phải thuộc :other.',
    'integer'              => ':attribute phải là một số nguyên.',
    'ip'                   => ':attribute phải là một địa chỉ IP.',
    'ipv4'                 => ':attribute phải là một địa chỉ IPv4.',
    'ipv6'                 => ':attribute phải là một địa chỉ IPv6.',
    'mac_address'          => ':attribute phải là một địa chỉ MAC.',
    'json'                 => ':attribute phải là một chuỗi JSON.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file'    => ':attribute phải có dung lượng nhỏ hơn :value kilobytes.',
        'string'  => ':attribute phải ít hơn :value kí tự.',
        'array'   => ':attribute phải có ít hơn :value phần tử.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file'    => ':attribute không được nhỏ hơn :value kilobytes.',
        'string'  => ':attribute tối đa chỉ :value kí tự.',
        'array'   => ':attribute không được có nhiều hơn :value phần tử.',
    ],
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file'    => ':attribute không được lớn hơn :max kB.',
        'string'  => ':attribute không được nhiều hơn :max kí tự.',
        'array'   => ':attribute không được lớn hơn :max phần tử.',
    ],
    'mimes'                => ':attribute phải là một tập tin có định dạng: :values.',
    'mimetypes'            => ':attribute phải là một tập tin có định dạng: :values.',
    'min' => [
        'numeric' => ':attribute phải lớn hơn :min.',
        'file'    => ':attribute phải có dung lượng tối thiểu :min kB.',
        'string'  => ':attribute phải có tối thiểu :min kí tự.',
        'array'   => ':attribute phải có tối thiểu :min phần tử.',
    ],
    'multiple_of'          => ':attribute phải là bội số của :value',
    'not_in'               => ':attribute không hợp lệ.',
    'not_regex'            => ':attribute có định dạng không hợp lệ.',
    'numeric'              => ':attribute phải là một số.',
    'password'             => 'Mật khẩu không đúng.',
    'present'              => ':attribute phải được cung cấp.',
    'prohibited'           => ':attribute bị cấm.',
    'prohibited_if'        => ':attribute bị cấm khi :other là :value.',
    'prohibited_unless'    => ':attribute bị cấm trừ khi :other là một trong :values.',
    'prohibits'            => ':attribute bị cấm khi :other hiện diện',
    'regex'                => ':attribute có định dạng không hợp lệ.',
    'required'             => ':attribute là bắt buộc.',
    'required_if'          => ':attribute là bắt buộc khi :other là :value.',
    'required_unless'      => ':attribute không được bỏ trống trừ khi :other là :values.',
    'required_with'        => ':attribute không được bỏ trống khi một trong :values có giá trị.',
    'required_with_all'    => ':attribute không được bỏ trống khi tất cả :values có giá trị.',
    'required_without'     => ':attribute không được bỏ trống khi một trong :values không có giá trị.',
    'required_without_all' => ':attribute không được bỏ trống khi tất cả :values không có giá trị.',
    'same' => '":attribute" và ":other" phải giống nhau.',
    'size' => [
        'numeric' => ':attribute phải bằng :size.',
        'file'    => ':attribute phải có dung lượng bằng :size kB.',
        'string'  => ':attribute phải chứa :size kí tự.',
        'array'   => ':attribute phải chứa :size phần tử.',
    ],
    'starts_with'          => ':attribute phải được bắt đầu bằng một trong những giá trị sau: :values',
    'string'               => ':attribute phải là một chuỗi kí tự.',
    'timezone'             => ':attribute phải là một múi giờ hợp lệ.',
    'unique'               => ':attribute đã tồn tại.',
    'uploaded'             => ':attribute tải lên thất bại.',
    'url'                  => ':attribute không giống với định dạng một URL.',
    'uuid'                 => ':attribute phải là một chuỗi UUID hợp lệ.',

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

    'attributes' => [],

];
