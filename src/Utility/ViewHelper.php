<?php

namespace Marktic\Sequence\Utility;

use Nip\View\View;

/**
 * Class ViewHelper.
 */
class ViewHelper
{
    public const NAMESPACE = 'MktSeq';

    /**
     * @param View $view
     */
    public static function registerAdminPaths(View $view)
    {
        $view->addPath(PathsHelpers::viewsAdmin(), self::NAMESPACE);
        $view->addPath(PathsHelpers::viewsAdmin());
    }
}
