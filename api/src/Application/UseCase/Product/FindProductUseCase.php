<?php

namespace Application\UseCase\Product;

use Application\Domain\Product\Repository\ProductRepositoryInterface;
use Application\Domain\Category\Repository\CategoryRepositoryInterface;

use Application\UseCase\Product\DTO\{
    FindProductInputDto as InputDto,
    FindProductOutputDto as OutputDto
};

use DateTime;

class FindProductUseCase
{
    public function __construct(
        protected ProductRepositoryInterface $repository,
        protected CategoryRepositoryInterface $categoryRepository
    ) {}

    public function execute(InputDto $input) {
        $product = $this->repository->findById($input->id);
        $createData = $this->categoryRepository->findAll();

        return new OutputDto(
            id: $product->id,
            name: $product->name,
            description: $product->description,
            price: $product->price * 100,
            expirationDate: $product->expirationDate->format('Y-m-d'),
            imageUrl: $product->imageUrl,
            categoryId: $product->categoryId,
            options: [
                'categories' => $createData->toQuasarFormSelect()
            ]
        );
    }
}
