<?php


use Marktic\Sequence\Ranges\Models\SeqRange;
use Marktic\Sequence\Utility\SequenceModels;

$repository = SequenceModels::ranges();
/** @var SeqRange $item */
$item = $item ?? $this->page;
?>
<table class="table table-striped">
    <tbody>
    <tr>
        <td>
            <?= translator()->trans('name'); ?>
        </td>
        <td>
            <?= $item->getName(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= $repository->getLabel('field.number_start'); ?>
        </td>
        <td>
            <?= $item->getNumberStart(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= $repository->getLabel('field.number_current'); ?>
        </td>
        <td>
            <?= $item->getNumberCurrent(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= $repository->getLabel('field.pattern'); ?>
        </td>
        <td>
            <?= $item->getPattern(); ?>
        </td>
    </tr>
    </tbody>
</table>