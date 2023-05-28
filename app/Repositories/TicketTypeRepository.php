<?php

namespace App\Repositories;

use App\Interfaces\TicketTypeRepositoryInterface;
use App\Models\TicketType;

class TicketTypeRepository implements TicketTypeRepositoryInterface {
    public function getAllTicketTypes() {
        return TicketType::all();
    }
}


?>
