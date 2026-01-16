<?php

namespace Marktic\Sequence\RangesLinks\Actions;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\Entities\HasRepository;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLinks;
use Marktic\Sequence\Utility\SequenceModels;
use Nip\Records\AbstractModels\RecordManager;

/**
 * @method SeqRangesLinks getRepository
 */
abstract class AbstractAction extends Action
{
    use HasRepository;

    protected function generateRepository(): RecordManager
    {
        return SequenceModels::rangeLinks();
    }
}