<?php

namespace Marktic\Sequence\Ranges\ModelsRelated\HasRange;

use Marktic\Sequence\Ranges\Models\SeqRange;

/**
 * @method SeqRange getSeqRange()
 */
trait HasRangeRecordTrait
{
    public int|string|null $range_id = null;

    public function populateFromPageSection(SeqRange $range): self
    {
        $this->range_id = $range->id;
        $this->getRelation('SeqRange')->setResults($range);
        return $this;
    }
}
