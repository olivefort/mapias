<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240724121643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE establishment_map (establishment_id INT NOT NULL, map_id INT NOT NULL, INDEX IDX_E41DF5128565851 (establishment_id), INDEX IDX_E41DF51253C55F64 (map_id), PRIMARY KEY(establishment_id, map_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE establishment_map ADD CONSTRAINT FK_E41DF5128565851 FOREIGN KEY (establishment_id) REFERENCES establishment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE establishment_map ADD CONSTRAINT FK_E41DF51253C55F64 FOREIGN KEY (map_id) REFERENCES map (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE establishment CHANGE department department VARCHAR(3) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE establishment_map DROP FOREIGN KEY FK_E41DF5128565851');
        $this->addSql('ALTER TABLE establishment_map DROP FOREIGN KEY FK_E41DF51253C55F64');
        $this->addSql('DROP TABLE establishment_map');
        $this->addSql('ALTER TABLE establishment CHANGE department department INT NOT NULL');
    }
}
