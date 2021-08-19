<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\AdminUi\UI\Module\Subitems\ValueObjectVisitor;

use EzSystems\EzPlatformRest\Output\Generator;
use EzSystems\EzPlatformRest\Output\ValueObjectVisitor;
use EzSystems\EzPlatformRest\Output\Visitor;
use Ibexa\AdminUi\UI\Module\Subitems\Values\SubitemsList as SubitemsListValue;

class SubitemsList extends ValueObjectVisitor
{
    /**
     * @param Visitor $visitor
     * @param Generator $generator
     * @param SubitemsListValue $data
     */
    public function visit(Visitor $visitor, Generator $generator, $data)
    {
        $generator->startObjectElement('SubitemsList');
        $visitor->setHeader('Content-Type', $generator->getMediaType('SubitemsList'));
        //@todo Needs refactoring, disabling certain headers should not be done this way
        $visitor->setHeader('Accept-Patch', false);

        $generator->startList('SubitemsRow');
        foreach ($data->subitemRows as $subitemsRow) {
            $visitor->visitValueObject($subitemsRow);
        }
        $generator->endList('SubitemsRow');

        $generator->startValueElement('ChildrenCount', $data->childrenCount);
        $generator->endValueElement('ChildrenCount');

        $generator->endObjectElement('SubitemsList');
    }
}

class_alias(SubitemsList::class, 'EzSystems\EzPlatformAdminUi\UI\Module\Subitems\ValueObjectVisitor\SubitemsList');
