<?php

declare(strict_types=1);

namespace Marktic\Sequence\AbstractBase\Models;

use Marktic\Loyalty\AbstractBase\Models\Traits\BaseRepositoryTrait;
use Nip\Records\RecordManager;

class SequenceRepository extends RecordManager
{
    use BaseRepositoryTrait;
}