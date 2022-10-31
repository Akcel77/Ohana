<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221025103903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'update Booking table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD open_day DATE NOT NULL, ADD close_day DATE NOT NULL, DROP days');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD days VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', DROP open_day, DROP close_day');
    }
}
