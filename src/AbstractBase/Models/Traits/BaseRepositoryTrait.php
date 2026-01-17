<?php

declare(strict_types=1);

namespace Marktic\Sequence\AbstractBase\Models\Traits;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Sequence\AbstractBase\Models\Timestampable\TimestampableManagerTrait;
use Nip\I18n\Translatable\HasTranslations;
use Nip\Records\Filters\Records\HasFiltersRecordsTrait;

trait BaseRepositoryTrait
{
    use HasFormsRecordsTrait;
    use HasFiltersRecordsTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;
    use HasTranslations;

    protected function initRelations()
    {
        parent::initRelations();

        $this->initRelationsSequence();
    }

    protected function initRelationsSequence()
    {
    }

    protected function generateController(): string
    {
        if (\defined('static::CONTROLLER')) {
            return static::CONTROLLER;
        }

        return $this->getTable();
    }

    protected function getTranslateRoot()
    {
        return $this->getController();
    }
}