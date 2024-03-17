<?php

namespace Application\Domain\Category\Entity;

use Application\Domain\Shared\Validation\DomainValidation;
use Application\Domain\Shared\Traits\MethodsMagicsTrait;
use Application\Domain\Shared\ValueObject\Uuid;
use DateTime;

class CategoryEntity
{
    use MethodsMagicsTrait;

    public function __construct(
        protected ?Uuid $id = null,
        protected ?string $name = '',
    ) {
        $this->id = $this->id ?? Uuid::random();

        $this->validate();
    }

    public function update(
        ?string $name = ''
    ) {
        $this->name = $name;
        $this->validate();
    }

    protected function validate()
    {
        DomainValidation::notNull($this->name, 'The category name must not be empty or null');
        DomainValidation::strMaxLength($this->name, 100, 'The category name must not be greater than 100 characters');
    }
}
