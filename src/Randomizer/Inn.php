<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Dataset\RegionNumber;
use Davarch\FakerRussian\Support\Sequence;
use InvalidArgumentException;

final readonly class Inn
{
    public static function make(int $sequenceNumber = null, string $regionNumber = null, string $kind = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $region = RegionNumber::findRegionNumber(
            number: $regionNumber,
            sequence: $sequence,
            regionNumberType: RegionNumber::REGION_NUMBER
        );

        $foundKind = self::findKind($kind, $sequence);

        $sequenceDigit = self::findDigits($foundKind, $sequence);

        $innWithoutCheckDigit = $region.$sequenceDigit;

        return $innWithoutCheckDigit.self::checkDigits($innWithoutCheckDigit);
    }

    private static function findKind(?string $kind, Sequence $sequence): string
    {
        if ($kind === null) {
            return ['legal', 'individual'][$sequence->rand(1)];
        }

        if (in_array($kind, ['legal', 'individual'])) {
            return $kind;
        }

        throw new InvalidArgumentException('Invalid kind');
    }

    private static function findDigits(string $kind, Sequence $sequence): string
    {
        if ($kind === 'legal') {
            return (string) $sequence->minMax(1_111_111, 9_999_999);
        }

        return (string) $sequence->minMax(11_111_111, 99_999_999);
    }

    private static function checkDigits(string $digits): string
    {
        $p10 = [2, 4, 10, 3, 5, 9, 4, 6, 8];
        $p11 = [7, 2, 4, 10, 3, 5, 9, 4, 6, 8];
        $p12 = [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8];

        if (strlen($digits) === 9) {
            return self::calculateInn($p10, $digits);
        }

        return self::calculateInn($p11, $digits).self::calculateInn($p12, $digits.self::calculateInn($p11, $digits));
    }

    /**
     * @param  array<int, int>  $p
     */
    public static function calculateInn(array $p, string $inn): string
    {
        $sum = 0;

        foreach ($p as $index => $value) {
            $sum += $value * (int) $inn[$index];
        }

        return (string) ($sum % 11 % 10);
    }
}
