<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers\Behaviours;

use Marktic\Sequence\Base\Models\Filters\TenantFilter;
use Marktic\Sequence\Bundle\Setup\SetupCms;
use Nip\Records\Filters\Sessions\Session;

trait HasTenantControllerTrait
{
    protected function bootAbstractCmsControllerTrait()
    {
        $this->before(
            function () {
                $action = SetupCms::for($this->getCmsTenantFromRequest())->handle();
                $this->registerCmsViewPaths();
            }
        );
    }

    public function tenant()
    {
        $this->doModelsListing();
    }

    protected function getRequestFilters($session = null)
    {
        $request = $this->getRequest();
        $request->setAttribute(TenantFilter::NAME, $this->getCmsTenantFromRequest());
        /** @var Session $filter */
        return parent::getRequestFilters($session);
    }

    /**
     * @return mixed
     */
    protected function getCmsTenantFromRequest()
    {
        $tenantName = $this->getRequest()->get('tenant');
        return $this->checkForeignModelFromRequest($tenantName, ['tenant_id', 'id']);
    }
}
