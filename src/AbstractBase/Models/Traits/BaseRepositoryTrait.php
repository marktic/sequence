<?php

declare(strict_types=1);

namespace Marktic\Sequence\AbstractBase\Models\Traits;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Sequence\AbstractBase\Models\Timestampable\TimestampableManagerTrait;

trait BaseRepositoryTrait
{
    use HasFormsRecordsTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function initRelations()
    {
        parent::initRelations();

        $this->initRelationsLoyalty();
    }

    protected function initRelationsLoyalty()
    {
    }

    protected function generateController(): string
    {
        if (\defined('static::CONTROLLER')) {
            return static::CONTROLLER;
        }

        return $this->getTable();
    }
}