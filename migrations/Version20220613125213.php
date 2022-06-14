<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613125213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 4, 3700)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 4, 4200)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 4, 5600)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 4, 1800)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 4, 2200)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 5, 3100)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 5, 6750)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 5, 6627)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 5, 3032)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 5, 3062)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 6, 7600)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 6, 3650)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 6, 5600)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 6, 8200)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 6, 4100)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 7, 69)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 7, 83)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 7, 129)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 7, 57)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 7, 120)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 8, 6950)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 8, 2300)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 8, 1780)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 8, 2000)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 8, 5760)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 9, 147)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 9, 386)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 9, 220)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 9, 415)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 9, 118)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 10, 5250)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 10, 7700)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 10, 6320)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 10, 6250)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 10, 5400)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 11, 90)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 11, 119)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 11, 77)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 11, 81)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 11, 98)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 12, 120)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 12, 150)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 12, 187)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 12, 210)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 12, 142)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 13, 138)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 13, 311)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 13, 140)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 13, 86)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 13, 213)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 14, 6900)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 14, 4300)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 14, 5750)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 14, 4553)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 14, 6490)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 15, 247)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 15, 561)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 15, 519)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 15, 335)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 15, 372)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 16, 114)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 16, 133)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 16, 67)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 16, 61)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 16, 72)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 17, 637)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 17, 694)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 17, 475)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 17, 311)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 17, 502)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 18, 187)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 18, 261)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 18, 278)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 18, 304)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 18, 230)');

        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (1, 19, 630)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (2, 19, 490)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (3, 19, 320)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (4, 19, 433)');
        $this->addSql('insert into vendor_tool_bind (vendor_id, tool_id, cost) values (5, 19, 597)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
