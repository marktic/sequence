<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Actions\Find;

use Bytic\Actions\Behaviours\Entities\FindRecords;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Sequence\RangesLinks\Actions\AbstractAction;

class GetRangeLinksByLink extends AbstractAction
{
    use FindRecords;
    use HasSubject;

    protected function findParams(): array
    {
        $subject = $this->getSubject();

        $params = [];
        $params['where'][] = ['link_type = ? ', $subject->getManager()->getMorphName()];
        $params['where'][] = ['link_id = ? ', $subject->id];
        return $params;
    }
}
