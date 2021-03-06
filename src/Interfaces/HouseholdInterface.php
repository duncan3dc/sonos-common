<?php

namespace duncan3dc\Sonos\Common\Interfaces;

/**
 * Provides methods to locate players/groups on the household.
 */
interface HouseholdInterface
{
    /**
     * Get all the speakers on the network.
     *
     * @return iterable|PlayerInterface[]
     */
    public function getPlayers(): iterable;

    /**
     * Get all the speakers with the specified room name.
     *
     * @param string $room The name of the room to look for
     *
     * @return iterable|PlayerInterface[]
     */
    public function getPlayersByRoom(string $room): iterable;

    /**
     * Get a speaker with the specified room name.
     *
     * @param string $room The name of the room to look for
     *
     * @return PlayerInterface
     */
    public function getPlayerByRoom(string $room): PlayerInterface;

    /**
     * Get all the coordinators on the network.
     *
     * @return iterable|GroupInterface[]
     */
    public function getGroups(): iterable;

    /**
     * Get the coordinator for the specified room name.
     *
     * @param string $room The name of the room to look for
     *
     * @return GroupInterface
     */
    public function getGroupByRoom(string $room): GroupInterface;
}
