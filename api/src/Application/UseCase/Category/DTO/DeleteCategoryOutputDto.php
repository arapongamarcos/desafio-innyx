<?php

namespace Application\UseCase\Category\DTO;

class DeleteCategoryOutputDto
{
    public function __construct(
        public bool $deleted
    ) {}
}
