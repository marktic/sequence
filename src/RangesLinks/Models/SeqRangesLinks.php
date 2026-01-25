<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Models;

use Marktic\Sequence\AbstractBase\Models\SequenceRepository;
use Marktic\Sequence\Ranges\ModelsRelated\HasRange\HasRangeRepositoryTrait;
use Marktic\Sequence\Utility\PackageConfig;

/**
 * Class SequenceRange
 * @package Marktic\Sequence\Ranges\Models
 */
class SeqRangesLinks extends SequenceRepository
{
    use HasRangeRepositoryTrait;

    public const TABLE = 'mkt_sequence_links';
    public const CONTROLLER = 'mkt_sequence-ranges_links';

    public function initRelationsSequence()
    {
        $this->initRelationsSequenceRange();
        $this->morphTo('LinkRecord', ['morphPrefix' => 'link']);
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
