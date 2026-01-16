<?php

declare(strict_types=1);

namespace Marktic\Sequence\RangesLinks\Models;

use Marktic\Sequence\AbstractBase\Models\SequenceRepository;
use Marktic\Sequence\Utility\PackageConfig;

/**
 * Class SequenceRange
 * @package Marktic\Sequence\Ranges\Models
 */
class SeqRangesLinks extends SequenceRepository
{
    public const TABLE = 'sequence_ranges_links';
    public const CONTROLLER = 'sequence-ranges_links';

    public function getTable(): string
    {
        return PackageConfig::tableName(static::TABLE, static::TABLE);
    }

    public function getModelNamespace(): string
    {
        return __NAMESPACE__;
    }
}
