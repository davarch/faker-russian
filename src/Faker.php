<?php

declare(strict_types=1);

namespace Davarch\FakerRussian;

use Davarch\FakerRussian\Providers\FakerProvider;
use Faker\Container\ContainerInterface;
use Faker\Generator;

/**
 * @method string bik(int $sequenceNumber = null, string $okatoRegionNumber = null)
 * @method string inn(int $sequenceNumber = null, string $regionNumber = null, string $kind = null)
 * @method string okpo(int $sequenceNumber = null)
 * @method string kpp(int $sequenceNumber = null, string $regionNumber = null)
 * @method string rs(int $sequenceNumber = null, string $okv = null)
 * @method string correspondentAccount(int $sequenceNumber = null, string $bik = null)
 * @method string snils(int $sequenceNumber = null)
 * @method string okato(int $sequenceNumber = null, string $okatoRegionNumber = null, int $length = null)
 * @method string cadastralNumber(int $sequenceNumber = null, int $district = null, int $area = null, int $quarter = null)
 * @method string ogrn(int $sequenceNumber = null, string $regionNumber = null, string $kind = null)
 */
final class Faker extends Generator
{
    public function __construct(ContainerInterface $container = null)
    {
        parent::__construct($container);

        $this->addProvider(FakerProvider::class);
    }
}
