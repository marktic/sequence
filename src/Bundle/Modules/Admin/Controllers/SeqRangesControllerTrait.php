<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers;

use Marktic\Sequence\Bundle\Modules\Admin\Controllers\Behaviours\HasTenantControllerTrait;
use Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges\DetailsForm;
use Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges\LinksForm;
use Marktic\Sequence\Ranges\Models\SeqRange;

/**
 * @method SeqRange getModelFromRequest
 */
trait SeqRangesControllerTrait
{
    use HasTenantControllerTrait;

    /**
     * @return void
     */
    public function editLinks()
    {
        $item = $this->getModelFromRequest();

        /** @var LinksForm $form */
        $form = $this->getModelForm($item, 'editLinks');
        $form->setLinkables($this->generateRangeLinkables($item));

        $this->processForm($form);

        $this->payload()->with([
            'form' => $form,
            'item' => $item,
        ]);
    }

    protected function getModelFormClass($model, $action = null): string
    {
        if ($action === 'editLinks') {
            return LinksForm::class;
        }
        return DetailsForm::class;
    }

    abstract protected function generateRangeLinkables(SeqRange $range);

    public function view()
    {
        parent::view();

        $item = $this->getModelFromRequest();
        $this->payload()->with([
            'seqLinks' => $item->getSeqLinks(),
        ]);
    }
}