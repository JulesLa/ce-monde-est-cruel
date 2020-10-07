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
        //IA 10483 inverse 50 premier rounds puis stats
        //IA 8926
        //IA 8261 LOOSING STRAT
        //IA 8077 LOOSING STRAT
        //IA 6891
        //IA 7297
        //IA
        if ($this->result->getNbRound() < 10) {
            if ($this->result->getLastChoiceFor($this->opponentSide) === parent::rockChoice()) {
                return parent::paperChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) === parent::scissorsChoice()) {
                return parent::rockChoice();
            }
            return parent::scissorsChoice();
        }

        if ($this->result->getStatsFor($this->opponentSide)[parent::scissorsChoice()] > $this->result->getStatsFor($this->opponentSide)[parent::rockChoice()]) {
            if ($this->result->getStatsFor($this->opponentSide)[parent::scissorsChoice()] > $this->result->getStatsFor($this->opponentSide)[parent::paperChoice()]) {
                return parent::rockChoice();
            }
            return parent::scissorsChoice();
        }
        if ($this->result->getStatsFor($this->opponentSide)[parent::paperChoice()] > $this->result->getStatsFor($this->opponentSide)[parent::rockChoice()]) {
            return parent::scissorsChoice();
        }
        return parent::paperChoice();

    }
};
