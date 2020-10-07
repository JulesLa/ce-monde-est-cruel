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
        //IA 133917 inverse adversaire
        //IA 10297 Stats
        //IA ??? inverse X premier rounds
        if ($this->result->getNbRound() < 50) {
            if ($this->result->getLastChoiceFor($this->mySide) === 0) {
                return parent::rockChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) === parent::rockChoice()) {
                return parent::paperChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) === parent::scissorsChoice()) {
                return parent::rockChoice();
            }
            return parent::scissorsChoice();
        }
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
