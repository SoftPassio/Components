<?php

namespace AppVerk\Components\Model;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use DateTime;

interface UserInterface extends AdvancedUserInterface, \Serializable
{
    /**
     * Default role for every user
     */
    const ROLE_DEFAULT = 'ROLE_USER';

    /**
     * Main admin role
     */
    const ROLE_MASTER = 'ROLE_MASTER';

    /**
     * Use that role to manage client hidden methods
     */
    const ROLE_DEVELOPER = 'ROLE_DEVELOPER';

    /**
     *  resetting token valid 2 days
     */
    const TOKEN_TTL = 172800;

    /**
     * @return mixed
     */
    public function getId() : ?int;

    public function __construct();

    /**
     * @return string
     */
    public function getUsername();

    /**
     * @param string $username
     */
    public function setUsername(string $username);

    /**
     * @return string
     */
    public function getFirstName() : ?string;

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName);

    /**
     * @return string
     */
    public function getLastName() : ?string;

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName);

    /**
     * @return string
     */
    public function getEmail() : ?string;

    /**
     * @param string $email
     */
    public function setEmail(string $email);

    /**
     * @return string
     */
    public function getPassword() : ?string;

    /**
     * @param string $password
     */
    public function setPassword(string $password);

    /**
     * @return string
     */
    public function getSalt();

    /**
     * @param string $salt
     */
    public function setSalt(string $salt);

    /**
     * @return mixed
     */
    public function getRoles() : array ;

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled);

    /**
     * @return mixed
     */
    public function getPasswordRequestedAt() : ?DateTime;

    /**
     * @param mixed $passwordRequestedAt
     */
    public function setPasswordRequestedAt(DateTime $passwordRequestedAt);

    /**
     * @return mixed
     */
    public function getPasswordRequestToken() : ?string;

    /**
     * @param mixed $passwordRequestToken
     */
    public function setPasswordRequestToken(string $passwordRequestToken);

    /**
     * @return mixed
     */
    public function getPhone() : ?string;

    /**
     * @param mixed $phone
     */
    public function setPhone(string $phone);

    public function eraseCredentials();

    public function isPasswordRequestNonExpired(): bool;

    public function hasRole(string $role) : bool;

    public function addRole(string $newRole = null);

    public function removeRole(string $role);

    public function __toString();
}
