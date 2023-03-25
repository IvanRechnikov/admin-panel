<?php
namespace Element;

use App\Element;
use App\Type;
class Product extends Element {
    public function fields(): array
    {
        return [
            [
                'type' => Type::Navbar,
                'key' => 'navbar',
            ],
            [
                'type' => Type::Form,
                'key' => 'add-product',
                'elements' => [
                    [
                        'type' => Type::Input,
                        'key' => 'title',
                        'name' => 'Название',
                    ],
                    [
                        'type' => Type::Text,
                        'key' => 'description',
                        'name' => 'Описание'
                    ],
                    [
                        'type' => Type::Input,
                        'key' => 'price',
                        'name' => 'Цена',
                    ],
                ]
            ],
        ];
    }

    public function name(): string
    {
        return 'Продукты';
    }

    public function type(): string
    {
        return 'product';
    }

    public function styleLinks(): array
    {
        return [
            'main.css',
            'product.css',
        ];
    }
}
