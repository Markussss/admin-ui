<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\AdminUi\Form\Data\ContentTypeGroup;

use eZ\Publish\API\Repository\Values\ContentType\ContentTypeGroup;

/**
 * @todo Add validation
 */
class ContentTypeGroupsDeleteData
{
    /** @var ContentTypeGroup[]|null */
    protected $contentTypeGroups;

    /**
     * @param ContentTypeGroup[]|null $contentTypeGroups
     */
    public function __construct(array $contentTypeGroups = [])
    {
        $this->contentTypeGroups = $contentTypeGroups;
    }

    /**
     * @return array|null
     */
    public function getContentTypeGroups(): ?array
    {
        return $this->contentTypeGroups;
    }

    /**
     * @param array|null $contentTypeGroups
     */
    public function setContentTypeGroups(?array $contentTypeGroups)
    {
        $this->contentTypeGroups = $contentTypeGroups;
    }
}

class_alias(ContentTypeGroupsDeleteData::class, 'EzSystems\EzPlatformAdminUi\Form\Data\ContentTypeGroup\ContentTypeGroupsDeleteData');
