<?php
$items = $seqLinks ?? $this->seqLinks;
?>
<?php if ($items->count() < 1): ?>
    <?= $this->Messages()->info(\Marktic\Sequence\Utility\SequenceModels::rangeLinks()->getMessage('dnx')); ?>
    <?php return; ?>
<?php endif; ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th>LINK</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <?php
        $recordLink = $item->getLinkRecord();
        ?>
        <tr>
            <td>
                <a href="<?= $recordLink->getURL(); ?>">
                    <?= $recordLink->getName(); ?>
                </a>
            </td>
            <td>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
