<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\AdminUi\Siteaccess;

interface SiteAccessKeyGeneratorInterface
{
    public function generate(string $siteAccessIdentifier): string;
}

class_alias(SiteAccessKeyGeneratorInterface::class, 'EzSystems\EzPlatformAdminUi\Siteaccess\SiteAccessKeyGeneratorInterface');
