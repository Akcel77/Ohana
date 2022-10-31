<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221025120348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD opening_day DATETIME NOT NULL, ADD closing_day DATETIME NOT NULL, ADD time_slot TIME NOT NULL, DROP week_number, DROP schedule, DROP schedule_close, DROP open_day, DROP close_day');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD week_number VARCHAR(255) NOT NULL, ADD schedule_close TIME NOT NULL, ADD open_day DATE NOT NULL, ADD close_day DATE NOT NULL, DROP opening_day, DROP closing_day, CHANGE time_slot schedule TIME NOT NULL');
    }
}
