<?php
namespace App\Repositories;
use App\Interfaces\TicketTypeRepositoryInterface;
use App\Models\TicketType;

class TicketTypeRepository implements TicketTypeRepositoryInterface {
    public function getAllTicketTypes($paginate = false, $num = 10) {
        return $paginate ? TicketType::paginate($num) : TicketType::all();
    }
}


?>
