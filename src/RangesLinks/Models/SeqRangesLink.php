<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Models;

use Marktic\Sequence\AbstractBase\Models\SequenceRecord;

/**
 * Class SequenceRanges
 * @package Marktic\Sequence\Ranges\Models
 */
class SeqRangesLink extends SequenceRecord
{
    public $link_id;
    public $link_type;

    public function populateFromLink($link)
    {
        $this->link_id = $link->id;
        $this->link_type = $link->getManager()->getMorphName();
    }
}
