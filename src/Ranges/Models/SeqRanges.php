<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Models;

use Marktic\Sequence\Utility\PackageConfig;
use Marktic\Sequence\AbstractBase\Models\SequenceRepository;

/**
 * Class SequenceRanges
 * @package Marktic\Sequence\Ranges\Models
 */
class SeqRanges extends SequenceRepository
{
    public const TABLE = 'sequence_ranges';
    public const CONTROLLER = 'sequence-ranges';

    public function getTable(): string
    {
        return PackageConfig::tableName(static::TABLE, static::TABLE);
    }

    public function getModelNamespace(): string
    {
        return __NAMESPACE__;
    }
}
