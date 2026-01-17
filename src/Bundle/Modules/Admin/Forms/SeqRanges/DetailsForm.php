<?php

declare(strict_types=1);

namespace Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges;

use Marktic\Sequence\Bundle\Library\Form\FormModel;
use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\Utility\SequenceModels;

/**
 * @method SeqRange getModel()
 */
class DetailsForm extends FormModel
{
    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-seq-ranges-form');

        $this->initializeName();
        $this->initializeNumbers();
        $this->initializePattern();

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeName(): void
    {
        $this->addInput('name', translator()->trans('name'), true);
    }

    protected function initializeNumbers()
    {
        $this->addNumber('start_number', SequenceModels::ranges()->getLabel('field.number_start'), true);
    }

    protected function initializePattern()
    {
        $this->addInput('prefix', SequenceModels::ranges()->getLabel('field.prefix'));
        $this->addInput('suffix', SequenceModels::ranges()->getLabel('field.suffix'));
    }
}
