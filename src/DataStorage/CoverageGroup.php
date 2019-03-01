<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 9:45
 */

namespace IDefendApi\DataStorage;

use IDefendApi\Exception\ApiReplyExcetion;

class CoverageGroup extends DataStorage
{

    /** @var CoveragePolicy */
    public $Policy;
    /**
     * @var Loading[]
     */
    public $Loading = array();
    /**
     * @var Extra[]
     */
    public $Extra = array();
    /** @var Coverage[] */
    public $Coverage = array();

    /**
     * @param array $array
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        /** @var static $return */
        $return = parent::__fromArray($array);
        return $return;
    }

    /**
     * @return CoveragePolicy
     */
    public function getPolicy(): CoveragePolicy
    {
        return $this->Policy;
    }

    /**
     * @param CoveragePolicy|array $Policy
     * @return CoverageGroup
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setPolicy($Policy): CoverageGroup
    {
        if (is_array($Policy)) {
            $Policy = CoveragePolicy::__fromArray($Policy);
        }
        $this->Policy = $Policy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoading()
    {
        return $this->Loading;
    }

    /**
     * @param $Loadings
     * @return $this
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setLoading($Loadings)
    {
        foreach ($Loadings as $key => $loading) {
            if (is_array($loading)) {
                $Loadings[$key] = Loading::__fromArray($loading);
            }
        }
        $this->Loading = $Loadings;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->Extra;
    }

    /**
     * @param $Extras
     * @return CoverageGroup
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setExtra($Extras)
    {
        foreach ($Extras as $key => $extra) {
            if (is_array($extra)) {
                $Extras[$key] = Extra::__fromArray($extra);
            }
        }
        $this->Extra = $Extras;
        return $this;
    }

    /**
     * @return Coverage[]
     */
    public function getCoverage()
    {
        return $this->Coverage;
    }

    /**
     * @param $Coverage
     * @return $this
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setCoverage($Coverage)
    {
        foreach ($Coverage as $key => $item) {
            if (is_array($item)) {
                $Coverage[$key] = Coverage::__fromArray($item);
            }
        }
        $this->Coverage = $Coverage;
        return $this;
    }

    public function selectLoading($type, $id)
    {
        $selected = null;
        $select = null;
        foreach ($this->Loading as $no => $item) {
            if ($item->type == $type && $item->selected == 'true') {
                $selected = $no;
            }
            if (($item->type == $type) && ($item->id == $id)) {
                $select = $no;
            }

        }
        if (!is_null($select)) {
            if (!is_null($selected)) {
                $this->Loading[$selected]->setSelected('false');
            }
            $this->Loading[$select]->setSelected('true');
            return true;
        }
        return false;
    }

    public function changeExtra($id, $selected)
    {
        foreach ($this->Extra as $no => $item) {
            if ($item->getId() == $id) {
                $this->Extra[$no]->setSelected($selected);
                return true;
            }
        }
        return false;
    }

    public function selectCoverage($id, $premium = null)
    {
        $selected = null;
        $select = null;
        foreach ($this->Coverage as $no => $item) {
            if ($item->selected == 'true') {
                $selected = $no;
            }
            if ($item->id == $id) {
                $select = $no;
            }

        }
        if (!is_null($select)) {
            if (!is_null($selected)) {
                $this->Coverage[$selected]->setSelected('false');
            }
            $this->Coverage[$select]->setSelected('true');
            if (!is_null($premium)) {
                if ((floatval($this->Coverage[$select]->magic_figures->getMin()) > floatval($premium)) || (floatval($this->Coverage[$select]->magic_figures->getMax()) < floatval($premium))) {
                    throw new \InvalidArgumentException("Premium range is " . $this->Coverage[$select]->magic_figures->getMin() . " - " . $this->Coverage[$select]->magic_figures->getMax());
                }
                $this->Coverage[$select]->setPremium($premium);
            }

            return true;
        }
        return false;
    }

}