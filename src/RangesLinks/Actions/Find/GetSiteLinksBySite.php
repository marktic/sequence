<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Actions\Find;

use Bytic\Actions\Behaviours\Entities\FindRecords;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\SiteLinks\Actions\AbstractAction;

class GetSiteLinksBySite extends AbstractAction
{
    use FindRecords;
    use HasSubject;

    protected ?string $linkType = null;


    public function withLinkType(string $linkType): static
    {
        $this->linkType = $linkType;
        return $this;
    }

    protected function findParams(): array
    {
        $subject = $this->getSubject();

        $params = [];
        $params['where'][] = ['range_id = ? ', $subject->id];
        if ($this->linkType !== null) {
            $params['where'][] = ['link_type = ? ', $this->linkType];
        }
        return $params;
    }
}
