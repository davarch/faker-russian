<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Support\Sequence;

final readonly class CorrespondentAccount
{
    public static function make(int $sequenceNumber = null, string $bik = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);
        $memberNumber = self::findMemberNumber($bik, $sequence);

        return '301'.sprintf('%014d', $sequence->rand(1_000_000_000)).$memberNumber;
    }

    private static function findMemberNumber(?string $bik, Sequence $sequence): string
    {
        if ($bik && strlen($bik) > 3) {
            return substr($bik, -3);
        }

        return sprintf('%03d', $sequence->rand(1_000));
    }
}
