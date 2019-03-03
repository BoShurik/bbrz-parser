<?php
/**
 * User: boshurik
 * Date: 31.08.16
 * Time: 17:21
 */

namespace BoShurik\BloodBowl\Replay\Model;

final class Race
{
    const RACE_HUMAN = 1;
    const RACE_DWARF = 2;
    const RACE_SKAVEN = 3;
    const RACE_ORC = 4;
    const RACE_LIZARDMAN = 5;
    const RACE_GOBLIN = 6;
    const RACE_WOOD_ELF = 7;
    const RACE_CHAOS = 8;
    const RACE_DARK_ELF = 9;
    const RACE_UNDEAD = 10;
    const RACE_HALFLING = 11;
    const RACE_NORSE = 12;
    const RACE_AMAZON = 13;
    const RACE_ELF = 14;
    const RACE_HIGH_ELF = 15;
    const RACE_KHEMRI = 16;
    const RACE_NECROMANTIC = 17;
    const RACE_NURGLE = 18;
    const RACE_OGRE = 19;
    const RACE_VAMPIRE = 20;
    const RACE_CHAOS_DWARF = 21;
    const RACE_UNDERWORLD = 22;
    const RACE_BRETONNIA = 24;
    const RACE_KISLEV = 25;

    /**
     * @var int
     */
    private $id;

    /**
     * @return array
     */
    public static function getNames(): array
    {
        return array(
            self::RACE_HUMAN => 'Human',
            self::RACE_DWARF => 'Dwarf',
            self::RACE_SKAVEN => 'Skaven',
            self::RACE_ORC => 'Orc',
            self::RACE_LIZARDMAN => 'Lizardman',
            self::RACE_GOBLIN => 'Goblin',
            self::RACE_WOOD_ELF => 'Wood Elf',
            self::RACE_CHAOS => 'Chaos',
            self::RACE_DARK_ELF => 'Dark Elf',
            self::RACE_UNDEAD => 'Undead',
            self::RACE_HALFLING => 'Halfling',
            self::RACE_NORSE => 'Norse',
            self::RACE_AMAZON => 'Amazon',
            self::RACE_ELF => 'Elf',
            self::RACE_HIGH_ELF => 'High Elf',
            self::RACE_KHEMRI => 'Khemri',
            self::RACE_NECROMANTIC => 'Necromantic',
            self::RACE_NURGLE => 'Nurgle',
            self::RACE_OGRE => 'Ogre',
            self::RACE_VAMPIRE => 'Vampire',
            self::RACE_CHAOS_DWARF => 'Chaos Dwarf',
            self::RACE_UNDERWORLD => 'Underworld',
            self::RACE_BRETONNIA => 'Bretonnia',
            self::RACE_KISLEV => 'Kislev',
        );
    }

    /**
     * @param int $id
     * @return string
     */
    public static function getNameById($id): string
    {
        $names = self::getNames();
        if (!isset($names[$id])) {
            return 'Unknown ' . $id;
        }

        return $names[$id];
    }

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::getNameById($this->id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}