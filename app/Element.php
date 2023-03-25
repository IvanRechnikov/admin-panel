<?php
namespace App;

abstract class Element extends Template
{
    abstract public function fields(): array;
    abstract public function name(): string;
    abstract public function type(): string;
    abstract public function styleLinks(): array;

    public function render(): void {
        $this->renderHeader();
        ?>
        <body>
            <?php
                foreach ($this->fields() as $field) {
                    $this->renderElement($field);
                }
            ?>
        </body>
        <?php
    }

    protected function renderElement($field): void
    {
        switch ($field['type']) {
            case Type::Navbar:
                $this->renderNavbar();
                break;
            case Type::Form:
                $this->renderForm($field);
                break;
            case Type::Input:
                $this->renderInput($field);
                break;
            case Type::Text:
                $this->renderText($field);
                break;
        }
    }

    protected function renderInput($field): void
    {
        ?>
        <label for="<?= $field['key'] ?>"><?= $field['name'] ?></label>
        <input type="text" name="<?= $field['key'] ?>" id="<?= $field['key'] ?>">
        <?php
    }
    
    protected function renderText($field): void
    {
        ?>
        <label for="<?= $field['key'] ?>"><?= $field['name'] ?></label>
        <textarea name="<?= $field['key'] ?>" id="<?= $field['key'] ?>" cols="30" rows="5"></textarea>
        <?php
    }
}