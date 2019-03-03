<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 13:09
 */

namespace BoShurik\BloodBowl\Replay\Model;

final class Competition
{
    /**
     * @var League
     */
    private $league;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    public function __construct(League $league, string $id, string $name)
    {
        $this->league = $league;
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString()
    {
        return sprintf('%s (%s)', $this->name, $this->league);
    }

    /**
     * @return League
     */
    public function getLeague(): League
    {
        return $this->league;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}