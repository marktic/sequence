<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers\Behaviours;

use Marktic\Sequence\AbstractBase\Models\Filters\TenantFilter;
use Nip\Records\Filters\Sessions\Session;

trait HasTenantControllerTrait
{

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
}
