<?php

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\Utility\SequenceModels;

/** @var SeqRange $item */
$item = $item ?? $this->item;

$pagesRepository = SequenceModels::ranges();
$card = Card::make()
    ->withView($this)
    ->withTitle($pagesRepository->getLabel('title.singular'))
    ->withIcon(Icons::list_ul())
    ->addHeaderTool(
        ButtonAction::make()
            ->setUrl(
                $item->compileURL('edit',)
            )
            ->addHtmlClass('btn-xs')
            ->setLabel(translator()->trans('edit'))
    )
//    ->themeSuccess()
    ->wrapBody(false)
    ->withViewContent('/mkt_sequence-ranges/modules/item/details', ['item' => $this->item]);
?>
<?= $card ?>