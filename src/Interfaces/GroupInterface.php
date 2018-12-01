<?php

namespace duncan3dc\Sonos\Common\Interfaces;

/**
 * Allows interaction with the groups of speakers.
 */
interface GroupInterface
{
    /**
     * Start playing the active music for this group.
     *
     * @return $this
     */
    public function play(): self;

    /**
     * Pause the group.
     *
     * @return $this
     */
    public function pause(): self;

    /**
     * Get the speakers that are in this group.
     *
     * @return iterable|PlayerInterface[]
     */
    public function getPlayers(): iterable;

    /**
     * Adds the specified player to this group.
     *
     * @param PlayerInterface $player The speaker to add to the group
     *
     * @return $this
     */
    public function addPlayer(PlayerInterface $player): self;

    /**
     * Removes the specified speaker from this group.
     *
     * @param PlayerInterface $player The speaker to remove from the group
     *
     * @return $this
     */
    public function removePlayer(PlayerInterface $player): self;
}
