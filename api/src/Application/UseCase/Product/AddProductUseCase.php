<?php

namespace Application\UseCase\Product;

use Application\Domain\Product\Repository\ProductRepositoryInterface;
use Application\UseCase\Shared\Interfaces\FileStorageInterface;
use Application\Domain\Product\Entity\ProductEntity as Product;

use Application\UseCase\Product\DTO\{
    AddProductInputDto as InputDto,
    AddProductOutputDto as OutPutDto
};

use Application\Domain\Shared\ValueObject\Uuid;

use DateTime;

class AddProductUseCase
{
    public function __construct(
        protected ProductRepositoryInterface $repository,
        protected FileStorageInterface $fileStorage
    ) {}

    public function execute(InputDto $input) {

        $imageUrl = 'https://placehold.co/50x50/CCC/FFF?text=sem\nimagem';
        if (!empty($input->imageFile)) $imageUrl = $this->fileStorage->store('images/products', $input->imageFile);

        $product = new Product(
            name: $input->name,
            description: $input->description,
            price: $input->price,
            expirationDate: new DateTime($input->expirationDate),
            imageUrl: $imageUrl,
            categoryId: $input->categoryId ? new Uuid($input->categoryId) : null
        );

        $this->repository->insert($product);

        return new OutputDto(
            id: $product->id
        );
    }
}
