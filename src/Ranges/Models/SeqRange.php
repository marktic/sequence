<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Models;

use Marktic\Sequence\AbstractBase\Models\SequenceRecord;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLink;

/**
 * Class SequenceRange
 * @package Marktic\Sequence\Ranges\Models
 * @method SeqRangesLink[] getSeqRangesLinks()
 */
class SeqRange extends SequenceRecord
{
    public $name;
    public $number_start;
    public $number_end;
    public $number_current;

    public function getName()
    {
        return $this->name;
    }

    public function getNumberStart(): int
    {
        $int = (int)$this->number_start;
        return $int;
    }

    public function getNumberEnd(): ?int
    {
        if (empty($this->number_end)) {
            return null;
        }
        $int = (int)$this->number_end;
        return $int;
    }

    public function getNumberCurrent()
    {
        if (empty($this->number_current)) {
            return null;
        }
        $int = (int)$this->number_current;
        return $int;
    }

    public function setNumberCurrent(int|string|null $nextNumber): static
    {
        $this->number_current = $nextNumber ? intval($nextNumber) : null;
        return $this;
    }

    public function getPattern(): string
    {
        $digits = str_pad('0', $this->number_length, '0', STR_PAD_LEFT);
        return $this->prefix . $digits . $this->suffix;
    }
}
