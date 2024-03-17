<?php

namespace Application\UseCase\Category;

use Application\Domain\Category\Repository\CategoryRepositoryInterface;
use Application\Domain\Category\Entity\CategoryEntity as Category;

use Application\UseCase\Category\DTO\{
    EditCategoryInputDto as InputDto,
    EditCategoryOutputDto as OutPutDto
};

use Application\Domain\Shared\ValueObject\Uuid;

use DateTime;

class EditCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function execute(InputDto $input) {

        $category = $this->repository->findById($input->id);

        $category->update (
            name: $input->name,
        );

        $this->repository->update($category);

        return new OutputDto(
            id: $category->id
        );
    }
}
