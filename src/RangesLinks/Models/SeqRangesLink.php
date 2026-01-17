<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Models;

use Marktic\Sequence\AbstractBase\Models\SequenceRecord;
use Nip\Records\AbstractModels\Record;

/**
 * Class SequenceRanges
 * @package Marktic\Sequence\Ranges\Models
 * @method Record getLinkRecord
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
