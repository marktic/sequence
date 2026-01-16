<?php

namespace Marktic\Sequence\AbstractBase\Models\HasTenant;

/**
 * Trait HasTenantRepository
 * @package Marktic\Sequence\AbstractBase\Models\HasTenant
 */
trait HasTenantRepository
{
    public function initRelations()
    {
        parent::initRelations();
        $this->initRelationsSequence();
    }

    protected function initRelationsSequence(): void
    {
        $this->initRelationsSequenceTenant();
    }

    protected function initRelationsSequenceTenant(): void
    {
        $this->morphTo('Tenant', ['morphPrefix' => 'tenant', 'morphTypeField' => 'tenant']);
    }
}
