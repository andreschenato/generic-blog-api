<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class PostFilter extends ApiFilter{
    protected $safeParams = [
        'title' => ['eq'],
    ];

    protected $operatorMap = [
        'eq'=> '=',
    ];
}