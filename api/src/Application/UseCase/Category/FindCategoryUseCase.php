<?php

namespace Application\UseCase\Category;

use Application\Domain\Category\Repository\CategoryRepositoryInterface;

use Application\UseCase\Category\DTO\{
    FindCategoryInputDto as InputDto,
    FindCategoryOutputDto as OutPutDto
};

use DateTime;

class FindCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function execute(InputDto $input) {
        $category = $this->repository->findById($input->id);

        return new OutputDto(
            id: $category->id,
            name: $category->name,
        );
    }
}
