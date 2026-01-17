<?php

namespace Marktic\Sequence\Bundle\Modules\Admin\Controllers;

use Marktic\Sequence\Utility\ViewHelper;

trait AbstractSequenceControllerTrait
{
    protected function bootAbstractCmsControllerTrait()
    {
        $this->after(
            function () {
                $this->registerSequenceViewPaths();
            }
        );
    }

    protected function registerSequenceViewPaths()
    {
        $view = $this->getView();
        ViewHelper::registerAdminPaths($view);
    }
}

