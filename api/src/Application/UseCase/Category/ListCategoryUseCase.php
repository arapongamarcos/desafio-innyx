<?php

namespace Application\UseCase\Category;

use Application\Domain\Category\Repository\CategoryRepositoryInterface;
use Application\UseCase\Category\DTO\ListCategoryInputDto as InputDto;
use Application\UseCase\Shared\DTO\PaginationOutputDto as OutputDto;

class ListCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function execute(InputDto $input)
    {

        $categoryPaginate = $this->repository->paginate($input->filters);

        return new OutputDto(
            items: $categoryPaginate->items(),
            total: $categoryPaginate->total(),
            current_page: $categoryPaginate->currentPage(),
            last_page: $categoryPaginate->lastPage(),
            first_page: $categoryPaginate->firstPage(),
            per_page: $categoryPaginate->perPage(),
            to: $categoryPaginate->to(),
            from: $categoryPaginate->from()
        );
    }
}
