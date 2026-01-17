<?php

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\RangesLinks\Models\SeqRangesLinks;
use Marktic\Sequence\Utility\SequenceModels;

/** @var SeqRange $item */
$item = $item ?? $this->item;

$linksRepository = SequenceModels::rangeLinks();
$card = Card::make()
        ->withView($this)
        ->withTitle($linksRepository->getLabel('title'))
        ->withIcon(Icons::list_ul())
        ->addHeaderTool(
                ButtonAction::make()
                        ->setUrl(
                                $item->compileURL('editLinks')
                        )
                        ->addHtmlClass('btn-xs')
                        ->setLabel(translator()->trans('edit'))
        )
//    ->themeSuccess()
        ->wrapBody(false)
        ->withViewContent('/' . SeqRangesLinks::CONTROLLER . '/modules/lists/ranges', ['seqLinks' => $this->seqLinks]);
?>
<?= $card ?>