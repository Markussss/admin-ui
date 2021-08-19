<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\AdminUi\Form\DataTransformer;

use eZ\Publish\API\Repository\Exceptions\UnauthorizedException;
use eZ\Publish\API\Repository\RoleService;
use Symfony\Component\Form\DataTransformerInterface;
use eZ\Publish\API\Repository\Values\User\RoleAssignment as APIRoleAssignment;
use Symfony\Component\Form\Exception\TransformationFailedException;
use eZ\Publish\API\Repository\Exceptions\NotFoundException;

/**
 * Transforms between a Role Assignment's identifier and a domain specific object.
 */
class RoleAssignmentTransformer implements DataTransformerInterface
{
    /** @var RoleService */
    protected $roleService;

    /**
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Transforms a domain specific RoleAssignment object into a RoleAssignment string.
     *
     * @param mixed $value
     *
     * @return mixed|null
     *
     * @throws TransformationFailedException
     */
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof APIRoleAssignment) {
            throw new TransformationFailedException('Expected a ' . APIRoleAssignment::class . ' object.');
        }

        return $value->id;
    }

    /**
     * Transforms a RoleAssignment's ID into a domain specific RoleAssignment object.
     *
     * @param mixed $value
     *
     * @return APIRoleAssignment|null
     *
     * @throws TransformationFailedException
     * @throws UnauthorizedException
     */
    public function reverseTransform($value): ?APIRoleAssignment
    {
        if (empty($value)) {
            return null;
        }

        if (!ctype_digit($value)) {
            throw new TransformationFailedException('Expected a numeric string.');
        }

        try {
            return $this->roleService->loadRoleAssignment((int)$value);
        } catch (NotFoundException $e) {
            throw new TransformationFailedException($e->getMessage(), $e->getCode(), $e);
        }
    }
}

class_alias(RoleAssignmentTransformer::class, 'EzSystems\EzPlatformAdminUi\Form\DataTransformer\RoleAssignmentTransformer');
