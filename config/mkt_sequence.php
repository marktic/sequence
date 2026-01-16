<?php

use Marktic\Sequence\Ranges\Models\SeqRanges;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLinks;
use Marktic\Sequence\Utility\SequenceModels;

return [
    'models' => array(
        SequenceModels::RANGES => SeqRanges::class,
        SequenceModels::RANGE_LINKS => SeqRangesLinks::class,
    ),
    'tables' => [
        SequenceModels::RANGES => SeqRanges::TABLE,
        SequenceModels::RANGE_LINKS => SeqRangesLinks::TABLE,
    ],
    'database' => [
        'connection' => 'main',
        'migrations' => true,
    ],
];
