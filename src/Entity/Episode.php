<?php

declare(strict_types=1);

namespace Entity;

class Episode
{
    private int $id;
    private int $seasonId;
    private string $name;
    private string $overview;
    private int $episodeNumber;

    /** id getter
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /** seasonId getter
     *
     * @return int
     */
    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    /** name getter
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /** overview getter
     *
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /** episodeNumber getter
     *
     * @return int
     */
    public function getEpisodeNumber(): int
    {
        return $this->episodeNumber;
    }

    /** id setter
     *
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /** seasonId setter
     *
     * @param int $seasonId
     * @return void
     */
    public function setSeasonId(int $seasonId): void
    {
        $this->seasonId = $seasonId;
    }

    /** name setter
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /** name setter
     * @param string $overview
     * @return void
     */
    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    /** episodeNumber setter
     * @param int $episodeNumber
     * @return void
     */
    public function setEpisodeNumber(int $episodeNumber): void
    {
        $this->episodeNumber = $episodeNumber;
    }
}
