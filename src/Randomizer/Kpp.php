<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Dataset\RegionNumber;
use Davarch\FakerRussian\Support\Sequence;

final readonly class Kpp
{
    public static function make(int $sequenceNumber = null, string $regionNumber = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $region = RegionNumber::findRegionNumber(
            number: $regionNumber,
            sequence: $sequence,
            regionNumberType: RegionNumber::REGION_NUMBER
        );

        return $region.self::twoRegionNumbers($sequence).'01001';
    }

    private static function twoRegionNumbers(Sequence $sequence): string
    {
        return sprintf('%02d', $sequence->rand(99));
    }
}
