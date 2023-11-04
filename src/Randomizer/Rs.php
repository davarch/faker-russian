<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Dataset\Okv;
use Davarch\FakerRussian\Support\Sequence;

final readonly class Rs
{
    public static function make(int $sequenceNumber = null, string $okv = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);
        $okvDigits = Okv::findOkv($okv, $sequence);

        return sprintf('%05d', $sequence->rand(100_000))
            .$okvDigits
            .sprintf('%012d', $sequence->rand(1_000_000_000));
    }
}
