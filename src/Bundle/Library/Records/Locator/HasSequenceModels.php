<?php

namespace Marktic\Sequence\Bundle\Library\Records\Locator;

use Marktic\Sequence\Ranges\Models\SeqRanges;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLinks;
use Marktic\Sequence\Utility\SequenceModels;
use Nip\Records\RecordManager;

trait HasSequenceModels
{
    /**
     */
    public static function seqRanges(): SeqRanges|RecordManager
    {
        return SequenceModels::ranges();
    }

    /**
     * @return SeqRangesLinks|RecordManager
     */
    public static function seqRangeLinks(): SeqRangesLinks|RecordManager
    {
        return SequenceModels::rangeLinks();
    }
}