<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 12:17
 */

namespace BoShurik\BloodBowl\Replay\Model;

final class Coach
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}