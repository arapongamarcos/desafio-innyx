<?php

namespace Application\Domain\Product\Repository;

use Application\Domain\Shared\Repository\PaginationInterface;
use Application\Domain\Product\Entity\ProductEntity;

interface ProductRepositoryInterface
{
    public function paginate(array $filters): PaginationInterface;
    public function findById(string $productId): ProductEntity;
    public function insert(ProductEntity $product): void;
    public function update(ProductEntity $product): void;
    public function delete(string $productId): bool;
}
