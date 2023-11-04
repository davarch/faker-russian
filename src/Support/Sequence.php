<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Support;

final readonly class Sequence
{
    private function __construct(private int $seed)
    {
        srand($this->seed);
    }

    public static function findSequence(int $seed = null): self
    {
        return new self($seed ?? rand(0, 1_000_000_000));
    }

    public function rand(int $max): int
    {
        return rand(0, $max);
    }

    public function minMax(int $min, int $max): int
    {
        return rand($min, $max);
    }
}
