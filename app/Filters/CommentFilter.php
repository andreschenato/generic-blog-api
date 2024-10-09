<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class CommentFilter extends ApiFilter
{
    protected $safeParams = [
        'postId' => ['eq'],
    ];

    protected $columnMap = [
        'postId' => 'post_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];
}