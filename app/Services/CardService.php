<?php

namespace App\Services;

use App\Models\Card;
use App\Services\Base\AbstractService;


class CardService extends AbstractService {
    protected $repository;

    public function __construct(Card $card) {
        $this->repository = $card;
        parent::__construct($card);
    }

    //override index
    
}