<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzPlatformAdminUiBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * {@inheritdoc}
 */
class RepositoryFormsViewPass implements CompilerPassInterface
{
    const PAGELAYOUT_VIEW_PATH = 'EzPlatformAdminUiBundle::layout.html.twig';

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('ezrepoforms.view_templates_listener')) {
            return;
        }

        $viewTemplatesListener = $container->getDefinition('ezrepoforms.view_templates_listener');
        $viewTemplatesListener->addMethodCall('setPagelayout', [self::PAGELAYOUT_VIEW_PATH]);
    }
}
