<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers\Behaviours;

use Marktic\Sequence\AbstractBase\Models\Filters\TenantFilter;
use Marktic\Sequence\AbstractBase\Models\HasTenant\HasTenantRecord;
use Nip\Records\AbstractModels\Record;
use Nip\Records\Filters\Sessions\Session;

trait HasTenantControllerTrait
{
    public function addNewModel()
    {
        /** @var HasTenantRecord $record */
        $record = parent::addNewModel();

        $tenant = $this->getSequenceTenantFromRequest();
        $record->populateFromTenant($tenant);
        return $record;
    }

    public function tenant()
    {
        $this->doModelsListing();
    }

    protected function getRequestFilters($session = null)
    {
        $request = $this->getRequest();
        $request->setAttribute(TenantFilter::NAME, $this->getSequenceTenantFromRequest());
        /** @var Session $filter */
        return parent::getRequestFilters($session);
    }

    /**
     * @return mixed
     */
    protected function getSequenceTenantFromRequest()
    {
        $tenantName = $this->getRequest()->get('tenant');
        return $this->checkForeignModelFromRequest($tenantName, ['tenant_id', 'id']);
    }

    protected function checkItemAccess($item)
    {
        $tenant = $item->getTenant();
        return $this->hasTenantAccess($tenant);
    }

    protected function hasTenantAccess($tenant)
    {
        return $tenant instanceof Record;
    }
}
