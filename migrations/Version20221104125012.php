<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104125012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E51458601');
        $this->addSql('DROP INDEX IDX_288A3A4E51458601 ON job_offer');
        $this->addSql('ALTER TABLE job_offer ADD company_id INT DEFAULT NULL, ADD offer_skill LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD skill_offer VARCHAR(255) DEFAULT NULL, DROP company_name_id, DROP offer_skills');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E979B1AD6 ON job_offer (company_id)');
        $this->addSql('ALTER TABLE profil ADD profil_skill VARCHAR(255) DEFAULT NULL, CHANGE skills_profil skills_profil LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E979B1AD6');
        $this->addSql('DROP INDEX IDX_288A3A4E979B1AD6 ON job_offer');
        $this->addSql('ALTER TABLE job_offer ADD company_name_id INT NOT NULL, ADD offer_skills VARCHAR(255) NOT NULL, DROP company_id, DROP offer_skill, DROP skill_offer');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E51458601 FOREIGN KEY (company_name_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E51458601 ON job_offer (company_name_id)');
        $this->addSql('ALTER TABLE profil DROP profil_skill, CHANGE skills_profil skills_profil VARCHAR(255) NOT NULL');
    }
}
