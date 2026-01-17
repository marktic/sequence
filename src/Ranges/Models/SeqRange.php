<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Models;

use Marktic\Sequence\AbstractBase\Models\SequenceRecord;

/**
 * Class SequenceRange
 * @package Marktic\Sequence\Ranges\Models
 */
class SeqRange extends SequenceRecord
{
    public $number_start;
    public $number_end;
    public $number_current;

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

    public function setNumberCurrent(int $nextNumber): static
    {
        $this->number_current = $nextNumber;
        return $this;
    }
}
