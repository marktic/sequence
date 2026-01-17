<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers;

use Marktic\Sequence\Bundle\Modules\Admin\Controllers\Behaviours\HasTenantControllerTrait;
use Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges\DetailsForm;
use Marktic\Sequence\Ranges\Models\SeqRange;

/**
 * @method SeqRange getModelFromRequest
 */
trait SeqRangesControllerTrait
{
    use HasTenantControllerTrait;

    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }

    public function view()
    {
        parent::view();

        $item = $this->getModelFromRequest();
        $this->payload()->with([
            'seqLinks' => $item->getSeqRangesLinks(),
        ]);
    }
}