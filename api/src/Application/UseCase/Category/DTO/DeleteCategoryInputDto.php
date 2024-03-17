<?php

namespace Application\UseCase\Category\DTO;

class DeleteCategoryInputDto
{
    public function __construct(
        public string $id
    ) {}
}
