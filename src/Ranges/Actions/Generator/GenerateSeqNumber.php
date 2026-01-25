<?php

declare(strict_types=1);

namespace Marktic\Sequence\Ranges\Actions\Generator;

use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Sequence\Ranges\Actions\AbstractAction;
use Marktic\Sequence\Ranges\Models\SeqRange;

/**
 * @method SeqRange getSubject()
 */
class GenerateSeqNumber extends AbstractAction
{
    use HasSubject;

    public function nextNumber(): ?string
    {
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
        $range = $this->getSubject();
        $numberCurrent = $range->getNumberCurrent();
        if ($numberCurrent === null) {
            $nextNumber = $range->getNumberStart();
        } else {
            $nextNumber = $numberCurrent + 1;
        }
        $range->setNumberCurrent($nextNumber);
        $range->save();
        return $nextNumber;
    }

    protected function formatNumber(int $nextNumber)
    {
        $range = $this->getSubject();
        $requiredDigits = $range->getNumberLength();
        $numberStr = str_pad((string)$nextNumber, $requiredDigits, '0', STR_PAD_LEFT);
        $prefix = $range->prefix ?? '';
        $suffix = $range->suffix ?? '';
        return $prefix.$numberStr.$suffix;
    }
}
