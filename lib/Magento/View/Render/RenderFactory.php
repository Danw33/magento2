<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\View\Render;

use Magento\ObjectManager;
use Magento\View\RenderInterface;

/**
 * Class RenderFactory
 */
class RenderFactory
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @param string $type
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function get($type)
    {
        $className = 'Magento\\View\\Render\\' . ucfirst($type);
        $model = $this->objectManager->get($className);

        if (($model instanceof RenderInterface) === false) {
            throw new \InvalidArgumentException(
                sprintf('Type "%s" is not instance on Magento\View\RenderInterface', $type)
            );
        }

        return $model;
    }
}
