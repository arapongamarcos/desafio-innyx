<?php

namespace Application\UseCase\Category;

use Application\Domain\Category\Repository\CategoryRepositoryInterface;
use Application\Domain\Category\Entity\CategoryEntity as Category;

use Application\UseCase\Category\DTO\{
    AddCategoryInputDto as InputDto,
    AddCategoryOutputDto as OutPutDto
};

use Application\Domain\Shared\ValueObject\Uuid;

use DateTime;

class AddCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function execute(InputDto $input) {

        $category = new Category(
            name: $input->name,
        );

        $this->repository->insert($category);

        return new OutputDto(
            id: $category->id
        );
    }
}
