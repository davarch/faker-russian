<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Dataset\RegionNumber;
use Davarch\FakerRussian\Support\Sequence;
use Exception;

final readonly class Okato
{
    /**
     * @throws Exception
     */
    public static function make(int $sequenceNumber = null, string $okatoRegionNumber = null, int $length = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $okatoRegionNumber = RegionNumber::findRegionNumber(
            number: $okatoRegionNumber,
            sequence: $sequence,
            regionNumberType: RegionNumber::OKATO_REGION_NUMBER
        );

        $okatoWithoutCalc = $okatoRegionNumber.self::lengthDigits($length, $sequence);

        return $okatoWithoutCalc.self::calcOkato($okatoWithoutCalc);
    }

    /**
     * @throws Exception
     */
    private static function lengthDigits(?int $length, Sequence $sequence): string
    {
        if ($length !== null) {
            if (! in_array($length, [3, 6, 9])) {
                throw new Exception('no such length for okato');
            }
        } else {
            $length = [3, 6, 9][$sequence->rand(2)];
        }

        return substr(sprintf('%06d', $sequence->rand(1_000_000)), 0, $length - 3);
    }

    private static function calcOkato(string $okatoWithoutCalc): string
    {
        $firstDigit = self::calcOkatoDigit($okatoWithoutCalc, 1);
        $secondDigit = self::calcOkatoDigit($okatoWithoutCalc, 3);

        if ($firstDigit < 10) {
            return (string) $firstDigit;
        }

        return (string) ($secondDigit % 10);
    }

    private static function calcOkatoDigit(string $okatoWithoutCalc, int $addingNumber): int
    {
        $digits = array_map(fn ($item) => (int) $item, (array) $okatoWithoutCalc);

        $checksum = 0;
        foreach ($digits as $index => $digit) {
            $checksum += $digit * ($index + $addingNumber);
        }

        return $checksum % 11;
    }
}
