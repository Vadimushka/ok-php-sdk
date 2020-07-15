<?php


namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Discussions {

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

    /**
     * Получение подробной информации о дискуссии с возможностью в одном запросе получить информацию об упоминаемых в дискуссии объектах.
     *
     * @param string $access_token
     * @param array $params
     *  @var string $discussionId: Идентификатор обсуждаемого объекта
     *
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function get(string $access_token, array $params = []) {
        return $this->request->post('discussions.get', $access_token, $params);
    }

    public function getAttachedResources(string $access_token, array $params = []) {
        return $this->request->post('discussions.getAttachedResources', $access_token, $params);
    }

    public function getComment(string $access_token, array $params = []) {
        return $this->request->post('discussions.getComment', $access_token, $params);
    }

    public function getCommentLikes(string $access_token, array $params = []) {
        return $this->request->post('discussions.getCommentLikes', $access_token, $params);
    }

    public function getComments(string $access_token, array $params = []) {
        return $this->request->post('discussions.getComments', $access_token, $params);
    }

    public function getDiscussionComments(string $access_token, array $params = []) {
        return $this->request->post('discussions.getDiscussionComments', $access_token, $params);
    }

    public function getDiscussionCommentsCount(string $access_token, array $params = []) {
        return $this->request->post('discussions.getDiscussionCommentsCount', $access_token, $params);
    }

    public function getDiscussionLikes(string $access_token, array $params = []) {
        return $this->request->post('discussions.getDiscussionLikes', $access_token, $params);
    }

    public function getDiscussions(string $access_token, array $params = []) {
        return $this->request->post('discussions.getDiscussions', $access_token, $params);
    }

    public function getDiscussionsNews(string $access_token, array $params = []) {
        return $this->request->post('discussions.getDiscussionsNews', $access_token, $params);
    }

    public function getList(string $access_token, array $params = []) {
        return $this->request->post('discussions.getList', $access_token, $params);
    }

}