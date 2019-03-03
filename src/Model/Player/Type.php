<?php
/**
 * User: boshurik
 * Date: 12.10.16
 * Time: 22:00
 */

namespace BoShurik\BloodBowl\Replay\Model\Player;

final class Type
{
    const TYPE_HUMAN_LINEMAN = 1;
    const TYPE_HUMAN_CATCHER = 2;
    const TYPE_HUMAN_THROWER = 3;
    const TYPE_HUMAN_BLITZER = 4;
    const TYPE_HUMAN_OGRE = 5;

    const TYPE_DWARF_LONG_BEARD = 6;
    const TYPE_DWARF_RUNNER = 7;
    const TYPE_DWARF_BLITZER = 8;
    const TYPE_DWARF_TROLL_SLAYER = 9;
    const TYPE_DWARF_DEATHROLLER = 10;

    const TYPE_WOOD_ELF_LINEMAN = 11;
    const TYPE_WOOD_ELF_CATCHER = 12;
    const TYPE_WOOD_ELF_THROWER = 13;
    const TYPE_WOOD_ELF_WARDANCER = 14;
    const TYPE_WOOD_ELF_TREEMAN = 15;

    const TYPE_SKAVEN_LINEMAN = 16;
    const TYPE_SKAVEN_THROWER = 17;
    const TYPE_SKAVEN_GUTTER_RUNNER = 18;
    const TYPE_SKAVEN_STORMVERMIN = 19;
    const TYPE_SKAVEN_RAT_OGRE = 20;

    const TYPE_ORC_LINEMAN = 21;
    const TYPE_ORC_GOBLIN = 22;
    const TYPE_ORC_THROWER = 23;
    const TYPE_ORC_BLACK_ORC_BLOCKER = 24;
    const TYPE_ORC_BLITZER = 25;
    const TYPE_ORC_TROLL = 26;

    const TYPE_LIZARDMAN_SKINK = 27;
    const TYPE_LIZARDMAN_SAURUS = 28;
    const TYPE_LIZARDMAN_KROXIGOR = 29;

    const TYPE_CHAOS_BEASTMAN = 32;
    const TYPE_CHAOS_CHAOS_WARRIOR = 33;
    const TYPE_CHAOS_MINOTAUR = 34;

    const TYPE_GOBLIN_GOBLIN = 30;
    const TYPE_GOBLIN_LOONEY = 31;
    const TYPE_GOBLIN_TROLL = 44;
    const TYPE_GOBLIN_POGOER = 45;
    const TYPE_GOBLIN_FANATIC = 46;
    const TYPE_GOBLIN_BOMBARDIER = 107;

    const TYPE_DARK_ELF_LINEMAN = 47;
    const TYPE_DARK_ELF_RUNNER = 48;
    const TYPE_DARK_ELF_ASSASSIN = 49;
    const TYPE_DARK_ELF_BLITZER = 50;
    const TYPE_DARK_ELF_WITCH_ELF = 51;

    const TYPE_UNDEAD_SKELETON = 54;
    const TYPE_UNDEAD_ZOMBIE = 55;
    const TYPE_UNDEAD_GHOUL = 56;
    const TYPE_UNDEAD_WIGHT = 57;
    const TYPE_UNDEAD_MUMMIE = 58;

    const TYPE_HALFLING_HALFLING = 60;
    const TYPE_HALFLING_TREEMAN = 61;

    const TYPE_NORSE_LINEMAN = 62;
    const TYPE_NORSE_TROWER = 63;
    const TYPE_NORSE_RUNNER = 64;
    const TYPE_NORSE_BERSERKER = 65;
    const TYPE_NORSE_NORSE_WEREWOLF = 66;
    const TYPE_NORSE_YHETEE = 67;

    const TYPE_AMAZON_LINEMAN = 68;
    const TYPE_AMAZON_THROWER = 69;
    const TYPE_AMAZON_CATCHER = 70;
    const TYPE_AMAZON_BLITZER = 71;

    const TYPE_ELF_LINEMAN = 72;
    const TYPE_ELF_THROWER = 73;
    const TYPE_ELF_CATCHER = 74;
    const TYPE_ELF_BLITZER = 75;

    const TYPE_HIGH_ELF_LINEMAN = 77;
    const TYPE_HIGH_ELF_THROWER = 78;
    const TYPE_HIGH_ELF_CATCHER = 79;
    const TYPE_HIGH_ELF_BLITZER = 80;

    const TYPE_KHEMRI_SKELETON = 81;
    const TYPE_KHEMRI_THRO_RA = 82;
    const TYPE_KHEMRI_BLITZ_RA = 83;
    const TYPE_KHEMRI_TOMB_GUARDIAN = 84;

    const TYPE_NECROMANTIC_ZOMBIE = 86;
    const TYPE_NECROMANTIC_GHOUL = 87;
    const TYPE_NECROMANTIC_WIGHT = 88;
    const TYPE_NECROMANTIC_FLESH_GOLEM = 89;
    const TYPE_NECROMANTIC_WEREWOLF = 90;

    const TYPE_NURGLE_ROTTER = 91;
    const TYPE_NURGLE_PESTIGOR = 92;
    const TYPE_NURGLE_NURGLE_WARRIOR = 93;
    const TYPE_NURGLE_BEAST_OF_NURGLE = 94;

    const TYPE_OGRE_SNOTLING = 95;
    const TYPE_OGRE_OGRE = 96;

    const TYPE_VAMPIRE_THRALL = 97;
    const TYPE_VAMPIRE_VAMPIRE = 98;

    const TYPE_CHAOS_DWARF_HOBGOBLIN = 108;
    const TYPE_CHAOS_DWARF_BLOCKER = 109;
    const TYPE_CHAOS_DWARF_BULL_CENTAUR = 110;
    const TYPE_CHAOS_DWARF_MINOTAUR = 111;

    const TYPE_UNDERWORLD_GOBLIN = 123;
    const TYPE_UNDERWORLD_SKAVEN_LINEMAN = 124;
    const TYPE_UNDERWORLD_SKAVEN_THROWER = 125;
    const TYPE_UNDERWORLD_SKAVEN_BLITZER = 126;
    const TYPE_UNDERWORLD_WARPSTONE_TROLL = 127;

    const TYPE_BRETONNIA_LINEMAN = 139;
    const TYPE_BRETONNIA_BLITZER = 140;
    const TYPE_BRETONNIA_BLOCKER = 141;

    const TYPE_KISLEV_LINEMAN = 142;
    const TYPE_KISLEV_CATCHER = 143;
    const TYPE_KISLEV_BLITZER = 144;
    const TYPE_KISLEV_TAME_BEAR = 145;

    /**
     * @var integer
     */
    private $id;

    /**
     * @return array
     */
    public static function getNames(): array
    {
        return array(
            self::TYPE_HUMAN_LINEMAN => 'Lineman',
            self::TYPE_HUMAN_CATCHER => 'Catcher',
            self::TYPE_HUMAN_THROWER => 'Thrower',
            self::TYPE_HUMAN_BLITZER => 'Blitzer',
            self::TYPE_HUMAN_OGRE => 'Ogre',

            self::TYPE_DWARF_LONG_BEARD => 'Long Beard',
            self::TYPE_DWARF_RUNNER => 'Runner',
            self::TYPE_DWARF_BLITZER => 'Blitzer',
            self::TYPE_DWARF_TROLL_SLAYER => 'Troll Slayer',
            self::TYPE_DWARF_DEATHROLLER => 'Deathroller',

            self::TYPE_WOOD_ELF_LINEMAN => 'Lineman',
            self::TYPE_WOOD_ELF_CATCHER => 'Catcher',
            self::TYPE_WOOD_ELF_THROWER => 'Thrower',
            self::TYPE_WOOD_ELF_WARDANCER => 'Wardancer',
            self::TYPE_WOOD_ELF_TREEMAN => 'Treeman',

            self::TYPE_SKAVEN_LINEMAN => 'Lineman',
            self::TYPE_SKAVEN_THROWER => 'Thrower',
            self::TYPE_SKAVEN_GUTTER_RUNNER => 'Gutter Runner',
            self::TYPE_SKAVEN_STORMVERMIN => 'Stormvermin',
            self::TYPE_SKAVEN_RAT_OGRE => 'Rat Ogre',

            self::TYPE_ORC_LINEMAN => 'Lineman',
            self::TYPE_ORC_GOBLIN => 'Goblin',
            self::TYPE_ORC_THROWER => 'Thrower',
            self::TYPE_ORC_BLACK_ORC_BLOCKER => 'Black Orc Blocker',
            self::TYPE_ORC_BLITZER => 'Blitzer',
            self::TYPE_ORC_TROLL => 'Troll',

            self::TYPE_LIZARDMAN_SKINK => 'Skink',
            self::TYPE_LIZARDMAN_SAURUS => 'Saurus',
            self::TYPE_LIZARDMAN_KROXIGOR => 'Kroxigor',

            self::TYPE_CHAOS_BEASTMAN => 'Beastman',
            self::TYPE_CHAOS_CHAOS_WARRIOR => 'Chaos Warrior',
            self::TYPE_CHAOS_MINOTAUR => 'Minotaur',

            self::TYPE_GOBLIN_GOBLIN => 'Goblin',
            self::TYPE_GOBLIN_BOMBARDIER => 'Bombardier',
            self::TYPE_GOBLIN_LOONEY => 'Looney',
            self::TYPE_GOBLIN_FANATIC => 'Fanatic',
            self::TYPE_GOBLIN_POGOER => 'Pogoer',
            self::TYPE_GOBLIN_TROLL => 'Troll',

            self::TYPE_DARK_ELF_LINEMAN => 'Lineman',
            self::TYPE_DARK_ELF_RUNNER => 'Runner',
            self::TYPE_DARK_ELF_ASSASSIN => 'Assassin',
            self::TYPE_DARK_ELF_BLITZER => 'Blitzer',
            self::TYPE_DARK_ELF_WITCH_ELF => 'Witch Elf',

            self::TYPE_UNDEAD_SKELETON => 'Skeleton',
            self::TYPE_UNDEAD_ZOMBIE => 'Zombie',
            self::TYPE_UNDEAD_GHOUL => 'Ghoul',
            self::TYPE_UNDEAD_WIGHT => 'Wight',
            self::TYPE_UNDEAD_MUMMIE => 'Mummie',

            self::TYPE_HALFLING_HALFLING => 'Halfling',
            self::TYPE_HALFLING_TREEMAN => 'Treeman',

            self::TYPE_NORSE_LINEMAN => 'Lineman',
            self::TYPE_NORSE_TROWER => 'Trower',
            self::TYPE_NORSE_RUNNER => 'Runner',
            self::TYPE_NORSE_BERSERKER => 'Berserker',
            self::TYPE_NORSE_NORSE_WEREWOLF => 'Norse Werewolf',
            self::TYPE_NORSE_YHETEE => 'Yhetee',

            self::TYPE_AMAZON_LINEMAN => 'Lineman',
            self::TYPE_AMAZON_THROWER => 'Thrower',
            self::TYPE_AMAZON_CATCHER => 'Catcher',
            self::TYPE_AMAZON_BLITZER => 'Blitzer',

            self::TYPE_ELF_LINEMAN => 'Lineman',
            self::TYPE_ELF_THROWER => 'Thrower',
            self::TYPE_ELF_CATCHER => 'Catcher',
            self::TYPE_ELF_BLITZER => 'Blitzer',

            self::TYPE_HIGH_ELF_LINEMAN => 'Lineman',
            self::TYPE_HIGH_ELF_THROWER => 'Thrower',
            self::TYPE_HIGH_ELF_CATCHER => 'Catcher',
            self::TYPE_HIGH_ELF_BLITZER => 'Blitzer',

            self::TYPE_KHEMRI_SKELETON => 'Skeleton',
            self::TYPE_KHEMRI_THRO_RA => 'Thro-Ra',
            self::TYPE_KHEMRI_BLITZ_RA => 'Blitz-Ra',
            self::TYPE_KHEMRI_TOMB_GUARDIAN => 'Tomb Guardian',

            self::TYPE_NECROMANTIC_ZOMBIE => 'Zombie',
            self::TYPE_NECROMANTIC_GHOUL => 'Ghoul',
            self::TYPE_NECROMANTIC_WIGHT => 'Wight',
            self::TYPE_NECROMANTIC_FLESH_GOLEM => 'Flesh Golem',
            self::TYPE_NECROMANTIC_WEREWOLF => 'Werewolf',

            self::TYPE_NURGLE_ROTTER => 'Rotter',
            self::TYPE_NURGLE_PESTIGOR => 'Pestigor',
            self::TYPE_NURGLE_NURGLE_WARRIOR => 'Nurgle Warrior',
            self::TYPE_NURGLE_BEAST_OF_NURGLE => 'Beast Of Nurgle',

            self::TYPE_OGRE_SNOTLING => 'Snotling',
            self::TYPE_OGRE_OGRE => 'Ogre',

            self::TYPE_VAMPIRE_THRALL => 'Thrall',
            self::TYPE_VAMPIRE_VAMPIRE => 'Vampire',

            self::TYPE_CHAOS_DWARF_HOBGOBLIN => 'Hobgoblin',
            self::TYPE_CHAOS_DWARF_BLOCKER => 'Blocker',
            self::TYPE_CHAOS_DWARF_BULL_CENTAUR => 'Bull Centaur',
            self::TYPE_CHAOS_DWARF_MINOTAUR => 'Minotaur',

            self::TYPE_BRETONNIA_LINEMAN => 'Lineman',
            self::TYPE_BRETONNIA_BLITZER => 'Blitzer',
            self::TYPE_BRETONNIA_BLOCKER => 'Blocker',

            self::TYPE_KISLEV_LINEMAN => 'Lineman',
            self::TYPE_KISLEV_CATCHER => 'Catcher',
            self::TYPE_KISLEV_BLITZER => 'Blitzer',
            self::TYPE_KISLEV_TAME_BEAR => 'Tame Bear',
        );
    }

    /**
     * @param integer $id
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