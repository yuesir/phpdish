<?php

/*
 * This file is part of the phpdish/phpdish
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PHPDish\Bundle\ResourceBundle\Model;

interface IdentifiableInterface
{
    /**
     * 获取id.
     *
     * @return int
     */
    public function getId();
}
