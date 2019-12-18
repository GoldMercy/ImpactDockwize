<?php

namespace App\Exports;

use App\Answer;
use Maatwebsite\Excel\Concerns\FromArray;

class AnswerExport implements FromArray
{
    protected $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function array(): array
    {
        return $this->values;
    }
}
