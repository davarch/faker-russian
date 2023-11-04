<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Support\Sequence;

final readonly class Okpo
{
    public static function make(int $sequenceNumber = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $okpoDigits = self::okpoRegionNumber($sequence);

        return $okpoDigits.self::calculateOkpo($okpoDigits);
    }

    private static function okpoRegionNumber(Sequence $sequence): string
    {
        if (in_array($sequence->rand(2), [1, 0])) {
            return sprintf('%07d', $sequence->rand(10_000_000));
        } else {
            return sprintf('%09d', $sequence->rand(1_000_000_000));
        }
    }

    private static function calculateOkpo(string $okpoDigits): string
    {
        $digits = explode('//', $okpoDigits);

        $sum = 0;
        foreach ($digits as $index => $digit) {
            $sum += (int) $digit * ($index + 1);
        }

        return (string) ($sum % 11 % 10);
    }
}
