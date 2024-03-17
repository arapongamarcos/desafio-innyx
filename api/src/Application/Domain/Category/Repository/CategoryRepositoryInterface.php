<?php

namespace Application\Domain\Category\Repository;

use Application\Domain\Shared\Repository\PaginationInterface;
use Application\Domain\Category\Presenter\CategoryPresenterInterface;
use Application\Domain\Category\Entity\CategoryEntity;

interface CategoryRepositoryInterface
{
    public function paginate(array $filters): PaginationInterface;
    public function findAll(): CategoryPresenterInterface;
    public function findById(string $productId): CategoryEntity;
    public function insert(CategoryEntity $product): void;
    public function update(CategoryEntity $product): void;
    public function delete(string $productId): bool;
}
