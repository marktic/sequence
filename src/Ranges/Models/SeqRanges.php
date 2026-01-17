<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Models;

use Marktic\Sequence\Utility\PackageConfig;
use Marktic\Sequence\AbstractBase\Models\SequenceRepository;
use Marktic\Sequence\Utility\SequenceModels;

/**
 * Class SequenceRanges
 * @package Marktic\Sequence\Ranges\Models
 */
class SeqRanges extends SequenceRepository
{
    public const TABLE = 'mkt_sequence_ranges';
    public const CONTROLLER = 'mkt_sequence-ranges';

    protected function initRelationsSequence()
    {
        $this->hasMany('SeqLinks', ['class' => SequenceModels::rangeLinksClass(), 'fk' => 'range_id']);
    }

    public function getTable(): string
    {
        return PackageConfig::tableName(static::TABLE, static::TABLE);
    }

    public function getModelNamespace(): string
    {
        return __NAMESPACE__;
    }
}
