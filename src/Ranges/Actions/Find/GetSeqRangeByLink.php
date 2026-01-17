<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Actions\Find;

use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Sequence\Ranges\Actions\AbstractAction;
use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\RangesLinks\Actions\Find\GetRangeLinksByLink;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLink;

class GetSeqRangeByLink extends AbstractAction
{
    use HasSubject;

    public function fetch(): ?SeqRange
    {
        $subject = $this->getSubject();
        $links = GetRangeLinksByLink::for($subject)->fetch();
        if ($links->count() < 1) {
            return null;
        }
        /** @var SeqRangesLink $link */
        $link = $links->first();
        return $link->getRange();
    }
}
