<?php

declare(strict_types=1);

namespace Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges;

use Marktic\Sequence\Bundle\Library\Form\FormModel;
use Marktic\Sequence\Ranges\Models\SeqRange;

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

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeName(): void
    {
        $this->addInput('name', translator()->trans('name'), true);
    }
}
