<?php

declare(strict_types=1);

namespace Marktic\Sequence;

use ByTIC\PackageBase\BaseBootableServiceProvider;
use Marktic\Sequence\Utility\SequenceModels;
use Marktic\Sequence\Utility\PackageConfig;

/**
 * Class SequenceServiceProvider.
 */
class SequenceServiceProvider extends BaseBootableServiceProvider
{
    public const NAME = 'mkt_sequence';

    public function migrations(): ?string
    {
        if (PackageConfig::shouldRunMigrations()) {
            return dirname(__DIR__) . '/database/migrations/';
        }

        return null;
    }

    protected function translationsPath(): string
    {
        return dirname(__DIR__).'/resources/lang/';
    }

    protected function registerCommands()
    {
//        $this->commands(
//        );
    }
    public function boot(): void
    {
        parent::boot();
//        CmsModels::sites();
//        CmsModels::menus();
//        CmsModels::menuItems();
//        CmsModels::pages();
//        CmsModels::pageSections();
//        CmsModels::pageBlocks();
    }
}
