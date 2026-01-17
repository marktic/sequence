<?php

use Marktic\Sequence\Ranges\Models\SeqRange;

/** @var SeqRange $item */
$item = $item ?? null;
?>
<tr>
    <td>
        <a class="event-link" href="<?= $item->getURL(); ?>" title="">
            <?= $item->getName(); ?>
        </a>
    </td>
    <td>
    </td>
</tr>