<?php

declare(strict_types=1);

namespace Marktic\Sequence\Bundle\Modules\Admin\Forms\SeqRanges;

use Marktic\Sequence\Bundle\Library\Form\FormModel;
use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\RangesLinks\Actions\Create\CreateSiteLink;
use Marktic\Sequence\Utility\SequenceModels;
use Nip\Records\Collections\Collection;

/**
 * @method SeqRange getModel()
 */
class LinksForm extends FormModel
{
    protected $linkables = [];
    protected $seqLinks = [];

    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-sequence-seq-ranges-links-form');
        $this->addCheckboxGroup('linkables', SequenceModels::rangeLinks()->getLabel('title'), false);

        $this->addButton('save', translator()->trans('submit'));
    }

    public function setLinkables(array|Collection $linkables): static
    {
        $this->linkables = $linkables;
        return $this;
    }

    protected function getDataFromModel()
    {
        $this->seqLinks = $this->getModel()->getSeqLinks()->keyBy('link_id');
        $this->populateLinkablesElement($this->linkables);
        $this->getElement('linkables')->setValue(
            $this->seqLinks->pluck('link_id')->toArray()
        );
    }

    public function saveModel()
    {
        $savedLinkIds = $this->getElement('linkables')->getValue();
        foreach ($this->linkables as $link) {
            if (in_array($link->id, $savedLinkIds)) {
                if (!$this->seqLinks->has($link->id)) {
                    CreateSiteLink::for($this->getModel(), $link)->create();
                }
            } else {
                if ($this->seqLinks->has($link->id)) {
                    $this->seqLinks->get($link->id)->delete();
                }
            }
        }
    }

    protected function populateLinkablesElement($linkables = [])
    {
        $element  = $this->getElement('linkables');
        foreach ($linkables as $linkable) {
            $element->addOption($linkable->id, $linkable->getName());
        }
    }
}