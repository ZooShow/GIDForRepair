<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610154253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665BF7D900');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665BF7D900 FOREIGN KEY (repair_type_id) REFERENCES repair_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665BF7D900');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665BF7D900 FOREIGN KEY (repair_type_id) REFERENCES repair_kind (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
