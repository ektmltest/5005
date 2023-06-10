<?php
namespace App\Interfaces;

interface GallaryProjectRepositoryInterface{
    public function getAllProjects($paginate = true, $num = 5);

    public function getProjectById($id);
}
