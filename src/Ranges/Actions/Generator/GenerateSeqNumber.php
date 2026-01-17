<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Actions\Generator;

use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Sequence\Ranges\Actions\AbstractAction;
use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\RangesLinks\Actions\Find\GetRangeLinksByLink;

class GenerateSeqNumber extends AbstractAction
{
    use HasSubject;

    protected SeqRange $range;

    public function nextNumber(): ?string
    {
        $this->range = GetRangeLinksByLink::for($this->getSubject())->fetch();
        if ($this->range === null) {
            return null;
        }
        return $this->generate();
    }

    protected function generate(): ?string
    {
        $nextNumber = $this->getNextNumber();
        $number = $this->formatNumber($nextNumber);
        return $number;
    }

    protected function getNextNumber(): ?int
    {
        $numberCurrent = $this->range->getNumberCurrent();
        if ($numberCurrent === null) {
            $nextNumber = $this->range->getNumberStart();
        } else {
            $nextNumber = $numberCurrent + 1;
        }
        $this->range->setNumberCurrent($nextNumber);
        $this->range->save();
        return $nextNumber;
    }

    protected function formatNumber(int $nextNumber)
    {
        $requiredDigits = $this->range->number_length;
        $numberStr = str_pad((string)$nextNumber, $requiredDigits, '0', STR_PAD_LEFT);
        $prefix = $this->range->prefix ?? '';
        $suffix = $this->range->suffix ?? '';
        return $prefix.$numberStr.$suffix;
    }
}
