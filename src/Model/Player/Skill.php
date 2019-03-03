<?php
/**
 * User: boshurik
 * Date: 12.10.16
 * Time: 21:40
 */

namespace BoShurik\BloodBowl\Replay\Model\Player;

final class Skill
{
    const SKILL_STRIP_BALL = 1;
    const SKILL_ST = 2;
    const SKILL_AG = 3;
    const SKILL_MA = 4;
    const SKILL_AV = 5;
    const SKILL_CATCH = 6;
    const SKILL_DODGE = 7;
    const SKILL_SPRINT = 8;
    const SKILL_PASS_BLOCK = 9;
    const SKILL_FOUL_APPEARANCE = 10;
    const SKILL_LEAP = 11;
    const SKILL_EXTRA_ARMS = 12;
    const SKILL_MIGHTY_BLOW = 13;
    const SKILL_LEADER = 14;
    const SKILL_HORNS = 15;
    const SKILL_TWO_HEADS = 16;
    const SKILL_STAND_FIRM = 17;
    const SKILL_ALWAYS_HUNGRY = 18;
    const SKILL_REGENERATION = 19;
    const SKILL_TAKE_ROOT = 20;
    const SKILL_ACCURATE = 21;
    const SKILL_BREAK_TACKLE = 22;
    const SKILL_SNEAKY_GIT = 23;
    const SKILL_CHAINSAW = 25;
    const SKILL_DAUNTLESS = 26;
    const SKILL_DIRTY_PLAYER = 27;
    const SKILL_DIVING_CATCH = 28;
    const SKILL_DUMP_OFF = 29;
    const SKILL_BLOCK = 30;
    const SKILL_BONE_HEAD = 31;
    const SKILL_VERY_LONG_LEGS = 32;
    const SKILL_DISTURBING_PRESENCE = 33;
    const SKILL_DIVING_TACKLE = 34;
    const SKILL_FEND = 35;
    const SKILL_FRENZY = 36;
    const SKILL_GRAB = 37;
    const SKILL_GUARD = 38;
    const SKILL_HAIL_MARY_PASS = 39;
    const SKILL_JUGGERNAUT = 40;
    const SKILL_JUMP_UP = 41;
    const SKILL_LONER = 44;
    const SKILL_NERVES_OF_STEEL = 45;
    const SKILL_NO_HANDS = 46;
    const SKILL_PASS = 47;
    const SKILL_PILING_ON = 48;
    const SKILL_PREHENSILE_TAIL = 49;
    const SKILL_PRO = 50;
    const SKILL_REALLY_STUPID = 51;
    const SKILL_RIGHT_STUFF = 52;
    const SKILL_SAFE_THROW = 53;
    const SKILL_SECRET_WEAPON = 54;
    const SKILL_SHADOWING = 55;
    const SKILL_SIDE_STEP = 56;
    const SKILL_TACKLE = 57;
    const SKILL_STRONG_ARM = 58;
    const SKILL_STUNTY = 59;
    const SKILL_SURE_FEET = 60;
    const SKILL_SURE_HANDS = 61;
    const SKILL_THICK_SKULL = 63;
    const SKILL_THROW_TEAM_MATE = 64;
    const SKILL_WILD_ANIMAL = 67;
    const SKILL_WRESTLE = 68;
    const SKILL_TENTACLES = 69;
    const SKILL_MULTIPLE_BLOCK = 70;
    const SKILL_KICK = 71;
    const SKILL_KICK_OFF_RETURN = 72;
    const SKILL_BIG_HAND = 74;
    const SKILL_CLAW_CLAWS = 75;
    const SKILL_BALL_CHAIN = 76;
    const SKILL_STAB = 77;
    const SKILL_HYPNOTIC_GAZE = 78;
    const SKILL_BOMBARDIER = 80;
    const SKILL_DECAY = 81;
    const SKILL_NURGLES_ROT = 82;
    const SKILL_BLOOD_LUST = 84;
    const SKILL_TITCHY = 83;
    const SKILL_ANIMOSITY = 86;
    const SKILL_FAN_FAVOURITE = 228;
    const SKILL_STAKES = 264;

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
            self::SKILL_STRIP_BALL => 'Strip Ball',
            self::SKILL_ST => '+1 ST',
            self::SKILL_AG => '+1 AG',
            self::SKILL_MA => '+1 MA',
            self::SKILL_AV => '+ 1 AV',
            self::SKILL_CATCH => 'Catch',
            self::SKILL_DODGE => 'Dodge',
            self::SKILL_SPRINT => 'Sprint',
            self::SKILL_PASS_BLOCK => 'Pass Block',
            self::SKILL_FOUL_APPEARANCE => 'Foul Appearance',
            self::SKILL_LEAP => 'Leap',
            self::SKILL_EXTRA_ARMS => 'Extra Arms',
            self::SKILL_MIGHTY_BLOW => 'Mighty Blow',
            self::SKILL_LEADER => 'Leader',
            self::SKILL_HORNS => 'Horns',
            self::SKILL_TWO_HEADS => 'Two Heads',
            self::SKILL_STAND_FIRM => 'Stand Firm',
            self::SKILL_ALWAYS_HUNGRY => 'Always Hungry',
            self::SKILL_REGENERATION => 'Regeneration',
            self::SKILL_TAKE_ROOT => 'Take Root',
            self::SKILL_ACCURATE => 'Accurate',
            self::SKILL_BREAK_TACKLE => 'Break Tackle',
            self::SKILL_SNEAKY_GIT => 'Sneaky Git',
            self::SKILL_DAUNTLESS => 'Dauntless',
            self::SKILL_DIRTY_PLAYER => 'Dirty Player',
            self::SKILL_DIVING_CATCH => 'Diving Catch',
            self::SKILL_DUMP_OFF => 'Dump-Off',
            self::SKILL_BLOCK => 'Block',
            self::SKILL_BONE_HEAD => 'Bone-head',
            self::SKILL_VERY_LONG_LEGS => 'Very Long Legs',
            self::SKILL_DISTURBING_PRESENCE => 'Disturbing Presence',
            self::SKILL_DIVING_TACKLE => 'Diving Tackle',
            self::SKILL_FEND => 'Fend',
            self::SKILL_FRENZY => 'Frenzy',
            self::SKILL_GRAB => 'Grab',
            self::SKILL_GUARD => 'Guard',
            self::SKILL_HAIL_MARY_PASS => 'Hail Mary Pass',
            self::SKILL_JUGGERNAUT => 'Juggernaut',
            self::SKILL_JUMP_UP => 'Jump Up',
            self::SKILL_LONER => 'Loner',
            self::SKILL_NERVES_OF_STEEL => 'Nerves of Steel',
            self::SKILL_NO_HANDS => 'No Hands',
            self::SKILL_PASS => 'Pass',
            self::SKILL_PILING_ON => 'Piling On',
            self::SKILL_PREHENSILE_TAIL => 'Prehensile Tail',
            self::SKILL_PRO => 'Pro',
            self::SKILL_REALLY_STUPID => 'Really Stupid',
            self::SKILL_RIGHT_STUFF => 'Right Stuff',
            self::SKILL_SAFE_THROW => 'Safe Throw',
            self::SKILL_SECRET_WEAPON => 'Secret Weapon',
            self::SKILL_SHADOWING => 'Shadowing',
            self::SKILL_SIDE_STEP => 'Side Step',
            self::SKILL_TACKLE => 'Tackle',
            self::SKILL_STRONG_ARM => 'Strong Arm',
            self::SKILL_STUNTY => 'Stunty',
            self::SKILL_SURE_FEET => 'Sure Feet',
            self::SKILL_SURE_HANDS => 'Sure Hands',
            self::SKILL_THICK_SKULL => 'Thick Skull',
            self::SKILL_THROW_TEAM_MATE => 'Throw Team-Mate',
            self::SKILL_WILD_ANIMAL => 'Wild Animal',
            self::SKILL_WRESTLE => 'Wrestle',
            self::SKILL_TENTACLES => 'Tentacles',
            self::SKILL_MULTIPLE_BLOCK => 'Multiple Block',
            self::SKILL_KICK => 'Kick',
            self::SKILL_KICK_OFF_RETURN => 'Kick-Off Return',
            self::SKILL_BIG_HAND => 'Big Hand',
            self::SKILL_CLAW_CLAWS => 'Claw / Claws',
            self::SKILL_STAB => 'Stab',
            self::SKILL_ANIMOSITY => 'Animosity',
            self::SKILL_BALL_CHAIN => 'Ball & Chain',
            self::SKILL_BLOOD_LUST => 'Blood Lust',
            self::SKILL_BOMBARDIER => 'Bombardier',
            self::SKILL_CHAINSAW => 'Chainsaw',
            self::SKILL_DECAY => 'Decay',
            self::SKILL_FAN_FAVOURITE => 'Fan Favourite',
            self::SKILL_HYPNOTIC_GAZE => 'Hypnotic Gaze',
            self::SKILL_NURGLES_ROT => 'Nurgle\'s Rot',
            self::SKILL_STAKES => 'Stakes',
            self::SKILL_TITCHY => 'Titchy',
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