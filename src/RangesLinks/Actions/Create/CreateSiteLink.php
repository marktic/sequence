<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Actions\Create;

use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\RangesLinks\Actions\AbstractAction;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLink;
use Nip\Records\AbstractModels\Record;

class CreateSiteLink extends AbstractAction
{
    protected SeqRange $range;
    /**
     * @var Record
     */
    protected Record $link;

    public static function for(SeqRange $range, Record $link): self
    {
        $action = new self();
        $action->range = $range;
        $action->link = $link;
        return $action;
    }

    public function create(): Record|SeqRangesLink
    {
        /** @var SeqRangesLink $record */
        $record = $this->getRepository()->getNew();
        $record->range_id = $this->range->id;
        $record->populateFromLink($this->link);
        $record->save();
        return $record;
    }
}