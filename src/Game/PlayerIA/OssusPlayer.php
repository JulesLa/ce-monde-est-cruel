<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class OssusPlayers
 * @package Hackathon\PlayerIA
 * @author Jules LAPISARDI
 */
class OssusPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        if ($this->result->getLastChoiceFor($this->mySide) === 0) {
            return parent::rockChoice();
        }
        if ($this->result->getStatsFor($this->opponentSide)[parent::scissorsChoice()] > $this->result->getStatsFor($this->opponentSide)[parent::rockChoice()]) {
            if ($this->result->getStatsFor($this->opponentSide)[parent::scissorsChoice()] > $this->result->getStatsFor($this->opponentSide)[parent::paperChoice()]) {
                return parent::rockChoice();
            }
            return parent::scissorsChoice();
        }
        return parent::paperChoice();

    }
};
