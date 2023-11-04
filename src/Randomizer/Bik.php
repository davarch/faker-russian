<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Dataset\RegionNumber;
use Davarch\FakerRussian\Support\Sequence;

final readonly class Bik
{
    public static function make(int $sequenceNumber = null, string $okatoRegionNumber = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $okato = RegionNumber::findRegionNumber(
            number: $okatoRegionNumber,
            sequence: $sequence,
            regionNumberType: RegionNumber::REGION_NUMBER
        );

        return '04'.$okato.sprintf('%06d', $sequence->rand(1_000_000));
    }
}
