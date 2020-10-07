<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class OssusPlayers
 * @package Hackathon\PlayerIA
 * @author Jules LAPISARDI
 * @description Mon but est de jouer grace aux stats pour jouer le contre de ce que l'adversaire joue le plus, pour les 10 premiers tours je joue juste l'opposé de l'adversaire pour recuperer une base de stats
 */
class OssusPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    public function getChoice()
    {
        if ($this->result->getNbRound() < 77) {
            if ($this->result->getLastChoiceFor($this->opponentSide) === parent::rockChoice()) {
                return parent::scissorsChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) === parent::scissorsChoice()) {
                return parent::paperChoice();
            }
            return parent::rockChoice();
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
