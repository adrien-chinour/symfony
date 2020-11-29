<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Amazon\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Notifier\Bridge\Amazon\AmazonSnsOptions;

class AmazonSnsOptionsTest extends TestCase
{
    public function testGetRecipientId()
    {
        $options = new AmazonSnsOptions('my-topic');
        $this->assertSame('my-topic', $options->getRecipientId());
    }

    public function testToArray()
    {
        $options = new AmazonSnsOptions('my-topic', ['random' => 'value']);
        $this->assertEquals(['random' => 'value'], $options->toArray());
    }
}
