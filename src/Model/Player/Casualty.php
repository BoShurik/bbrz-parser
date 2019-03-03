<?php
/**
 * User: boshurik
 * Date: 13.10.16
 * Time: 22:49
 */

namespace BoShurik\BloodBowl\Replay\Model\Player;

final class Casualty
{
    const CASUALTY_BADLY_HURT = 1;
    const CASUALTY_BROKEN_RIBS = 2;
    const CASUALTY_GROIN_STAIN = 3;
    const CASUALTY_GOUGED_EYE = 4;
    const CASUALTY_BROKEN_JAW = 5;
    const CASUALTY_FRACTURED_ARM = 6;
    const CASUALTY_FRACTURED_LEG = 7;
    const CASUALTY_SMASHED_HAND = 8;
    const CASUALTY_PINCHED_NERVE = 9;
    const CASUALTY_DAMAGED_BACK = 10;
    const CASUALTY_SMASHED_KNEE = 11;
    const CASUALTY_SMASHED_HIP = 12;
    const CASUALTY_SMASHED_ANKLE = 13;
    const CASUALTY_SERIOUS_CONCUSSION = 14;
    const CASUALTY_FRACTURED_SCULL = 15;
    const CASUALTY_BROKEN_NECK = 16;
    const CASUALTY_SMASHED_COLLAR_BONE = 17;
    const CASUALTY_DEATH = 18;

    const TYPE_BADLY_HURT = 0;
    const TYPE_MISS_NEXT_GAME = 1;
    const TYPE_NIGGLE = 2;
    const TYPE_MA = 3;
    const TYPE_AV = 4;
    const TYPE_AG = 5;
    const TYPE_ST = 6;
    const TYPE_DEATH = 7;

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
            self::CASUALTY_BADLY_HURT => 'Badly hurt',
            self::CASUALTY_BROKEN_RIBS => 'Broken ribs',
            self::CASUALTY_GROIN_STAIN => 'Groin stain',
            self::CASUALTY_GOUGED_EYE => 'Gouged eye',
            self::CASUALTY_BROKEN_JAW => 'Broken jaw',
            self::CASUALTY_FRACTURED_ARM => 'Fractured arm',
            self::CASUALTY_FRACTURED_LEG => 'Fractured leg',
            self::CASUALTY_SMASHED_HAND => 'Smashed hand',
            self::CASUALTY_PINCHED_NERVE => 'Pinched nerve',
            self::CASUALTY_DAMAGED_BACK => 'Damaged back',
            self::CASUALTY_SMASHED_KNEE => 'Smashed knee',
            self::CASUALTY_SMASHED_HIP => 'Smashed hip',
            self::CASUALTY_SMASHED_ANKLE => 'Smashed ankle',
            self::CASUALTY_SERIOUS_CONCUSSION => 'Serious concussion',
            self::CASUALTY_FRACTURED_SCULL => 'Fractured scull',
            self::CASUALTY_BROKEN_NECK => 'Broken neck',
            self::CASUALTY_SMASHED_COLLAR_BONE => 'Smashed collar bone',
            self::CASUALTY_DEATH => 'Death',
        );
    }

    /**
     * @return array
     */
    public static function getTypeNames(): array
    {
        return array(
            self::TYPE_BADLY_HURT => 'Badly hurt',
            self::TYPE_MISS_NEXT_GAME => 'Miss next game.',
            self::TYPE_NIGGLE => 'Niggle',
            self::TYPE_MA => '- MA',
            self::TYPE_AV => '- AV',
            self::TYPE_AG => '- AG',
            self::TYPE_ST => '- ST',
            self::TYPE_DEATH => 'DEATH',
        );
    }

    /**
     * @return array
     */
    public static function getTypes(): array
    {
        return array(
            self::CASUALTY_BADLY_HURT => self::TYPE_BADLY_HURT,
            self::CASUALTY_BROKEN_RIBS => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_GROIN_STAIN => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_GOUGED_EYE => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_BROKEN_JAW => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_FRACTURED_ARM => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_FRACTURED_LEG => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_SMASHED_HAND => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_PINCHED_NERVE => self::TYPE_MISS_NEXT_GAME,
            self::CASUALTY_DAMAGED_BACK => self::TYPE_NIGGLE,
            self::CASUALTY_SMASHED_KNEE => self::TYPE_NIGGLE,
            self::CASUALTY_SMASHED_HIP => self::TYPE_MA,
            self::CASUALTY_SMASHED_ANKLE => self::TYPE_MA,
            self::CASUALTY_SERIOUS_CONCUSSION => self::TYPE_AV,
            self::CASUALTY_FRACTURED_SCULL => self::TYPE_AV,
            self::CASUALTY_BROKEN_NECK => self::TYPE_AG,
            self::CASUALTY_SMASHED_COLLAR_BONE => self::TYPE_ST,
            self::CASUALTY_DEATH => self::TYPE_DEATH,
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
            return 'Unknown';
        }

        return $names[$id];
    }

    /**
     * @param $id
     * @return string
     */
    public static function getTypeById($id): string 
    {
        $types = self::getTypes();
        if (!isset($types[$id])) {
            return 'Unknown';
        }

        return $types[$id];
    }

    /**
     * @param $id
     * @return string
     */
    public static function getTypeNameById(int $id): string
    {
        $names = self::getTypeNames();
        if (!isset($names[$id])) {
            return 'Unknown';
        }

        return $names[$id];
    }

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return sprintf('%s (%s)', $this->getName(), $this->getTypeName());
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
    public function getType(): int
    {
        return self::getTypeById($this->id);
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return self::getTypeNameById($this->getType());
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}