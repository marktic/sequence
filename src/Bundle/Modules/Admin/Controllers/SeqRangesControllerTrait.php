<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers;

use Marktic\Sequence\Bundle\Modules\Admin\Controllers\Behaviours\HasTenantControllerTrait;
use Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges\DetailsForm;

trait SeqRangesControllerTrait
{
    use HasTenantControllerTrait;

    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }
}