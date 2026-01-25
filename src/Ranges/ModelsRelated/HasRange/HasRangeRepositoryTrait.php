<?php

namespace Marktic\Sequence\Ranges\ModelsRelated\HasRange;

use Marktic\Sequence\Utility\SequenceModels;

trait HasRangeRepositoryTrait
{
    public const RELATION_SEQ_RANGE = 'SeqRange';

    protected function initRelations(): void
    {
        parent::initRelations();
        $this->initRelationsSequence();
    }

    protected function initRelationsSequence(): void
    {
        $this->initRelationsSequenceRange();
    }

    /**
     * @inheritDoc
     */
    protected function initRelationsSequenceRange()
    {
        $this->belongsTo(
            self::RELATION_SEQ_RANGE,
            ['class' => SequenceModels::rangesClass(), 'fk' => 'range_id']
        );
    }
}
