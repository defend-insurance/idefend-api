<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 06.03.2019
 * Time: 12:14
 */

namespace IDefendApi\DataStorage;


class PolicyListResultPaging extends DataStorage
{


    /** @var int|null */
    public $currentPage;
    /** @var int|null */
    public $pageCount;
    /** @var int|null */
    public $recordsCount;
    /** @var int|null */
    public $recordsInPage;

    /**
     * @param array $array
     * @return DataStorage|PolicyListResultPaging
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        return parent::__fromArray($array);
    }

    /**
     * @return int|null
     */
    public function getCurrentPage(): ?int
    {
        return $this->currentPage;
    }

    /**
     * @param int|null $currentPage
     * @return PolicyListResultPaging
     */
    public function setCurrentPage(?int $currentPage): PolicyListResultPaging
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPageCount(): ?int
    {
        return $this->pageCount;
    }

    /**
     * @param int|null $pageCount
     * @return PolicyListResultPaging
     */
    public function setPageCount(?int $pageCount): PolicyListResultPaging
    {
        $this->pageCount = $pageCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRecordsCount(): ?int
    {
        return $this->recordsCount;
    }

    /**
     * @param int|null $recordsCount
     * @return PolicyListResultPaging
     */
    public function setRecordsCount(?int $recordsCount): PolicyListResultPaging
    {
        $this->recordsCount = $recordsCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRecordsInPage(): ?int
    {
        return $this->recordsInPage;
    }

    /**
     * @param int|null $recordsInPage
     * @return PolicyListResultPaging
     */
    public function setRecordsInPage(?int $recordsInPage): PolicyListResultPaging
    {
        $this->recordsInPage = $recordsInPage;
        return $this;
    }



}