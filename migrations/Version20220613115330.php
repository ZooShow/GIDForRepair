<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613115330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vendor_material_bind (id INT AUTO_INCREMENT NOT NULL, vendor_id INT NOT NULL, tool_id INT NOT NULL, cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor_tool_bind (id INT AUTO_INCREMENT NOT NULL, vendor_id INT NOT NULL, tool_id INT NOT NULL, cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE vendor_material');
        $this->addSql('DROP TABLE vendor_tool');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vendor_material (vendor_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_A1AD7E64E308AC6F (material_id), INDEX IDX_A1AD7E64F603EE73 (vendor_id), PRIMARY KEY(vendor_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vendor_tool (vendor_id INT NOT NULL, tool_id INT NOT NULL, INDEX IDX_A3E3B0E8F7B22CC (tool_id), INDEX IDX_A3E3B0EF603EE73 (vendor_id), PRIMARY KEY(vendor_id, tool_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE vendor_material ADD CONSTRAINT FK_A1AD7E64E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_material ADD CONSTRAINT FK_A1AD7E64F603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_tool ADD CONSTRAINT FK_A3E3B0E8F7B22CC FOREIGN KEY (tool_id) REFERENCES tool (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_tool ADD CONSTRAINT FK_A3E3B0EF603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE vendor_material_bind');
        $this->addSql('DROP TABLE vendor_tool_bind');
    }
}
