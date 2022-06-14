<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613115653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('insert into vendor (name, addres) values ("Технодром", "Днепровская, 27 ст2")');
        $this->addSql('insert into vendor (name, addres) values ("Прогресс-Строй, оптово-розничная компания", "Иртышская, 17 ст7")');
        $this->addSql('insert into vendor (name, addres) values ("Мастерстрой", "Некрасовская, 94")');
        $this->addSql('insert into vendor (name, addres) values ("Дюна", "Толстого, 40а")');
        $this->addSql('insert into vendor (name, addres) values ("Муравейник", "проспект Красного Знамени, 30а")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
