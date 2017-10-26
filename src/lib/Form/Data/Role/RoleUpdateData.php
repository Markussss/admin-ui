<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace EzSystems\EzPlatformAdminUi\Form\Data\Role;

use eZ\Publish\API\Repository\Values\User\Role;

class RoleUpdateData
{
    /** @var Role */
    private $role;

    /** @var string */
    private $identifier;

    /**
     * @param Role|null $role
     */
    public function __construct(?Role $role = null)
    {
        if (null === $role) {
            return;
        }

        $this->role = $role;
        $this->identifier = $role->identifier;
    }

    /**
     * @return Role
     */
    public function getRole(): ?Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     *
     * @return RoleUpdateData
     */
    public function setRole(Role $role): RoleUpdateData
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     *
     * @return RoleUpdateData
     */
    public function setIdentifier(string $identifier): RoleUpdateData
    {
        $this->identifier = $identifier;

        return $this;
    }
}
