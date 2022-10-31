<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027151728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Booking, closingDay, openingDay, reservation,';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE closing_day (id INT AUTO_INCREMENT NOT NULL, day_of_week SMALLINT NOT NULL, opening_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_day (id INT AUTO_INCREMENT NOT NULL, day_of_week SMALLINT NOT NULL, opening_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, date_choosed DATE NOT NULL, start_time_choosed TIME NOT NULL, duration_in_minute SMALLINT NOT NULL, INDEX IDX_42C8495579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD opening_day_id INT DEFAULT NULL, ADD closing_day_id INT DEFAULT NULL, ADD reservation_id INT DEFAULT NULL, ADD slot_step SMALLINT NOT NULL, DROP is_open, DROP opening_day, DROP closing_day, DROP time_slot');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEDB53D4F FOREIGN KEY (opening_day_id) REFERENCES opening_day (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE86A8D2EE FOREIGN KEY (closing_day_id) REFERENCES closing_day (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDEDB53D4F ON booking (opening_day_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE86A8D2EE ON booking (closing_day_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDEB83297E7 ON booking (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE86A8D2EE');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEDB53D4F');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEB83297E7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495579F37AE5');
        $this->addSql('DROP TABLE closing_day');
        $this->addSql('DROP TABLE opening_day');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_E00CEDDEDB53D4F ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDE86A8D2EE ON booking');
        $this->addSql('DROP INDEX IDX_E00CEDDEB83297E7 ON booking');
        $this->addSql('ALTER TABLE booking ADD is_open TINYINT(1) NOT NULL, ADD opening_day DATETIME NOT NULL, ADD closing_day DATETIME NOT NULL, ADD time_slot TIME NOT NULL, DROP opening_day_id, DROP closing_day_id, DROP reservation_id, DROP slot_step');
    }
}
