<?php
declare(strict_types=1);

namespace App\Domain\jobdating;

use JsonSerializable;

class jobdating implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $time;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $name;

    /**
     * @param int|null  $id
     * @param string    $time
     * @param string    $place
     * @param string    $name
     */
    public function __construct(?int $id, string $time, string $place, string $name)
    {
        $this->id = $id;
        $this->time = strtolower($time);
        $this->place = ucfirst($place);
        $this->name = ucfirst($name);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function gettime(): string
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getplace(): string
    {
        return $this->place;
    }

    /**
     * @return string
     */
    public function getname(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'time' => $this->time,
            'place' => $this->place,
            'name' => $this->name,
        ];
    }
}
