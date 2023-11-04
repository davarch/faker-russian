<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Dataset\RegionNumber;
use Davarch\FakerRussian\Support\Sequence;
use Exception;

final readonly class Ogrn
{
    /**
     * @throws Exception
     */
    public static function make(int $sequenceNumber = null, string $regionNumber = null, string $kind = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $kind = self::findKind($kind, $sequence);

        $signOfRegNum = self::findSignOfRegNum($kind, $sequence);
        $yearNumber = self::yearNumber($sequence);
        $regionNumber = RegionNumber::findRegionNumber(
            number: $regionNumber,
            sequence: $sequence,
            regionNumberType: RegionNumber::REGION_NUMBER
        );
        $taxOfficeCode = self::findTaxOfficeCode($kind, $sequence);
        $recordNumber = self::findDigits($kind, $sequence);
        $ogrnWithoutCheckDigit = "{$signOfRegNum}{$yearNumber}{$regionNumber}{$taxOfficeCode}{$recordNumber}";

        return $ogrnWithoutCheckDigit.self::checkDigit($ogrnWithoutCheckDigit);
    }

    /**
     * @throws Exception
     */
    private static function findKind(?string $kind, Sequence $sequence): string
    {
        if ($kind === null) {
            return ['legal', 'individual'][$sequence->rand(1)];
        }

        if (in_array($kind, ['legal', 'individual'])) {
            return $kind;
        }

        throw new Exception('there is no any kind other than legal, individual');
    }

    private static function findSignOfRegNum(?string $kind, Sequence $sequence): int
    {
        if ($kind === 'legal') {
            return [1, 5][$sequence->rand(1)];
        }

        return 4;
    }

    private static function yearNumber(Sequence $sequence): string
    {
        $year = $sequence->minMax(2000, (int) date('Y'));

        return date('y', strtotime("$year-01-01") ?: null);
    }

    private static function findTaxOfficeCode(?string $kind, Sequence $sequence): ?int
    {
        if ($kind === 'legal') {
            return $sequence->minMax(10, 99);
        }

        return null;
    }

    private static function findDigits(?string $kind, Sequence $sequence): int
    {
        if ($kind === 'legal') {
            return $sequence->minMax(10_000, 99_999);
        }

        return $sequence->minMax(100_000_000, 999_999_999);
    }

    private static function checkDigit(string $ogrnWithoutCheckDigit): string
    {
        return (string) (($ogrnWithoutCheckDigit % (strlen($ogrnWithoutCheckDigit) - 1)) % 10);
    }
}
