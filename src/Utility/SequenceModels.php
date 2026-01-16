<?php

declare(strict_types=1);

namespace Marktic\Sequence\Utility;

use ByTIC\PackageBase\Utility\ModelFinder;
use Marktic\Sequence\Ranges\Models\SeqRanges;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLinks;
use Marktic\Sequence\SequenceServiceProvider;
use Nip\Records\RecordManager;

/**
 * Class SequenceModels.
 */
class SequenceModels extends ModelFinder
{
    public const RANGES = 'ranges';

    public const RANGE_LINKS = 'range_links';

    public static function ranges(): SeqRanges|RecordManager
    {
        return static::getModels(self::RANGES, SeqRanges::class);
    }

    public static function rangesClass(): string
    {
        return static::getModelsClass(self::RANGES, SeqRanges::class);
    }

    public static function rangeLinks(): SeqRangesLinks|RecordManager
    {
        return static::getModels(self::RANGE_LINKS, SeqRangesLinks::class);
    }

    public static function rangeLinksClass(): string
    {
        return static::getModelsClass(self::RANGE_LINKS, SeqRangesLinks::class);
    }

    protected static function packageName(): string
    {
        return SequenceServiceProvider::NAME;
    }
}
