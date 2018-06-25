<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

class Users {

    /**
     * @var OKApiRequest
     */
    private $request;

    /**
     * Apps constructor.
     * @param OKApiRequest $request
     */
    public function __construct(OKApiRequest $request) {
        $this->request = $request;
    }

    public function deleteGuests(string $access_token, array $params = []) {
        $this->request->post('users.deleteGuests', $access_token, $params);
    }

    public function getAdditionalInfo(string $access_token, array $params = []) {
        $this->request->post('users.getAdditionalInfo', $access_token, $params);
    }

    public function getCallsLeft(string $access_token, array $params = []) {
        $this->request->post('users.getCallsLeft', $access_token, $params);
    }

    public function getCurrentUser(string $access_token, array $params = []) {
        $this->request->post('users.getCurrentUser', $access_token, $params);
    }

    public function getGames(string $access_token, array $params = []) {
        $this->request->post('users.getGames', $access_token, $params);
    }

    public function getGuests(string $access_token, array $params = []) {
        $this->request->post('users.getGuests', $access_token, $params);
    }

    public function getHolidays(string $access_token, array $params = []) {
        $this->request->post('users.getHolidays', $access_token, $params);
    }

    public function getInfo(string $access_token, array $params = []) {
        $this->request->post('users.getInfo', $access_token, $params);
    }

    public function getInfoBy(string $access_token, array $params = []) {
        $this->request->post('users.getInfoBy', $access_token, $params);
    }

    public function getInvitableFriends(string $access_token, array $params = []) {
        $this->request->post('users.getInvitableFriends', $access_token, $params);
    }

    public function getLoggedInUser(string $access_token, array $params = []) {
        $this->request->post('users.getLoggedInUser', $access_token, $params);
    }

    public function getMobileOperator(string $access_token, array $params = []) {
        $this->request->post('users.getMobileOperator', $access_token, $params);
    }

    public function getSettings(string $access_token, array $params = []) {
        $this->request->post('users.getSettings', $access_token, $params);
    }

    public function hasAppPermission(string $access_token, array $params = []) {
        $this->request->post('users.hasAppPermission', $access_token, $params);
    }

    public function isAppUser(string $access_token, array $params = []) {
        $this->request->post('users.isAppUser', $access_token, $params);
    }

    public function removeAppPermissions(string $access_token, array $params = []) {
        $this->request->post('users.removeAppPermissions', $access_token, $params);
    }

    public function setSettings(string $access_token, array $params = []) {
        $this->request->post('users.setSettings', $access_token, $params);
    }

    public function setStatus(string $access_token, array $params = []) {
        $this->request->post('users.setStatus', $access_token, $params);
    }

    public function updateMask(string $access_token, array $params = []) {
        $this->request->post('users.updateMask', $access_token, $params);
    }

    public function updateMasks(string $access_token, array $params = []) {
        $this->request->post('users.updateMasks', $access_token, $params);
    }

    public function updateMasksV2(string $access_token, array $params = []) {
        $this->request->post('users.updateMasksV2', $access_token, $params);
    }

}