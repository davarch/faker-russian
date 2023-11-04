<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Support\Sequence;

final readonly class Snils
{
    public static function make(int $sequenceNumber = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $snils = sprintf('%09d', $sequence->rand(1_000_000_000));

        return $snils.self::checkDigits($snils);
    }

    private static function checkDigits(string $snilsDigits): string
    {
        $digits = array_map(fn ($item) => (int) $item, (array) $snilsDigits);

        $checksum = 0;
        foreach ($digits as $index => $digit) {
            $checksum += $digit * (9 - $index);
        }

        return sprintf('%02d', $checksum % 101 % 100);
    }
}
