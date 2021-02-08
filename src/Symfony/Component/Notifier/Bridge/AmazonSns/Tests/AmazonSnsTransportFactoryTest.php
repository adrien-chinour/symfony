<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\AmazonSns\Tests;

use Symfony\Component\Notifier\Bridge\AmazonSns\AmazonSnsTransportFactory;
use Symfony\Component\Notifier\Tests\TransportFactoryTestCase;
use Symfony\Component\Notifier\Transport\TransportFactoryInterface;

class AmazonSnsTransportFactoryTest extends TransportFactoryTestCase
{
    public function createFactory(): TransportFactoryInterface
    {
        return new AmazonSnsTransportFactory();
    }

    public function createProvider(): iterable
    {
        yield ['sns://host.test?region=eu-west-1', 'sns://host.test'];
        yield ['sns://host.test?region=eu-west-1', 'sns://accessId:accessKey@host.test'];
        yield ['sns://host.test?region=eu-west-3', 'sns://host.test?region=eu-west-3'];
    }

    public function supportsProvider(): iterable
    {
        yield [true, 'sns://default'];
        yield [false, 'somethingElse://default'];
    }

    public function unsupportedSchemeProvider(): iterable
    {
        yield ['somethingElse://default'];
    }
}
